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
  <title>
    <?php the_title(); ?>｜採用情報｜grit</title>
  <script src="/inc/js/page/viewport-extra.min.js"></script>
  <script>new ViewportExtra(375);</script>
  <link rel="icon" href="/inc/image/favicon.ico" type="image/x-icon">
  <meta name="description" content="<?php the_title(); ?>の記事です。">
  <meta property="og:site_name" content="grit" />
  <meta property="og:title" content="<?php the_title(); ?>｜採用情報｜grit" />
  <meta property="og:description" content="<?php the_title(); ?>の記事です。" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="<?php the_permalink(); ?>">
  <meta property="og:image" content="/inc/image/common/img_ogp.jpg" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="<?php the_permalink(); ?>">
  <meta name="twitter:image" content="/inc/image/common/img_ogp.jpg">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/inc/css/style.css">
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="/inc/css/page/form.css">
  <link rel="stylesheet" type="text/css" href="/inc/css/page/recruit.css">
  <?php
  $content = get_the_content();
?>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "JobPosting",
      "title": "<?php the_title(); ?>",
      "description": "<?php echo $content; ?>",
      "datePosted": "<?php the_modified_date('Y-m-d') ?>",
      "validThrough": "",
      "employmentType": "<?php the_field('employmentType'); ?>",
      "hiringOrganization": {
        "@type": "Organization",
        "name": "一般社団法人 広島グリットサッカークラブ"
      },
      "jobLocation": {
        "@type": "Place",
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "<?php the_field('acf_workplace_address'); ?>",
          "addressLocality": "<?php the_field('acf_workplace_locality'); ?>",
          "addressRegion": "<?php the_field('acf_workplace_region'); ?>",
          "postalCode": "<?php the_field('acf_workplace_postalCode'); ?>",
          "addressCountry": "JP"
        }
      },
      "baseSalary": {
        "@type": "MonetaryAmount",
        "currency": "JPY",
        "value": {
          "@type": "QuantitativeValue",
          "value": "<?php the_field('acf_salary-min'); ?>",
          "minValue": "<?php the_field('acf_salary-min'); ?>", //省略可
          "maxValue": "<?php the_field('acf_salary-max'); ?>", //省略可
          "unitText": "<?php the_field('acf_salary_term'); ?>" //HOUR,DAY,WEEK,MONTH,YEAR
        }
      }
    }
  </script>
</head>

<body id="single-recruit">
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
              <small>
                <?php the_title(); ?></small> Recruit </h1>
          </div>
          <ul class="c-topicspath">
            <li><a href="/">HOME</a></li>
            <li><a href="/recruit/">採用情報</a></li>
            <li>
              <?php the_title(); ?>
            </li>
          </ul>
        </div>
      </div>
      <div id="contents" class="l-lower">
        <div class="l-section p-mainImg" data-pfwform-hide-if-confirm>
          <?php if(has_post_thumbnail()): ?>
          <img src="<?php the_post_thumbnail_url(); ?>" alt="採用情報">
          <?php else: ?>
          <img src="/inc/image/recruit/pic_noImg.jpg" alt="採用情報">
          <?php endif?>
          <div class="p-mainImg__body">
            <?php if(have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
            <?php endwhile; endif; ?>
          </div>
        </div>
        <div class="l-section--lightBlue l-section--lightBlue--band" data-pfwform-hide-if-confirm>
          <section class="l-section l-section--sm">
            <h2 class="c-ttl-2 c-ttl-2--line c-ttl--mbLarge">
              <small>JOB DESCRIPTION</small>
              <span>募集要項</span>
            </h2>
            <table class="c-tbl c-tbl__block">
              <tbody>
                <tr>
                  <th>職種</th>
                  <td>
                    <?php the_title(); ?>
                  </td>
                </tr>
                <tr>
                  <th>雇用形態</th>
                  <td>
                    <?php the_field('employmentType'); ?>
                  </td>
                </tr>
                <tr>
                  <th>資格</th>
                  <td>
                    <?php the_field('acf_sikaku'); ?>
                  </td>
                </tr>
                <tr>
                  <th>年齢</th>
                  <td>
                    <?php the_field('acf_nenrei'); ?>
                  </td>
                </tr>
                <tr>
                  <th>勤務時間</th>
                  <td>
                    <?php the_field('acf_worktime'); ?>
                  </td>
                </tr>
                <tr>
                  <th>勤務予定地</th>
                  <td> &#12306;
                    <?php the_field('acf_workplace_postalCode'); ?><br>
                    <?php the_field('acf_workplace_region'); ?>
                    <?php the_field('acf_workplace_locality'); ?>
                    <?php the_field('acf_workplace_address'); ?>
                  </td>
                </tr>
                <tr>
                  <th>給与</th>
                  <td>
                    <?php
              $salary_term = get_post_meta($post->ID, 'acf_salary_term', true);
              $maxValue = get_post_meta($post->ID, 'acf_salary-max', true);
              if($salary_term == 'HOUR'):
            ?> 時給
                    <?php elseif($salary_term == 'DAY'): ?> 日給
                    <?php elseif($salary_term == 'WEEK'): ?> 週給
                    <?php elseif($salary_term == 'MONTH'): ?> 月給
                    <?php elseif($salary_term == 'YEAR'): ?> 年給
                    <?php endif; ?> &emsp;
                    <?php the_field('acf_salary-min'); ?>円 ～
                    <?php if(strlen($maxValue) != 0): ?>
                    <?php the_field('acf_salary-max'); ?>円
                    <?php endif; ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </section>
        </div>
        <section class="l-section l-section--sm p-form">
          <h2 class="c-ttl-2 c-ttl-2--line c-ttl--mbLarge">
            <small>ENTRY FORM</small>
            <span>エントリーフォーム</span>
          </h2>
          <section class="c-step" data-pfwform-hide-if-confirm>
            <h2 class="c-step__title">エントリー内容をご入力ください。</h2>
            <ul class="c-step__list">
              <li class="c-step__item is-active">内容の入力</li>
              <li class="c-step__item">入力内容の確認</li>
              <li class="c-step__item">送信完了</li>
            </ul>
          </section>
          <section class="c-step" data-pfwform-show-if-confirm>
            <h2 class="c-step__title">入力内容をご確認ください。</h2>
            <ul class="c-step__list">
              <li class="c-step__item">内容の入力</li>
              <li class="c-step__item is-active">入力内容の確認</li>
              <li class="c-step__item">送信完了</li>
            </ul>
          </section>
          <div class="error" data-pfwform-show-if-error>
            <p>入力不備の項目がございます。<br>お手数ですが、もう一度入力内容をご確認ください。</p>
          </div>
          <?php
    $domain = (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"];
  ?>
          <form class="pfwform h-adr" action="#" method="post" data-pfwform-action="pfwform.php" data-pfwform-token-generator="pfwform-token.php" data-pfwform-confirm>
            <table class="c-tbl c-tbl__block">
              <tbody>
                <tr data-pfwform-class-if-error="form_error" data-pfwform-target="応募職種">
                  <th class="c-tbl__head"> 応募職種 <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
                  </th>
                  <td>
                    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
                      <select class="" name="応募職種" data-pfwform-required>
                        <?php
                  $workType = get_the_title();
                  $args = array(
                    'posts_per_page' => -1,
                    'post_type' => array('recruit'),
                    'orderby' => 'date',
                    'order' => 'ASC'
                  );
                  $my_posts = get_posts($args);
                ?>
                        <option value="">選択してください</option>
                        <?php foreach ($my_posts as $post) : setup_postdata($post); ?>
                        <option value="<?php echo get_the_title($post->ID); ?>" <?php if ($workType==get_the_title($post->ID)):?> selected="selected"
                          <?php endif;?>>
                          <?php echo get_the_title($post->ID); ?>
                        </option>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                      </select>
                      <div class="form_error_wrap" data-pfwform-show-if-error="応募職種">
                        <div class="form_error_inner">
                          <i class="fa fa-exclamation-triangle"></i>
                          <ul>
                            <li>応募職種を正しく入力してください。</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="form_group_wrap" data-pfwform-show-if-confirm>
                      <p data-pfwform-confirm-value="応募職種"></p>
                    </div>
                  </td>
                </tr>
                <tr data-pfwform-class-if-error="form_error" data-pfwform-target="お名前">
                  <th class="c-tbl__head"> お名前 <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
                  </th>
                  <td>
                    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
                      <div class="form_group_inner">
                        <div class="txt">
                          <input type="text" name="お名前" value="" placeholder="山田 太郎" data-pfwform-required>
                        </div>
                      </div>
                      <div class="form_error_wrap" data-pfwform-show-if-error="お名前">
                        <div class="form_error_inner">
                          <i class="fa fa-exclamation-triangle"></i>
                          <ul>
                            <li>お名前を正しく入力してください。</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="form_group_wrap" data-pfwform-show-if-confirm>
                      <p data-pfwform-confirm-value="お名前"></p>
                    </div>
                  </td>
                </tr>
                <tr data-pfwform-class-if-error="form_error" data-pfwform-target="郵便番号">
                  <th class="c-tbl__head"> 郵便番号 <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
                  </th>
                  <td>
                    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
                      <div class="form_group_inner">
                        <div class="txt">
                          <input type="text" class="form-control p-postal-code" name="郵便番号" data-pfwform-required data-pfwform-class-if-success="has_success" data-pfwform-class-if-error="form-control-danger">
                        </div>
                      </div>
                      <div class="form_error_wrap" data-pfwform-show-if-error="郵便番号">
                        <div class="form_error_inner">
                          <i class="fa fa-exclamation-triangle"></i>
                          <ul>
                            <li>郵便番号を正しく入力してください。</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="form_group_wrap" data-pfwform-show-if-confirm>
                      <p data-pfwform-confirm-value="郵便番号"></p>
                    </div>
                  </td>
                </tr>
                <tr data-pfwform-class-if-error="form_error" data-pfwform-target="住所">
                  <th class="c-tbl__head"> 住所 <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
                  </th>
                  <td>
                    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
                      <div class="form_group_inner">
                        <div class="txt wdh100">
                          <input type="text" class="form-control long p-region p-locality p-street-address p-extended-address" name="住所" data-pfwform-required data-pfwform-class-if-success="has_success" data-pfwform-class-if-error="form-control-danger">
                        </div>
                      </div>
                      <div class="form_error_wrap" data-pfwform-show-if-error="住所">
                        <div class="form_error_inner">
                          <i class="fa fa-exclamation-triangle"></i>
                          <ul>
                            <li>住所を正しく入力してください。</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="form_group_wrap" data-pfwform-show-if-confirm>
                      <p data-pfwform-confirm-value="住所"></p>
                    </div>
                  </td>
                </tr>
                <tr data-pfwform-class-if-error="form_error" data-pfwform-target="電話番号">
                  <th class="c-tbl__head"> 電話番号 <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
                  </th>
                  <td>
                    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
                      <div class="form_group_inner">
                        <div class="txt">
                          <input type="tel" name="電話番号" value="" placeholder="123-4567-8901" data-pfwform-required>
                        </div>
                      </div>
                      <div class="form_error_wrap" data-pfwform-show-if-error="電話番号">
                        <div class="form_error_inner">
                          <i class="fa fa-exclamation-triangle"></i>
                          <ul>
                            <li>電話番号を正しく入力してください。</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="form_group_wrap" data-pfwform-show-if-confirm>
                      <p data-pfwform-confirm-value="電話番号"></p>
                    </div>
                  </td>
                </tr>
                <tr class="form_wrap" data-pfwform-class-if-error="form_error" data-pfwform-target="メールアドレス">
                  <th class="c-tbl__head"> メールアドレス <span class="ico must" data-pfwform-hide-if-confirm>必須</span>
                  </th>
                  <td>
                    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
                      <div class="form_group_inner">
                        <div class="txt wdh100">
                          <input class="long" type="text" name="メールアドレス" value="" placeholder="tarou@example.com" data-pfwform-type="email" data-pfwform-required>
                        </div>
                        <p>送信内容の控えメールを自動送信いたします。<br>携帯電話メールの方は迷惑メール設定をご確認ください。</p>
                      </div>
                      <div class="form_error_wrap" data-pfwform-show-if-error="メールアドレス">
                        <div class="form_error_inner">
                          <i class="fa fa-exclamation-triangle"></i>
                          <ul>
                            <li>メールアドレスを正しく入力してください。</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="form_group_wrap" data-pfwform-show-if-confirm>
                      <p data-pfwform-confirm-value="メールアドレス"></p>
                    </div>
                  </td>
                </tr>
                <tr class="form_wrap" data-pfwform-class-if-error="form_error" data-pfwform-target="お問い合わせ内容">
                  <th class="c-tbl__head"> お問い合わせ内容 <span class="ico optional" data-pfwform-hide-if-confirm>任意</span>
                  </th>
                  <td>
                    <div class="form_group_wrap" data-pfwform-hide-if-confirm>
                      <div class="form_group_inner">
                        <div class="txt">
                          <textarea name="お問い合わせ内容" cols="40" rows="10" class="type_box"></textarea>
                        </div>
                      </div>
                      <div class="form_error_wrap" data-pfwform-show-if-error="お問い合わせ内容">
                        <div class="form_error_inner">
                          <i class="fa fa-exclamation-triangle"></i>
                          <ul>
                            <li>お問い合わせ内容を正しく入力してください。</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="form_group_wrap" data-pfwform-show-if-confirm>
                      <p data-pfwform-confirm-value="お問い合わせ内容"></p>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
            <div class="l-btnArea">
              <div class="agree" data-pfwform-class-if-error="form_error" data-pfwform-target="個人情報の取扱い" data-pfwform-hide-if-confirm>
                <fieldset>
                  <input type="checkbox" name="個人情報の取扱い" value="同意する" id="agree" data-pfwform-required>
                  <label class="checkbox" for="agree"><a href="/privacy/" target="_blank" rel="noopener">個人情報の取扱い</a>に同意します。<span class="ico must">必須</span></label>
                  <div class="form_error_wrap" data-pfwform-show-if-error="個人情報の取扱い">
                    <div class="form_error_inner">
                      <i class="fa fa-exclamation-triangle"></i>
                      <ul>
                        <li>上記内容に同意いただけない場合、送信できません。</li>
                      </ul>
                    </div>
                  </div>
                </fieldset>
              </div>
              <button class="c-btn c-btnForm button button_step btn_form" type="submit" data-pfwform-hide-if-confirm>入力内容の確認へ</button>
              <div class="l-btnArea__confirm">
                <button class="c-btn c-btnForm back" type="button" data-pfwform-show-if-confirm data-pfwform-back-button>前に戻る</button>
                <button class="c-btn c-btnForm" type="submit" data-pfwform-show-if-confirm>上記内容で送信</button>
              </div>
            </div>
          </form>
        </section>
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
  <script type="text/javascript" src="/inc/js/page/form/pfwform.min.js"></script>
</body>

</html>