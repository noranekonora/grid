/*-----------------------------------------------
 共通JS
-----------------------------------------------*/

$(function(){

  createHamburgerMenu();
  createAccordion();
  createPageTop();
  createTab();
  $('[data-js="js-matchHeight"]').matchHeight();


//  $(window).on('load', function() {

//    createAnchorScroll();
    clickAnchorScroll();

//  });

});

function clickAnchorScroll () {

  $('a[href^="#"]:not([class*="modal"])').on('click', function () {
      if( $(this).closest('[data-js="tab"]').length > 0 ) { return false; }

      var speed = 1000;
      var hh = $(".l-header__inner").innerHeight();
      var href= $(this).attr("href");
      var $target = $(href == "#" || href == "" ? 'html' : href);

      if ($target.length) {
        var pos = $target.offset().top - hh;
        $("html, body").animate({scrollTop:pos}, speed, "swing");
      }

      return false;
  });

}
function createAccordion () {
  $('[data-js="accordion"] .c-accordion__title').on('click', function () {
    $(this).toggleClass('open');
    $('+.c-accordion__body',this).slideToggle();
  });
}

//  pageTop scroll
function createPageTop () {
  var $pagetop = $('a[data-js="pagetop"]');
  if ( $(window).width() > 768 ) $pagetop.hide();
  window.addEventListener('scroll', function() {
    if ( $(window).scrollTop() > 200 ) {
      $pagetop.fadeIn();
    } else {
      $pagetop.fadeOut();
    }
  });

  $pagetop.on('click', function (e) {
    e.preventDefault();
    $('html,body').animate({scrollTop:0},1000);
    return false;
  });
}

// Tab
function createTab () {
  var t_item = $('[data-js="tab"] .c-tab__select .c-tab__item > a:not([target="_blank"])');
  var t_article = $('[data-js="tab"] .c-tab__body .c-tab__article');

  t_item.on('click', function (e) {
    e.preventDefault();
    var t_target = $(this).attr('href');
    //active付与
    $(this).parent().siblings().removeClass('is-active');
    $(this).parent().addClass('is-active');
    //show付与
    $(t_target).siblings().removeClass('is-show')
    $(t_target).addClass('is-show');
  });

  // hash付きで遷移した場合、対象のタブを表示
  var hash = location.hash;
  var t = $('[data-js="tab"] .c-tab__select .c-tab__item > a[href="'+ hash +'"]');
  var hash_target = $(hash);
  if ( hash.length ) {
    t.parent().siblings().removeClass('is-active');
    t.parent().addClass('is-active');
    hash_target.siblings().removeClass('is-show');
    hash_target.addClass('is-show');
  }

  $(window).on('resize', function(){
    //横にスライドできます表記出現条件
    $('[data-js="tab"]').each(function () {
      var tab_item = $(this).find('.c-tab__item');
      var totalTabWidth = 0;
      tab_item.each(function() {
        totalTabWidth += tab_item.outerWidth();
      })
      if ( totalTabWidth >= $(window).width() ) {
        $(this).addClass('add_attention');
      } else {
        $(this).removeClass('add_attention');
      }
    });
  });
}

// スクロールしたらメインビジュアル下でヘッダーをスライドイン------------
var imgHeight = $('.js-mainVisual').outerHeight(); //画像の高さを取得。これがイベント発火位置になる。
var header = $('.js-header'); //ヘッダーコンテンツ
$(window).on('load scroll', function(){
  if ($(window).scrollTop() < imgHeight) {
    //メインビジュアル内にいるので、クラスを外す。
    header.removeClass('l-header--fixed');    
  }else {
    //メインビジュアルより下までスクロールしたので、クラスを付けて色を変える
    header.addClass('l-header--fixed');
  }
});
