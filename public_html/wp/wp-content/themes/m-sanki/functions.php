<?php
/**
 * テーマ処理関数
 * @package WordPress
 * @subpackage csd.ne.jp
 */

// アクション
add_action('init', '_init');//カスタム投稿タイプ　イニシャライズ
add_action('admin_menu', 'admin_menu');

// フィルター
add_filter('show_admin_bar', '__return_false');
add_filter('get_archives_link', 'custom_year_link');

//アイキャッチ画像
add_theme_support( 'post-thumbnails' );

// アクション削除
// 不要なヘッダを削除
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'feed_links', 2 );
remove_action('wp_head', 'rsd_link' );
remove_action('wp_head', 'wlwmanifest_link' );
remove_action('wp_head', 'parent_post_rel_link', 10, 0 );
remove_action('wp_head', 'start_post_rel_link', 10, 0 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_generator' );

/* WP 本体 更新通知 非表示 */
add_filter('pre_site_transient_update_core', '__return_zero');
remove_action('wp_version_check', 'wp_version_check');
remove_action('admin_init', '_maybe_update_core');

/**
 *  hook init
 *  @description:
 */

function _init(){

    //お知らせ　カスタム投稿タイプ
    if (!is_admin()) ob_start();
    register_post_type(
        'news',
        array(
            'labels' => array(
                'name' => 'お知らせ',
                'singular_name' =>'お知らせ',
                'edit_news' => 'お知らせを編集',
                'add_new_news' => 'お知らせを追加',
                'search_news' => 'お知らせを検索',
                'not_found' => 'お知らせが見つかりませんでした。'
            ),
            'public' => true,
            'menu_position' => 6,
            'supports'=> array('title', 'editor'),
            'has_archive' => true,
            'query_var' => false,
            'show_in_rest' => false,//Gutenbergに
            'taxonomies' => array('news')
        )
    );
    register_taxonomy(
        'news_category',
        'news',
        array(
            'hierarchical' => true,
            'label' => 'お知らせカテゴリー',
            'singular_label' => 'お知らせカテゴリー',
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => false,//Gutenbergに
            'rewrite' => array('slug' => 'category')
        )
    );

    //採用情報　カスタム投稿タイプ
    if (!is_admin()) ob_start();
    register_post_type(
        'recruit',
        array(
            'labels' => array(
                'name' => '採用情報',
                'singular_name' =>'採用情報',
                'edit_news' => '採用情報を編集',
                'add_new_news' => '採用情報を追加',
                'search_news' => '採用情報を検索',
                'not_found' => '採用情報が見つかりませんでした。'
            ),
            'public' => true,
            'menu_position' => 6,
            'supports'=> array('title', 'editor', 'thumbnail'),
            'has_archive' => true,
            'query_var' => false,
            'show_in_rest' => false,//Gutenbergに
            'taxonomies' => array('recruit')
        )
    );
    register_taxonomy(
        'recruit_category',
        'recruit',
        array(
            'hierarchical' => true,
            'label' => '採用情報カテゴリー',
            'singular_label' => '採用情報カテゴリー',
            'public' => true,
            'show_ui' => true,
            'show_in_rest' => false,//Gutenbergに
            'rewrite' => array('slug' => 'category')
        )
    );
}


/**
 * タイトルタグのテキストを取得
 */
function get_meta_title()
{
    if (is_front_page()) {
        return bloginfo("name");
    }

    return (string)wp_title("", false) . bloginfo("name");

}

/**
 * スラッグ名を取得します。子の場合は親のスラッグを返却します。
 */
function get_slug_parent()
{
    if (is_page())
    {
        $uri = get_page_uri(get_the_ID());
        $arr = explode('/', $uri);
        if (count($arr) > 0)
        {
            return array_shift($arr);
        }
    }
}

/**
 * 親スラッグページに属するページか
 * @param string $slug
 */
function is_child_of( $slug )
{
    if (is_page())
    {
        global $post;
        if ( $post->ancestors )
        {
            $parent = $post->ancestors[count($post->ancestors) - 1];
            $parent_post = get_post( $parent );
            $name = esc_attr( $parent_post->post_name );
            if ( $slug == $name ) return true;
        }
    }
    return false;
}

/**
 * 現在のポストタイプと一致するか判定します
 */
function is_post_type($args)
{
    if (!is_array($args))
    {
        $args = array($args);
    }
    $post_type = get_post_type();
    foreach ($args as $arg)
    {
        if ($post_type == $arg)
            return true;
    }
    return false;
}

/**
 * スラッグから除外するIDを取得します
 * @return multitype:
 */
function get_exclude_ids($excludes = array())
{
    $results = array();
    foreach ($excludes as $slug)
    {
        $page = get_page_by_path($slug);
        if ($page !== null)
        {
            array_push($results, $page->ID);
        }
    }
    return $results;
}

/**
 * 指定した文字数に変換します。
 * @param string $str
 * @param int $len
 * @param bool $echo
 * @param string $suffix
 * @param string $encoding
 */
function trim_str_by_chars( $str, $len, $echo = true, $suffix = '...', $encoding = 'UTF-8' )
{
    if ( ! function_exists( 'mb_substr' ) || ! function_exists( 'mb_strlen' ) )
    {
        return $str;
    }
    $len = (int)$len;
    if ( mb_strlen( $str = wp_specialchars_decode( strip_tags( $str ), ENT_QUOTES, $encoding ), $encoding ) > $len )
    {
        $str = esc_html( mb_substr( $str, 0, $len, $encoding ) . $suffix );
    }

    $str = str_replace(array("\r\n","\r","\n"), '', $str);

    if ( $echo )
    {
        echo $str;
    }
    else
    {
        return $str;
    }
}

/**
 *アーカイブページで現在のカテゴリー・タグ・タームを取得する
 */
function get_current_term(){

    $id;
    $tax_slug;

    if(is_category()){
        $tax_slug = "category";
        $id = get_query_var('cat');
    }else if(is_tag()){
        $tax_slug = "post_tag";
        $id = get_query_var('tag_id');
    }else if(is_tax()){
        $tax_slug = get_query_var('taxonomy');
        $term_slug = get_query_var('term');
        $term = get_term_by("slug",$term_slug,$tax_slug);
        $id = $term->term_id;
    }

    return get_term($id,$tax_slug);
}

/**
 * 本文から画像を取得
 * @return string
 */
function view_first_image_src() {
    global $post, $posts;
    $_first_img_src = '';

    ob_start();
    ob_end_clean();

    $_output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $_matches);

    $_first_img_src = $_matches[1][0];

    if(empty($_first_img_src)){
        return null;
    }

    return $_first_img_src;
}

/**
 * 曜日の日本語を取得
 */
function get_week_str ($num) {
    $weeks = array("日", "月", "火", "水", "木", "金", "土");

    if (isset($weeks[$num]))
        return $weeks[$num];
}

function custom_year_link($link) {
    $regex = array(
        "/ title='([\d]{4})'/"  => " title='$1年'",
        "/ ([\d]{4}) /"         => " $1年 ",
        "/>([\d]{4})<\/a>/"        => ">$1年</a>"
    );
    $link_html = preg_replace(array_keys($regex), $regex, $link);
    return $link_html;
}

//表示件数制御
add_action('pre_get_posts','my_pre_get_posts');
function my_pre_get_posts( $query ) {
    if(is_admin() || ! $query -> is_main_query()) return;
    //newsのアーカイブページ
    if($query -> is_post_type_archive('news')){
        $query -> set('posts_per_page',10); //10件
    }
    //recruitのアーカイブページ
    if($query -> is_post_type_archive('recruit')){
        $query -> set('posts_per_page',-1); //無制限
        $query->set('order', 'ASC');
    }
}

/**
 * hook admin_menu
 */
function admin_menu()
{
    global $menu;

    // 管理画面サイドバーの項目を非表示
    // 共通項目
    remove_menu_page('edit.php'); // 記事投稿
    remove_menu_page('link-manager.php'); // リンク
    remove_menu_page('edit-comments.php'); // コメント

    // 管理者以外
    if (!current_user_can('manage_options')) {
        //		remove_menu_page('upload.php'); // メディア
        remove_menu_page('edit.php?post_type=person'); // 担当者設定
        remove_menu_page('separator1'); // セパレータ
        remove_menu_page('edit.php?post_type=mw-wp-form'); // MW WP FORM
        remove_submenu_page('export.php', 'export.php'); // ツール -> エクスポート
    }
    else {
        $menu[30] = $menu[10]; // メディアの表示順を入れ替え
        unset($menu[10]);
    }
}

//自動pタグを停止
function disable_page_wpautop() {
    if ( is_page() ) remove_filter( 'the_content', 'wpautop' );
}
add_action( 'wp', 'disable_page_wpautop' );

//bodyタグにslug名のクラスを(変数＝＞body_class( $class );)
function pagename_class($classes = ''){
    if (is_page()) {
        $page = get_post();//get_page()は廃止されたので使わない
        $classes[] = $page->post_name;//スラッグ名取得
    }
    return $classes;
}
add_filter('body_class', 'pagename_class');

//文字数制限（デフォルト20文字）　show_limit_text(文字数);　で使えます。
function show_limit_text($limit = 20) {
  global $post;
  if(mb_strlen($post->post_content,'UTF-8')>$limit){
    $content= str_replace('\n', '', mb_substr(strip_tags($post-> post_content), 0, $limit,'UTF-8'));
    echo $content.'…';
  }else{
    echo str_replace('\n', '', strip_tags($post->post_content));
  }
}

//pagenation (archive.phpに記述あり)
function the_pagination() {
  global $wp_query;
  $bignum = 999999999;
  if ( $wp_query->max_num_pages <= 1 )
    return;
  echo '<nav class="pagination">';
  echo paginate_links( array(
    'base'         => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
    'format'       => '',
    'current'      => max( 1, get_query_var('paged') ),
    'total'        => $wp_query->max_num_pages,
    'prev_text'    => '<i class="fas fa-angle-left"></i>',
    'next_text'    => '<i class="fas fa-angle-right"></i>',
    'type'         => 'list',
    'end_size'     => 3,
    'mid_size'     => 3
  ) );
  echo '</nav>';
}

//カスタム投稿タイプ用のカテゴリ表示昨日
function showTerms($catName) {
    if ($terms = get_the_terms($post->ID, $catName)) {
        foreach ($terms as $term) {
            echo esc_html($term->name);
        }
    }
}