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
    <?php the_title(); ?>｜grit</title>
  <script src="/inc/js/page/viewport-extra.min.js"></script>
  <script>new ViewportExtra(375);</script>
  <link rel="icon" href="/inc/image/favicon.ico" type="image/x-icon">
  <meta name="description" content="gritの「<?php the_title(); ?>」についてのページです。">
  <meta property="og:site_name" content="grit" />
  <meta property="og:title" content="<?php the_title(); ?>｜grit" />
  <meta property="og:description" content="gritの「<?php the_title(); ?>」についてのページです。" />
  <meta property="og:type" content="article" />
  <meta property="og:url" content="">
  <meta property="og:image" content="/inc/image/common/img_ogp.jpg" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="">
  <meta name="twitter:image" content="/inc/image/common/img_ogp.jpg">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP:400,500,700&display=swap&subset=japanese" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/inc/css/style.css">
  <?php wp_head(); ?>
  <link rel="stylesheet" type="text/css" href="/inc/css/page/form.css">
</head>

<body id="page">
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
              <a href="/news/"><span class="l-navigation__ja">お知らせ</span>NEWS</a>
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
              <small>
                <?php the_title(); ?></small>
            </h1>
          </div>
          <ul class="c-topicspath">
            <li><a href="/">HOME</a></li>
            <li>
              <?php the_title(); ?>
            </li>
          </ul>
        </div>
      </div>
      <div id="contents" class="l-lower">
        <div class="l-section">
          <section class="c-step" data-pfwform-hide-if-confirm>
            <h2 class="c-step__title">お問い合わせ内容をご入力ください。</h2>
            <ul class="c-step__list">
              <li class="c-step__item is-active">内容の入力</li>
              <li class="c-step__item">入力内容の確認</li>
              <li class="c-step__item">送信完了</li>
            </ul>
          </section>
          <?php echo do_shortcode('[contact-form-7 id="43" title="お問合せ"]'); ?>
          <div class="c-privacy">
            <section class="l-section">
              <h2 class="c-ttl-2 c-ttl-2--line"><span>プライバシーポリシー</span></h2>
              <p>当社は、本ウェブサイト上で提供するサービス（以下、「本サービス」といいます。）におけるプライバシー情報の取扱いについて、以下のとおりプライバシーポリシー（以下、「本ポリシー」といいます。）を定めます。</p>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第1条（プライバシー情報）</h3>
                <ul>
                  <li>プライバシー情報のうち「個人情報」とは、個人情報保護法にいう「個人情報」を指すものとし、生存する個人に関する情報であって、当該情報に含まれる氏名、生年月日、住所、電話番号、連絡先その他の記述等により特定の個人を識別できる情報を指します。</li>
                  <li>プライバシー情報のうち「履歴情報および特性情報」とは、上記に定める「個人情報」以外のものをいい、ご覧になったページ、広告の履歴、ユーザーが検索された検索キーワード、ご利用日時、ご利用の方法、ご利用環境、郵便番号、性別、職業、年齢、ユーザーのIPアドレス、クッキー情報、位置情報、端末の個体識別情報などを指します。</li>
                </ul>
              </section>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第2条（プライバシー情報の収集方法）</h3>
                <ul>
                  <li>当社は、ユーザーが利用登録をする際に氏名、生年月日、住所、電話番号、メールアドレスなどの個人情報をお尋ねすることがあります。また、ユーザーと提携先などとの間でなされたユーザーの個人情報を含む取引記録を当社の提携先（情報提供元、広告主、広告配信先などを含みます。以下、｢提携先｣といいます。）などから収集することがあります。</li>
                  <li>当社は、ユーザーについて、閲覧したページ、広告の履歴、検索した検索キーワード、利用日時、利用方法、利用環境（携帯端末を通じてご利用の場合の当該端末の通信状態、利用に際しての各種設定情報なども含みます）、IPアドレス、クッキー情報、位置情報、端末の個体識別情報などの履歴情報および特性情報を、ユーザーが当社や提携先のサービスを利用しまたはページを閲覧する際に収集します。</li>
                </ul>
                <section class="analysis_tool">
                  <h4>＊アクセス解析ツールについて</h4>
                  <p>当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。<br> このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。このトラフィックデータは匿名で収集されており、個人を特定するものではありません。この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。この規約に関して、詳しくは<a href="https://www.google.com/analytics/terms/jp.html" target="_blank" rel="noopener">ここをクリック</a>してください。</p>
                </section>
              </section>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第3条（個人情報を収集・利用する目的）</h3>
                <p>当社が個人情報を収集・利用する目的は、以下のとおりです。</p>
                <ul class="c-list c-list--count--brackets">
                  <li class="c-list__item">ユーザーに自分の登録情報の閲覧や修正、利用状況の閲覧を行っていただくために、氏名、住所、連絡先などの登録情報などに関する情報を表示する目的</li>
                  <li class="c-list__item">ユーザーにお知らせや連絡をするためにメールアドレスを利用する場合や必要に応じて連絡したりするため、氏名や住所などの連絡先情報を利用する目的</li>
                  <li class="c-list__item">ユーザーが簡便にデータを入力できるようにするために、当社に登録されている情報を入力画面に表示させたり、ユーザーのご指示に基づいて他のサービスなど（提携先が提供するものも含みます）に転送したりする目的</li>
                  <li class="c-list__item">本サービスの利用規約に違反したユーザーや、不正、不当な目的でサービスを利用しようとするユーザーの利用をお断りするために、氏名や住所など個人を特定するための情報を利用する目的</li>
                  <li class="c-list__item">ユーザーからのお問い合わせに対応するために、お問い合わせ内容など当社がユーザーに対してサービスを提供するにあたって必要となる情報や、ユーザーのサービス利用状況、連絡先情報などを利用する目的</li>
                  <li class="c-list__item">上記の利用目的に付随する目的</li>
                </ul>
              </section>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第4条（個人情報の第三者提供）</h3>
                <p>当社は、次に掲げる場合を除いて、あらかじめユーザーの同意を得ることなく、第三者に個人情報を提供することはありません。ただし、個人情報保護法その他の法令で認められる場合を除きます。</p>
                <ul class="c-list c-list--count--brackets">
                  <li class="c-list__item">法令に基づく場合</li>
                  <li class="c-list__item">人の生命、身体または財産の保護のために必要がある場合であって、本人の同意を得ることが困難であるとき</li>
                  <li class="c-list__item">公衆衛生の向上または児童の健全な育成の推進のために特に必要がある場合であって、本人の同意を得ることが困難であるとき</li>
                  <li class="c-list__item">国の機関もしくは地方公共団体またはその委託を受けた者が法令の定める事務を遂行することに対して協力する必要がある場合であって、本人の同意を得ることにより当該事務の遂行に支障を及ぼすおそれがあるとき</li>
                  <li class="c-list__item">予め次の事項を告知あるいは公表をしている場合 <ul class="c-list c-list--disc">
                      <li class="c-list__item">利用目的に第三者への提供を含むこと</li>
                      <li class="c-list__item">第三者に提供されるデータの項目</li>
                      <li class="c-list__item">第三者への提供の手段または方法</li>
                      <li class="c-list__item">本人の求めに応じて個人情報の第三者への提供を停止すること</li>
                    </ul>
                  </li>
                  <li class="c-list__item">前項の定めにかかわらず、次に掲げる場合は第三者には該当しないものとします。 <ul class="c-list c-list--count">
                      <li class="c-list__item">当社が利用目的の達成に必要な範囲内において個人情報の取扱いの全部または一部を委託する場合</li>
                      <li class="c-list__item">合併その他の事由による事業の承継に伴って個人情報が提供される場合</li>
                      <li class="c-list__item">個人情報を特定の者との間で共同して利用する場合であって、その旨並びに共同して利用される個人情報の項目、共同して利用する者の範囲、利用する者の利用目的および当該個人情報の管理について責任を有する者の氏名または名称について、あらかじめ本人に通知し、または本人が容易に知り得る状態に置いているとき</li>
                    </ul>
                  </li>
                </ul>
              </section>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第5条（個人情報の開示）</h3>
                <ul class="c-list c-list--count--brackets">
                  <li class="c-list__item">当社は、本人から個人情報の開示を求められたときは、本人に対し、遅滞なくこれを開示します。ただし、開示することにより次のいずれかに該当する場合は、その全部または一部を開示しないこともあり、開示しない決定をした場合には、その旨を遅滞なく通知します。なお、個人情報の開示に際しては、1件あたり1,000円の手数料を申し受けます。 <ul class="c-list c-list--count">
                      <li class="c-list__item">本人または第三者の生命、身体、財産その他の権利利益を害するおそれがある場合</li>
                      <li class="c-list__item">当社の業務の適正な実施に著しい支障を及ぼすおそれがある場合</li>
                      <li class="c-list__item">その他法令に違反することとなる場合</li>
                    </ul>
                  </li>
                  <li class="c-list__item">前項の定めにかかわらず、履歴情報および特性情報などの個人情報以外の情報については、原則として開示いたしません。</li>
                </ul>
              </section>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第6条（個人情報の訂正および削除）</h3>
                <ul>
                  <li>ユーザーは、当社の保有する自己の個人情報が誤った情報である場合には、当社が定める手続きにより、当社に対して個人情報の訂正または削除を請求することができます。</li>
                  <li>当社は、ユーザーから前項の請求を受けてその請求に応じる必要があると判断した場合には、遅滞なく、当該個人情報の訂正または削除を行い、これをユーザーに通知します。</li>
                </ul>
              </section>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第7条（個人情報の利用停止等）</h3>
                <p>当社は、本人から、個人情報が、利用目的の範囲を超えて取り扱われているという理由、または不正の手段により取得されたものであるという理由により、その利用の停止または消去（以下、「利用停止等」といいます。）を求められた場合には、遅滞なく必要な調査を行い、その結果に基づき、個人情報の利用停止等を行い、その旨本人に通知します。ただし、個人情報の利用停止等に多額の費用を有する場合その他利用停止等を行うことが困難な場合であって、本人の権利利益を保護するために必要なこれに代わるべき措置をとれる場合は、この代替策を講じます。</p>
              </section>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第8条（プライバシーポリシーの変更）</h3>
                <ul>
                  <li>本ポリシーの内容は、ユーザーに通知することなく、変更することができるものとします。</li>
                  <li>当社が別途定める場合を除いて、変更後のプライバシーポリシーは、本ウェブサイトに掲載したときから効力を生じるものとします。</li>
                </ul>
              </section>
              <section class="l-section__inner">
                <h3 class="c-ttl-3 c-ttl-3--line">第9条（お問い合わせ窓口）</h3>
                <p>本ポリシーに関するお問い合わせは、お問い合わせフォームからお願いいたします。</p>
              </section>
              <p>以上</p>
            </section>
          </div>
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
</body>

</html>