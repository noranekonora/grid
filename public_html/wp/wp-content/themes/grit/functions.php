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

// 管理画面「投稿」の名前を変更
function Change_menulabel() {
  global $menu;
  global $submenu;
  $name = 'お知らせ投稿';
  $menu[5][0] = $name;
  $submenu['edit.php'][5][0] = $name.'一覧';
  $submenu['edit.php'][10][0] = '新しい'.$name;
  }
  function Change_objectlabel() {
  global $wp_post_types;
  $name = 'news';
  $labels = &$wp_post_types['post']->labels;
  $labels->name = $name;
  $labels->singular_name = $name;
  $labels->add_new = _x('追加', $name);
  $labels->add_new_item = $name.'の新規追加';
  $labels->edit_item = $name.'の編集';
  $labels->new_item = '新規'.$name;
  $labels->view_item = $name.'を表示';
  $labels->search_items = $name.'を検索';
  $labels->not_found = $name.'が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
  }
  add_action( 'init', 'Change_objectlabel' );
  add_action( 'admin_menu', 'Change_menulabel' );

// カスタム投稿タイプの追加
add_action( "init", "create_post_type" );
	function create_post_type() {
    register_post_type(
      'schedule',
      array(
        'label' => 'リーグ戦スケジュール',
        'public' => true,
        'has_archive' => true,
        'show_in_rest' => true,
        'menu_position' => 5,
        'supports' => array(
          'title',
          'editor',
          'thumbnail',
          'revisions',
        ),
      )
    );
	}

  //カスタム投稿本文概要の文字数調整
 function my_excerpt_length($length) {
  return 40;
  }
  add_filter('excerpt_length', 'my_excerpt_length');

// 投稿のアーカイブページを作成する
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true; // リライトを有効にする
        $args['has_archive'] = 'news'; // 任意のスラッグ名
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

 

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