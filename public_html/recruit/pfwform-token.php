<?php
/**
 * Copyright(C). phonogram,Inc. All Rights Reserved.
 */

/**
 * JSONデータを出力する。
 *
 * @param mixed $data
 * @return void
 */
if ( ! function_exists('_renderjson')) {
	function _renderjson($data) {
		$json = json_encode($data);
		header('Content-Type: application/json');
		header('Content-Length: ' . strlen($json));
		echo $json;
		exit;
	}
}

// トークン発行
$passphrase = md5_file(dirname(__FILE__) . '/pfwform-config.php');
$expires = $_SERVER['REQUEST_TIME'] + 60;
$token = openssl_encrypt($expires, 'AES-256-ECB', $passphrase);
_renderjson($token);

exit;
