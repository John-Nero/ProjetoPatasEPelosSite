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
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 601,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }
  ]
});

/*EQUIPE*/
$(".carrosel_equipe").slick({
  slide: "div",
  centerMode: true,
  centerPadding: "0",
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: false
});

/*DEPOIMENTO*/

/*Esse gira as imagens dos depoimentos*/
$(".carrosel_depo_imagem").slick({
  dots: true,
  infinite: true,
  speed: 500,
  fade: true,
  cssEase: "linear",
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  autoplaySpeed: 2000,
  asNavFor: ".carrosel_depo_texto"
});

/*Para os dois girarem juntos a gente ta chamando o asNavFor fazendo referencia um do outro em cada configuração*/

/*Esse gira os textos*/
$(".carrosel_depo_texto").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 500,
  fade: true,
  autoplay: false,
  autoplaySpeed: 2000,
  asNavFor: ".carrosel_depo_imagem"
});

$(".lista-com-imagens").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  infinite: true,
  responsive: [
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }
  ]
});
