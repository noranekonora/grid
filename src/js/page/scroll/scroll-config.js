$(function(){
  var $obj = {
      target: $(".p-history__scroll")
  };
  const history = document.querySelector('.p-history__scroll');
  var currentWidth = window.innerWidth;

  $('.p-history__scroll').perfectScrollbar();//スクロールをカスタマイズ
  window.addEventListener("resize", function() {
    if (currentWidth == window.innerWidth) {
      return;
    }
    $('.p-history__scroll').perfectScrollbar();

    currentWidth = window.innerWidth;
  });

  history.addEventListener("wheel", _mousewheel, { passive: false });
  history.addEventListener("wheel", noScroll, { passive: false });

  //沿革画像の上でスクロールしたら右へスライド
  function _mousewheel(e) {
    var _left = $obj.target.scrollLeft() + e.deltaY;
    $obj.target.scrollLeft(_left);
    var _scroll_end = $obj.target.find('img.all_mi_pc').width() - $obj.target.width() - 10;
    if(
      _scroll_end > $obj.target.scrollLeft() && e.deltaY > 0 ||
      $obj.target.scrollLeft() > 0 && e.deltaY < 0
    ) {
      e.preventDefault();
    }
  }

  //縦方向スクロールキャンセル
  function noScroll(e) {
    e.preventDefault();
  }

});