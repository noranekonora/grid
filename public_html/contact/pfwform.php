<?php
/**
 * Copyright(C). phonogram,Inc. All Rights Reserved.
 */

// ライブラリ読み込み
require_once(dirname(__FILE__) . '/inc/php/phpmailer/PHPMailerAutoload.php');

/**
 * 開発環境かどうか判定する。
 * 開発環境の場合は true を、それ以外の場合は false を返す。
 *
 * @return bool
 */
if ( ! function_exists('_isdev')) {
	function _isdev() {
		if (preg_match('/\.phonogram\.(tv|jp)\//iu', __FILE__)) {
			return true;
		}
		return false;
	}
}

/**
 * 別ページにリダイレクトする。
 *
 * @param string $url
 * @return void
 */
if ( ! function_exists('_redirect')) {
	function _redirect($url) {
		header('Location: ' . $url, true, 302);
		exit;
	}
}

/**
 * テンプレートからメール本文を生成する。
 *
 * @param string $template
 * @param array $params
 * @return string
 */
if ( ! function_exists('_createmailbody')) {
	function _createmailbody($template, $params = array()) {
		$paramstext = '';
		$valueSeparator = PHP_EOL;
		if (is_array($params)) {
			foreach ($params as $key => $value) {
				if (is_array($value)) {
					$paramstext .= sprintf('[%s]%s%s%s', $key, PHP_EOL, implode($valueSeparator, $value), str_repeat(PHP_EOL, 2));
				} else {
					$paramstext .= sprintf('[%s]%s%s%s', $key, PHP_EOL, $value, str_repeat(PHP_EOL, 2));
				}
			}
		}
		return preg_replace('/<%\s*フォーム入力内容\s*%>/u', $paramstext, $template);
	}
}

/**
 * メールを送信する。
 *
 * @param array $options
 * @param array $params
 * @return bool
 */
if ( ! function_exists('_sendemail')) {
	function _sendemail($options, $params = array()) {
		if (empty($options['to']['address'])) {
			return true;
		}
		$mail = new PHPMailer();
		$mail->XMailer = ' ';
		$mail->CharSet = 'UTF-8';
		$mail->Encoding = 'base64';
		$mail->setFrom($options['from']['address'], $options['from']['name']);
		$mail->addAddress($options['to']['address'], $options['to']['name']);
		if (is_array($options['replyto'])) {
			if ( ! empty($options['replyto']['address'])) {
				$mail->addReplyTo($options['replyto']['address'], $options['replyto']['name']);
			}
		}
		$mail->Subject = (_isdev() ? '【テスト環境】' : '') . $options['subject'];
		$mail->Body = _createmailbody($options['body'], $params);
		return $mail->send();
	}
}

// 入力パラメータを配列に格納
$params = $_POST;

// 各種設定
$settings = require(dirname(__FILE__) . '/pfwform-config.php');

// POST送信以外は受け付けない
if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
	_redirect($settings['pages']['error']);
}

// トークン検証
$token = $params['pfwtoken'];
$passphrase = md5_file(dirname(__FILE__) . '/pfwform-config.php');
$expires = openssl_decrypt($token, 'AES-256-ECB', $passphrase);
if ($expires === false || $_SERVER['REQUEST_TIME'] > $expires) {
	_redirect($settings['pages']['error']);
}

// トークン破棄
unset($params['pfwtoken']);

// メール送信（管理者宛て）
if ( ! _sendemail($settings['email']['admin'], $params)) {
	_redirect($settings['pages']['error']);
}

// メール送信（利用者宛て）
if ( ! _sendemail($settings['email']['replay'], $params)) {
	_redirect($settings['pages']['error']);
}

// サンクスページへリダイレクト
_redirect($settings['pages']['complete']);

exit;
