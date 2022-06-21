var listImg = [
    {
      listAnh: "Anh/anhheader-1.jpg"
    },
    {
      listAnh: "Anh/pepsiblack.jpg"
    },
    {
      listAnh: "Anh/anhheader-2.jpg"
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

},4000)
