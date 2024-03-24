/*BANNER*/
$(".banner").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000
});

/*CATEGORIAS*/
$(".carrosel_categorias").slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: false,
  responsive: [
    {
      breakpoint: 601,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
     
      }
    }
  ]
});

$('.texto_equipe').slick({
  slide: 'li',
  centerMode: true,
  centerPadding: '0',
  slidesToShow: 3,
  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ]
});

$(".carrosel_depo_imagem").slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: 'linear',
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 2000,
  asNavFor: '.carrosel_depo_texto'
});

$(".carrosel_depo_texto").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 2000,
  asNavFor: '.carrosel_depo_imagem'
});
