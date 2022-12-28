//スライダー系
$(function() {
  // init
  workSlider();

  //事例スライダー
  function workSlider() {
    let workSlider = $('[data-js="workSlider"]');
    let count = workSlider.length;

    if( count != 0 ) {
      workSlider.slick({
        centerMode: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 1000,
        slidesToShow: 1,
        arrows: false,
        centerPadding: 0,
        pauseOnHover: false,
        dots: true
      });
    }
  }



});