//ユーザーエージェントを使用するJSはこちらに記述する（全体共通）。

$(function(){
  var isMobile = false;
  if ('userAgentData' in window.navigator) {
    // userAgentData が有効なので、userAgentDataで判定をする
    const useAgentDataMobile = navigator.userAgentData.mobile;
    if( useAgentDataMobile ){
      isMobile = true;
    }
  }
  else {
    // userAgentData が無効なので、既存のユーザーエージェント判定をする
    if ( (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/Blackberry/i)) || (navigator.userAgent.match(/Windows Phone/i)) ) {
      isMobile = true;
    }
  }

  if ( isMobile ) {
    replaceTelNumber();
  }
});



//電話番号（GA　イベントラベルに番号付き）
function replaceTelNumber () {
  //電話番号
  $('[data-js="tel"]').each(function() {
    //.tel内のHTMLを取得
    var str = $(this).html();
    //子要素がimgだった場合、alt属性を取得して電話番号リンクを追加
    if ($(this).children().is('img')) {
      $(this).html($('<a>').attr({
        href: 'tel:' + $(this).children().attr('alt').replace(/-/g, ''),
        onclick: "gtag('event', 'アクション', {'event_category': 'カテゴリ','event_label': 'ラベル'});"
      }).append(str + '</a>'));
    } else {
      //それ以外はテキストを取得して電話番号リンクを追加
      $(this).html($('<a>').attr({
        href: 'tel:' + $(this).text().replace(/-/g, ''),
        onclick: "gtag('event', 'tap', {'event_category': '電話番号','event_label': '電話番号" + $(this).text().replace(/-/g, '') + "'});"
      }).append(str + '</a>'));
    }
  });
}