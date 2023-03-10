/*! pfwform.js | Copyright(c) phonogram, Inc.All Rights Reserved. */

/**
 * Happy Form 2 Lite（旧：PFWフォーム）
 *
 * @file: pfwform.js
 * @requires jQuery 1.8+
 * @since 2017.9.8
 * @version 1.2.3
 */

;(function($) {
	'use strict';

	// 離脱防止アラートフラグ
	var windowUnloadAlert = false;

	// 改行コードを HTML の改行タグに置換
	var nl2br = function(str) {
		return str.replace(new RegExp('(\r\n|\n\r|\r|\n)', 'g'), '<br>');
	};

	// 特殊文字を HTML エンティティに変換
	var htmlspecialchars = function(str) {
		return $('<div />').text(str).html();
	};

	// 全角→半角への変換
	var toHankaku = function(strVal) {
		var halfVal = strVal.replace(/[！-～]/g, function(tmpStr) {
			return String.fromCharCode(tmpStr.charCodeAt(0) - 0xFEE0);
		});
		return halfVal.replace(/”/g, "\"")
			.replace(/’/g, "'")
			.replace(/‘/g, "`")
			.replace(/￥/g, "\\")
			.replace(/　/g, " ")
			.replace(/〜/g, "~");
	};

	$.fn.pfwform = function(options) {
		var settings = $.extend({
			formAction: 'pfwform.php',
			tokenGenerator: 'pfwform-token.php',
			errorClass: 'has_error',
			successClass: 'has_success'
		}, options);

		// フォーム制御スタイルシート
		if ($('#pfwform-system-style').length <= 0) {
			var src = '<style type="text/css" id="pfwform-system-style">';
			src += '.pfwform-system-hide{display:none}';
			src += '[data-pfwform-show-if-error]:not(.pfwform-system-show),[data-pfwform-show-if-success]:not(.pfwform-system-show){display:none}';
			src += 'body.pfwform-system-confirm [data-pfwform-hide-if-confirm],body:not(.pfwform-system-confirm) [data-pfwform-show-if-confirm]{display:none}';
			src += '</style>';
			$('head').append(src);
		}

		// 離脱防止アラート
		$(window).on('beforeunload', function() {
			if (windowUnloadAlert) {
				return 'このページから移動しますか？入力途中の内容は保存されません。';
			}
		});

		// 住所自動ライブラリ読み込み
		if ($('.h-adr').length > 0) {
			$('.h-adr').each(function() {
				if ($(this).find('.p-country-name,[name="p-country-name"]').length <= 0) {
					$(this).prepend('<span class="p-country-name" style="display:none;">Japan</span>');
				}
			});
			if (typeof YubinBango === 'undefined') {
				$.getScript('//yubinbango.github.io/yubinbango/yubinbango.js', function() {
					new YubinBango.MicroformatDom();
				});
			}
		}

		return this.each(function() {
			var self = this;

			// formタグ以外はエラー処理
			if ( ! $(self).is('form')) {
				$.error('Element is not a form.');
			}

			// ページトップへ戻る
			var backToTop = function() {
				$('body,html').scrollTop(0);
			};

			// フォームタグ制御
			$(self).attr({
				action: ($(self).is('[data-pfwform-action]') ? $(self).attr('data-pfwform-action') : settings.formAction),
				method: 'post',
				'accept-charset': 'utf-8',
				novalidate: 'novalidate',
				autocomplete: 'off'
			});

			// 確認ステップ有効化
			var confirmMode = $(self).is('[data-pfwform-confirm]');

			// フォーム要素
			var formElements = $(self).find('input[type!="hidden"],select,textarea');

			// 個別バリデーション
			formElements.on('pfwform:validation', function() {
				var _self = this;

				// フォーム名とフォーム値を取得
				var _fname = $(_self).attr('name');
				var _gname = $(_self).attr('name').split('[')[0];
				var _value;
				if ($(_self).is(':radio') || $(_self).is(':checkbox')) {
					_value = formElements.filter('[name="' + _fname + '"]:checked').map(function() {
						return $(this).val();
					}).get().join("\n");
				} else {
					_value = $(_self).val();
				}
				if ($.type(_value) !== 'string') {
					_value = '';
				}

				// バリデーション結果表示フラグ
				var _immediateToggle = arguments[1] === undefined ? true : arguments[1];

				// 確認ステップ用のテキストに入力値を代入
				$('[data-pfwform-confirm-value="' + _gname + '"]').each(function() {
					var __self = this;
					if ($(__self).is('[data-pfwform-confirm-value-empty]') !== true) {
						$(__self).attr('data-pfwform-confirm-value-empty', $(__self).html());
					}
					var __confirmValue = (_value != '' ? _value : $(__self).attr('data-pfwform-confirm-value-empty'));
					$(__self).html(nl2br(htmlspecialchars(__confirmValue)));
				});

				// バリデーション
				var _isValid = true;
				if ($(_self).is('[data-pfwform-type="function"]')) {
					// 独自関数チェック
					_isValid = window[$(_self).attr('data-pfwform-function')](_value);
				} else if (_value != '') {
					// メールアドレスチェック
					if ($(_self).not('[data-pfwform-type]').is('[type="email"]') || $(_self).is('[data-pfwform-type="email"]')) {
						if (_immediateToggle === true) {
							_value = toHankaku(_value);
							$(_self).val(_value);
						}
						if (new RegExp('^[a-zA-Z0-9.!#$%&\'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\\.[a-zA-Z0-9-]+)*$').test(_value) !== true) {
							_isValid = false;
						}
					}
					// 電話番号チェック
					if ($(_self).is('[data-pfwform-type="tel"]')) {
						if (_immediateToggle === true) {
							_value = toHankaku(_value);
							$(_self).val(_value);
						}
						if (new RegExp('^\\d{1,4}-\\d{1,4}-\\d{3,4}$|^\\d{9,12}$').test(_value) !== true) {
							_isValid = false;
						}
					}
					// 郵便番号チェック
					if ($(_self).is('[data-pfwform-type="postal"]')) {
						if (_immediateToggle === true) {
							_value = toHankaku(_value);
							$(_self).val(_value);
						}
						if (new RegExp('^\\d{3}-?\\d{4}$').test(_value) !== true) {
							_isValid = false;
						}
					}
					// 正規表現チェック
					if ($(_self).is('[data-pfwform-type="regex"]')) {
						if (new RegExp($(_self).attr('data-pfwform-regex')).test(_value) !== true) {
							_isValid = false;
						}
					}
				} else {
					// 必須チェック
					if ($(_self).is('[data-pfwform-required]')) {
						_isValid = false;
					}
				}

				// バリデーション結果を保存
				$(self).find('[name^="' + _gname + '"]').attr('data-pfwform-validation', (_isValid === true ? 'success' : 'error'));

				// バリデーション失敗メッセージの表示／非表示トグル
				$('[data-pfwform-show-if-error="' + _gname + '"]').toggleClass('pfwform-system-show', (_isValid === false && _immediateToggle === true));

				// バリデーション失敗クラスの表示／非表示トグル
				$(self).find('[name^="' + _gname + '"]').toggleClass(($(_self).is('[data-pfwform-class-if-error]') ? $(_self).attr('data-pfwform-class-if-error') : settings.errorClass), (_isValid === false && _immediateToggle === true));
				$('[data-pfwform-target="' + _gname + '"][data-pfwform-class-if-error]').each(function() {
					$(this).toggleClass(($(this).is('[data-pfwform-class-if-error]') ? $(this).attr('data-pfwform-class-if-error') : settings.errorClass), (_isValid === false && _immediateToggle === true));
				});

				// バリデーション成功クラスの表示／非表示トグル
				$(self).find('[name^="' + _gname + '"]').toggleClass(($(_self).is('[data-pfwform-class-if-success]') ? $(_self).attr('data-pfwform-class-if-success') : settings.successClass), (_isValid === true && _value != ''));
				$('[data-pfwform-target="' + _gname + '"][data-pfwform-class-if-success]').each(function() {
					$(this).toggleClass(($(this).is('[data-pfwform-class-if-success]') ? $(this).attr('data-pfwform-class-if-success') : settings.successClass), (_isValid === true && _value != ''));
				});

				// 全項目バリデーション失敗・成功メッセージの表示／非表示トグル
				if (_immediateToggle === true) {
					if ($('[data-pfwform-validation]').length > 0) {
						var _isValidFull = ($('[data-pfwform-validation="error"]').length > 0 ? false : true);
						$('[data-pfwform-show-if-error=""]').toggleClass('pfwform-system-show', (_isValidFull === false));
						$('[data-pfwform-show-if-success=""]').toggleClass('pfwform-system-show', (_isValidFull === true));
					}
				}

				// 離脱防止アラートON
				if ( ! $(self).is('[data-pfwform-unload-alert="disabled"]')) {
					windowUnloadAlert = true;
				}
			});

			// フォーム変更時にバリデーション
			formElements.on('blur change keyup', function(e) {
				$(this).trigger('pfwform:validation', (e.type == 'blur' ? true : false));
			});

			// 戻るボタン
			$(self).find('[data-pfwform-back-button]').on('click', function() {
				$('body').removeClass('pfwform-system-confirm');
				// ページトップへ戻る
				backToTop();
				return false;
			});

			// 送信処理
			$(self).on('submit', function() {
				// 全項目バリデーション
				formElements.trigger('pfwform:validation');

				// メイン処理
				if (confirmMode === true) {
					// bodyクラスで動作を切り替え
					if ($('body').hasClass('pfwform-system-confirm') === false) {
						// バリデーションエラーがない場合は確認に進む
						if (formElements.filter('[data-pfwform-validation="error"]').length <= 0) {
							$('body').addClass('pfwform-system-confirm');
							// ページトップへ戻る
							backToTop();
						}
						return false;
					} else {
						// バリデーションエラーがある場合は送信しない
						if (formElements.filter('[data-pfwform-validation="error"]').length > 0) {
							$('body').removeClass('pfwform-system-confirm');
							return false;
						}
						// 離脱防止アラートOFF
						windowUnloadAlert = false;
						// 多重送信防止
						$(self).find(':submit').prop('disabled', true);
					}
				} else {
					// バリデーションエラーがある場合は送信しない
					if (formElements.filter('[data-pfwform-validation="error"]').length > 0) {
						return false;
					}
					// 離脱防止アラートOFF
					windowUnloadAlert = false;
					// 多重送信防止
					$(self).find(':submit').prop('disabled', true);
				}

				// トークン発行
				$.ajax({
					async: false,
					type: 'GET',
					url: ($(self).is('[data-pfwform-token-generator]') ? $(self).attr('data-pfwform-token-generator') : settings.tokenGenerator),
					success: function(data) {
						$(self).prepend($('<input type="hidden" name="pfwtoken">').attr('value', data));
					}
				});
			});

		});
	};

	$(function() {
		$('.pfwform').pfwform();
	});

})(jQuery);
