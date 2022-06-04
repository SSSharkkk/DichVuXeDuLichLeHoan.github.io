$('.sidebar-img').slick({
    infinite: true,
    slidesToShow: 5,
    slidesToScroll: 2,
    arrows : false,
    autoplay: true,
    autoplaySpeed: 3000,
  });


  //


  
$('.sub-slider-img').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 3000,
    prevArrow:`<button type='button' class='slick-prev pull-left'></button>`,
    nextArrow:`<button type='button' class='slick-next pull-right'><ion-icon name="arrow-redo-outline"></ion-icon></button>`
  });



  var listImg = [
    {
      listAnh: "/anhMuaXuan/anh7.jpg"
    },
    {
      listAnh: "/anhMuaDong/anh3.jpg"
    },
    {
      listAnh: "/anhMuaDong/anhtieude - Copy.jpg"
    }
  ]


var backgroudImg = document.querySelector('.header');
var dem = 0;
setInterval(()=>{
      dem++
      if ( dem > listImg.length - 1) {
        dem = 0
      }
      backgroudImg.style.backgroundImage = `url(${listImg[dem].listAnh})`

},5000)
