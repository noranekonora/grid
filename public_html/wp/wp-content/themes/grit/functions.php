<?php
/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support( 'html5', array( /* HTML5のタグで出力 */
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'my_setup' );

//カスタム投稿タイプの追加
add_action( 'init', 'create_post_type' );
function create_post_type() {
//カスタム投稿タイプ１（ここから）
register_post_type(
  'news',
  array(
  'labels' => array(
  'name' => __( 'お知らせ' ),
  'singular_name' => __( 'お知らせ' )
  ),
  'public' => true,
  'menu_position' =>5,
  'has_archive' => true,
  )
  );
//カスタム投稿タイプ１（ここまで）

//カスタム投稿タイプ２（ここから）
register_post_type(
  'schedule',
  array(
  'labels' => array(
  'name' => __( 'リーグ戦スケジュール' ),
  'singular_name' => __( 'リーグ戦スケジュール' )
  ),
  'public' => true,
  'menu_position' =>5,
  )
  );
//カスタム投稿タイプ２（ここまで）

  //カテゴリーの追加
  register_taxonomy_for_object_type('category', 'news');
  //タグの追加
  register_taxonomy_for_object_type('post_tag', 'news');

}

  //カスタム投稿本文概要の文字数調整
 function my_excerpt_length($length) {
  return 40;
  }
  add_filter('excerpt_length', 'my_excerpt_length');

// 投稿のアーカイブページを作成する
// function post_has_archive($args, $post_type)
// {
//     if ('post' == $post_type) {
//         $args['rewrite'] = true; // リライトを有効にする
//         $args['has_archive'] = 'noranora'; // 任意のスラッグ名
//     }
//     return $args;
// }
// add_filter('register_post_type_args', 'post_has_archive', 10, 2);

 

//wp_headのtitleタグを削除
// remove_action(‘wp_head’, ‘_wp_render_title_tag’, 1);

// 固定ページをphpファイルで管理？
// function Include_my_php($params = array()) {
//   extract(shortcode_atts(array(
//   ‘file’ => ‘default’
//   ), $params));
//   ob_start();
//   include(get_theme_root() . ‘/’ . get_template() . “/$file.php”);
//   return ob_get_clean();
//   }
  
//   add_shortcode(‘myphp’, ‘Include_my_php’);

/* パスワード保護ページの「保護中:」を消す */
add_filter('protected_title_format', 'remove_protected');
function remove_protected($title) {
       return '%s';
}