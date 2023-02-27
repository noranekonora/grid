<!DOCTYPE HTML>
<html lang="ja">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-185921389-1"></script>
  <script> window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-185921389-1');
    </script>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <title>news｜grit</title>
  <script src="/inc/js/page/viewport-extra.min.js"></script>
  <script>new ViewportExtra(375);</script>
  <link rel="icon" href="/inc/image/favicon.ico" type="image/x-icon">
  <meta name="description" content="gritの「news」についてのページです。">
  <meta property="og:site_name" content="grit" />
  <meta property="og:title" content="news｜grit" />
  <meta property="og:description" content="gritの「news」についてのページです。" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="/news/">
  <meta property="og:image" content="/inc/image/common/img_ogp.jpg" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="/news/">
  <meta name="twitter:image" content="/inc/image/common/img_ogp.jpg">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/inc/css/style.css">
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="/inc/css/page/archive.css">
</head>

<body id="archive-news">
  <div id="container">
    <header class="l-header js-header">
      <div class="l-header__inner">
        <div class="l-header__modules">
          <a href="/" class="logo"><img src="/inc/image/common/img_logo.svg" alt="grit"></a>
          <div class="c-toggleBtn" id="toggle">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
        <nav class="l-navigation" id="gnavi">
          <ul class="l-navigation__inner">
            <li class="l-navigation__item">
              <a href="/"><span class="l-navigation__ja">トップ</span>TOP</a>
            </li>
            <li class="l-navigation__item">
              <a href="/about/"><span class="l-navigation__ja">グリットについて</span>ABOUT US</a>
            </li>
            <li class="l-navigation__item">
              <a href="/school/"><span class="l-navigation__ja">スクール</span>SCHOOL</a>
            </li>
            <li class="l-navigation__item">
              <a href="/jr-youth/"><span class="l-navigation__ja">ジュニアユース</span>Jr.YOUTH</a>
            </li>
            <li class="l-navigation__item">
              <a href="/faq/"><span class="l-navigation__ja">よくある質問</span>FAQ</a>
            </li>
            <li class="l-navigation__item">
              <a class="current" href="/news/"><span class="l-navigation__ja">お知らせ</span>NEWS</a>
            </li>
            <li class="l-nav">
              <ul class="l-nav__btns">
                <li class="l-nav__item l-nav__item">
                  <a href="/contact/"><span></span></a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
      <div class="l-filter"></div>
    </header>
    <!-- /header -->
    <div id="main">
      <div class="l-lowerCaption js-mainVisual">
        <div class="l-lowerCaption__inner">
          <div class="l-lowerCaption__titleBox">
            <h1 class="l-lowerCaption__title">
              <small>news</small> お知らせ </h1>
          </div>
          <ul class="c-topicspath">
            <li><a href="/">HOME</a></li>
            <li>news</li>
          </ul>
        </div>
      </div>
      <div id="contents" class="l-lower">
        <div class="l-section l-section--sm">
          <ul class="c-newslist">
            <?php
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;//ポイント1
        $args = array(
          'paged' => $paged,//ポイント2
          'posts_per_page' => 6,//ポイント3
          );
          $query = new WP_Query( $args );
          ?>
            <?php if( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <li class="c-newslist__item">
              <a href="<?php the_permalink(); ?>">
                <dl>
                  <dt>
                    <span class="c-newslist__date">
                      <?php echo get_the_date("Y.m.d"); ?></span>
                    <span class="c-label ">
                      <?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></span>
                  </dt>
                  <dd>
                    <?php the_title(); ?>
                  </dd>
                </dl>
              </a>
            </li>
            <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
            <p class="">記事が見つかりませんでした。</p>
            <?php endif; ?>
          </ul>
        </div>
        <div class="pagination">
          <?php
          $big = 999999999; // need an unlikely integer
          echo paginate_links([
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?page=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $query->max_num_pages,
            'prev_text' => __('&lt;'),
            'next_text' => __('&gt;'),
          ]);
        ?>
        </div>
        <?php if( function_exists("the_pagination") ) the_pagination(); ?>
      </div>
    </div>
    <!-- end of #main -->
    <footer class="l-f l-f--lineTop">
      <div class="l-f__inner">
        <a href="/" class="pageTop" data-js="pagetop"></a>
        <p class="l-f__companyName">一般社団法人 広島グリットサッカークラブ</p>
        <small class="l-f__copyright">&copy; 2022 Hirosima grit soccer club.</small>
      </div>
    </footer>
    <!-- /footer -->
  </div>
  <!-- end of #container -->
  <script src="/inc/js/common.min.js"></script>
  <script src="/inc/js/page/jquery.matchHeight.min.js"></script>
  <!--[if lt IE 9]><script src="/inc/js/old-ie.min.js"></script><![endif]-->
  <?php wp_footer(); ?>
</body>

</html>