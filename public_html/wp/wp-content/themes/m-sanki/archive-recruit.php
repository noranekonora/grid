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
  <title>採用情報｜grit</title>
  <script src="/inc/js/page/viewport-extra.min.js"></script>
  <script>new ViewportExtra(375);</script>
  <link rel="icon" href="/inc/image/favicon.ico" type="image/x-icon">
  <meta name="description" content="gritの「採用情報」についてのページです。">
  <meta property="og:site_name" content="grit" />
  <meta property="og:title" content="採用情報｜grit" />
  <meta property="og:description" content="gritの「採用情報」についてのページです。" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="">
  <meta property="og:image" content="/inc/image/common/img_ogp.jpg" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="">
  <meta name="twitter:image" content="/inc/image/common/img_ogp.jpg">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/inc/css/style.css">
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="/inc/css/page/archive.css">
  <link rel="stylesheet" type="text/css" href="/inc/css/page/recruit.css">
</head>

<body id="archive-recruit">
  <div id="container">
    <header class="l-header">
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
                <li class="l-nav__item l-nav__item--1">
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
      <div class="l-lowerCaption">
        <div class="l-lowerCaption__inner">
          <div class="l-lowerCaption__titleBox">
            <h1 class="l-lowerCaption__title">
              <small>採用情報</small> Recruit </h1>
          </div>
          <ul class="c-topicspath">
            <li><a href="/">HOME</a></li>
            <li><a href="/recruit/">採用情報</a></li>
            <li>採用情報</li>
          </ul>
        </div>
      </div>
      <div id="contents" class="l-lower">
        <div class="l-section p-mainImg">
          <img src="/inc/image/recruit/pic_recruit_mainimg.jpg" alt="採用情報">
          <section class="p-mainImg__body">
            <h2 class="c-ttl-2">一緒に働いてくれる仲間を募集しています。</h2>
            <p class="is-large">FANにはお客様の建機課題解決の最良のパートナーとなれるよう、様々な職種が存在します。各職種での専門性は違いますが、信頼に繋がるよう、一人ひとりが誠実に仕事に向かう姿勢は変わりません。FANに興味を持ち働いてみたいと思ってくださった方、是非一度お問い合わせください。</p>
          </section>
        </div>
        <div class="l-section--lightBlue p-job">
          <div class="l-section">
            <div class="p-job__head">
              <h2 class="c-ttl-2 c-ttl-2--line">
                <small>JOB TYPE</small>
                <span>募集職種</span>
              </h2>
              <p> 現在、当社では以下の職種を募集しております。<br> 各職種詳細ページよりエントリーフォームにてご応募してください。 </p>
            </div>
            <ul class="grid c-card02">
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <li class="col-4_sm-6_xs-12 c-card02__item">
                <a href="<?php the_permalink(); ?>">
                  <div class="c-card02__inner">
                    <?php if(has_post_thumbnail()): ?>
                    <div class="c-card02__thumb" style="background-image: url('<?php the_post_thumbnail_url(); ?>');"></div>
                    <?php else: ?>
                    <div class="c-card02__thumb" style="background-image: url('/inc/image/recruit/pic_noImg.jpg');"></div>
                    <?php endif?>
                    <div class="c-card02__body">
                      <h3 class="c-card02__title">
                        <?php the_title(); ?>
                      </h3>
                      <p class="c-card02__desc" data-js="js-matchHeight">
                        <?php the_field('employmentType'); ?>
                      </p>
                      <p class="c-card02__detail">詳しくはこちら</p>
                    </div>
                  </div>
                </a>
              </li>
              <?php endwhile; endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- end of #main -->
    <footer class="l-f l-f--lineTop">
      <div class="l-f__inner">
        <a href="/" class="pageTop" data-js="pagetop"></a>
        <p class="l-f__companyName">一般社団法人<br class="u-only-xs"> 広島グリットサッカークラブ</p>
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