//hamburger menu
function createHamburgerMenu () {

  var $win = $(window);
  var ww = window.innerWidth;
  var currentWidth = window.innerWidth;
  var breakpoint = 1024;

  // ---  横幅が変動した時に実行
//  $win.on('load', function () {
    checkGnavWidth();
//  });

  window.addEventListener("resize", function () {
    // ウインドウ横幅が変わっていない場合
    if ( currentWidth == window.innerWidth ) {
      return false;
    }
    checkGnavWidth();
    currentWidth = window.innerWidth; // 横幅を更新

  });

  // -- toggle action
  $('#toggle').on('click', function () {
    $(this).toggleClass('is-active');
    $('html').toggleClass('open');

    if ( $(this).hasClass('is-active') ) {
      $('#gnavi').addClass('is-active');
    } else {
      $('#gnavi').removeClass('is-active');
    }

    $('#gnavi').slideToggle( function () { // iOSバグ対策
      if( $(this).hasClass('is-active') ) {
        $(this).css('display','block');
      } else {
        //監視解除
        $(this).css('display','none');
      }
    });

    //スマホでスクロールした際に上下のバーが出てきて、高さが変わるのに対応する。
    if( ww <= breakpoint ) {
      var windowInnerHeight = window.innerHeight;
      var headerHeight = 60; //variable.scssの「$headerHeight-sp」と同じ値に。
      $('.l-navigation__inner').css('height', windowInnerHeight - headerHeight);
    }

  });


  function checkGnavWidth () {
    ww = window.innerWidth;
    $("[data-js='dropDown']").off();
    if( ww > breakpoint ) {
      $('#gnavi').css('display','block');
      $('.l-navigation__inner').css('height', 'auto');
    } else {
      $('#gnavi').css('display','none');
    }
    globalNavInit();
  }

  // --- リサイズ時の初期化
  function globalNavInit () {
    let filter = $(".l-filter");

    $("[data-js='dropDown']").on('click', function(){
      $(this).toggleClass('is-opened');
      if (filter.hasClass('is-active')) {
        filter.removeClass('is-active');
      } else {
        filter.addClass('is-active');
      }
    });

    //黒背景を押しても閉じるように
    filter.on('click', function(){
      $("[data-js='dropDown']").removeClass('is-opened');
      filter.removeClass('is-active');
    });
  }

}
