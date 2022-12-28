<?php
/*
Plugin Name: Phonogram-wptoolset
Plugin URI:
Description: bugfix and make your projects easy for Phonogram Inc. :)
Version: ver.0.0.3
Author: phonogram
Author URI: http://phono-manual.phonogram.jp/?p=1620
License: GPL2
*/

class PWPTS {

		public static function load_modules () {
				// your code here
		}

		protected static function load_module () {
				// your code here
		}

}

/*-------------------------------------------*/
/* WordPressへようこそ！メッセージを削除
/*-------------------------------------------*/
remove_action('welcome_panel', 'wp_welcome_panel');

/*-------------------------------------------*/
/* エディターの自動整形を無効化
/*-------------------------------------------*/
//remove_filter('the_content', 'wpautop'); // wysiwig
//remove_filter('the_excerpt', 'wpautop');

/*-------------------------------------------*/
/* エディターの挙動を Enterで "<br>"、Shift+Enterで "<p>" に変更
/*-------------------------------------------*/
function my_switch_tinymce_p_br($settings) {
	$settings['forced_root_block'] = false;
	return $settings;
}
add_filter('tiny_mce_before_init', 'my_switch_tinymce_p_br');

/*-------------------------------------------*/
/* 固定ページの記事内容をファイル管理
/*-------------------------------------------*/
add_filter('the_content', function($content) { // 固定ページのコンテンツを「_page」フォルダから読み込む*/
		$filename = get_template_directory() . '/_pages/' . trim(strip_tags($content));
		if (preg_match('/\.\./', $filename)) return $content;
		if ( ! is_file($filename)) return $content;
		ob_start();
		include($filename);
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
});

/*-------------------------------------------*/
/* メディアにアップロードした画像の添付ファイルページを表示させない
/*-------------------------------------------*/
function no_attachment_page() {  // アクセスされたURLが attachment ページであった場合、404を返す。
		if (is_attachment()) {
				global $wp_query;
				$wp_query->set_404();
				status_header(404);
				nocache_headers();
		}
}
add_action('template_redirect', 'no_attachment_page');

/*-------------------------------------------*/
/* pageClassを作成する関数
/*-------------------------------------------*/
function page_class() { //page_idの作成( TODO:themeにこのメソッドを読み込む )
		$currentPage = $_SERVER["REQUEST_URI"];
		if ($currentPage == "/") {
				echo("class='top'");
		} else {
				$cat = get_the_category();
				if ($cat) { //categoryがある場合category名をidに
						$cat_id = $cat[0]->name; //取得したカテゴリのID
						echo("class='".$cat_id."'");
				} else { //カテゴリがない場合はslug名をidに
						echo("class='".str_replace("/", "", $currentPage)."'");
				}
		}
}

/*-------------------------------------------*/
/* カスタムフィールドのプレビュー不具合を修正
/*-------------------------------------------*/
function get_preview_id($postId) {
	global $post;
	$previewId = 0;
	if ( isset($_GET['preview'])
			&& ($post->ID == $postId)
			&& $_GET['preview'] == true
			&&  ($postId == url_to_postid($_SERVER['REQUEST_URI']))
		) {
		$preview = wp_get_post_autosave($postId);
		if ($preview != false) { $previewId = $preview->ID; }
	}
	return $previewId;
}

add_filter('get_post_metadata', function($meta_value, $post_id, $meta_key, $single) {
	if ($preview_id = get_preview_id($post_id)) {
		if ($post_id != $preview_id) {
			$meta_value = get_post_meta($preview_id, $meta_key, $single);
		}
	}
	return $meta_value;
}, 10, 4);

add_action('wp_insert_post', function($postId) {
	global $wpdb;
	if (wp_is_post_revision($postId)) {
		if (count($_POST['fields']) != 0) {
			foreach ($_POST['fields'] as $key => $value) {
				$field = get_field($key);
				if ( !isset($field['name']) || !isset($field['key']) ) continue;
				if (count(get_metadata('post', $postId, $field['name'], $value)) != 0) {
					update_metadata('post', $postId, $field['name'], $value);
					update_metadata('post', $postId, "_" . $field['name'], $field['key']);
				} else {
					add_metadata('post', $postId, $field['name'], $value);
					add_metadata('post', $postId, "_" . $field['name'], $field['key']);
				}
			}
		}
		do_action('save_preview_postmeta', $postId);
	}
});
