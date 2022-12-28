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
  <title>grit</title>
  <script src="/inc/js/page/viewport-extra.min.js"></script>
  <script>new ViewportExtra(375);</script>
  <link rel="icon" href="/inc/image/favicon.ico" type="image/x-icon">
  <meta name="description" content="gritの「」についてのページです。">
  <meta property="og:site_name" content="grit" />
  <meta property="og:title" content="grit" />
  <meta property="og:description" content="gritの「」についてのページです。" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="/">
  <meta property="og:image" content="/inc/image/common/img_ogp.jpg" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="/">
  <meta name="twitter:image" content="/inc/image/common/img_ogp.jpg">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/inc/css/style.css">
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="/inc/css/util/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="/inc/css/util/slick/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="/inc/css/page/top.css">
</head>

<body id="top">
  <div id="container">
    <header class="l-header">
      <div class="l-header__inner">
        <div class="l-header__modules">
          <h1><a href="/" class="logo"><img src="/inc/image/common/img_logo.svg" alt="grit"></a></h1>
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
              <a href="/news/"><span class="l-navigation__ja">お知らせ</span>NEWS</a>
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
      <div class="p-mainVisual">
        <div class="p-mainVisual__bg">
          <img src="/inc/image/top/bg_mainimg.jpg" alt="">
        </div>
        <div class="p-mainVisual__catch">
          <h2 class="p-mainVisual__catch-heading"> 建機課題解決<br> 最良のパートナー<small>を</small><br> 目指して。 </h2>
          <p class="p-mainVisual__catch-desc">
            <strong> 建設産業機械・車両に関するお客様の課題を グループ会社の連携による総合力・提案力・機動力によって、 迅速に解決いたします。 </strong>
          </p>
        </div>
      </div>
      <div id="wrapper">
        <div class="l-section l-cvArea">
          <section class="l-cvArea__inner">
            <h2 class="l-cvArea__heading">contact</h2>
            <div class="l-cvArea__linkBox">
              <a href="/contact/" class="l-cvArea__link l-cvArea__link--contact"><span>お問合せはこちら</span></a>
              <a href="/faq/" class="l-cvArea__link l-cvArea__link--faq"><span>よくある質問</span></a>
            </div>
          </section>
        </div>
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
  <script src="/inc/js/page/jquery.newsTicker.min.js"></script>
  <script src="/inc/js/page/slick/slick.min.js"></script>
  <script>
    $(function() {
      let currentWidth = window.innerWidth;
      let bp_sm = 768; //切り替えブレイクポイント
      let news = $('.c-newslist');
      let itemCount = $('#newslist .c-newslist > .c-newslist__item').length;
      //init
      if (itemCount != 1) {
        if (currentWidth > bp_sm) {
          newsScroll(45);
        } else {
          newsScroll(58);
        }
        //リサイズ時
        window.addEventListener("resize", function() {
          if (currentWidth == window.innerWidth) {
            return;
          }
          if (currentWidth > bp_sm) {
            news.css('height', '73px'); //PC時の高さ
          } else {
            news.css('height', '72px'); //タブレット以下時の高さ
          }
          currentWidth = window.innerWidth;
        });
      }
      //news ticker
      function newsScroll(height) {
        let options = {
          row_height: height,
          max_rows: 1,
          speed: 400,
          direction: 'up',
          duration: 5000,
          autostart: 1,
          pauseOnHover: 1
        }
        $('#newslist .c-newslist').newsTicker(options);
      }
      //スライダー
      $('[data-js="slider"]').slick({
        centerMode: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        fade: true,
        slidesToShow: 1,
        arrows: false,
        centerPadding: 0,
        pauseOnHover: false,
      });
    });
  </script>
</body>

</html>