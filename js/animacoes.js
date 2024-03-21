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
  slidesToScroll: 5,
  autoplay: false,
  autoplaySpeed: 5000
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
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 2000
});