/*BANNER*/
$(".banner").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000
});

$(".banner_servico").slick({
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
  centerMode: true,
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
  autoplay: false,
  autoplaySpeed: 2000,
  asNavFor: ".carrosel_depo_imagem"
});

// $(".carrosel_servico").slick({
//   slidesToShow: 3,
//   slidesToScroll: 1,
//   arrows: false,
//   dots: false,
//   infinite: true,
//   responsive: [
//     {
//       breakpoint: 600,
//       settings: {
//         slidesToShow: 3,
//         slidesToScroll: 1
//       }
//     }
//   ]
// });

// Inicializando o carrossel com a biblioteca slick
$(".carrosel_servico").slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  arrows: false,
  dots: false,
  infinite: true,
  responsive: [
      {
          breakpoint: 600,
          settings: {
              slidesToShow: 1,
              slidesToScroll: 1
          }
      }
  ]
});

// Adicionando as classes 'impar' e 'par' aos slides
$('.carrosel_servico').on('init reInit afterChange', function(event, slick, currentSlide, nextSlide) {
  // Remover classes existentes
  $('.carrosel_servico .slick-slide').removeClass('impar par');
  
  // Loop através de todos os slides visíveis
  $('.carrosel_servico .slick-slide').each(function(index) {
      // Adiciona a classe impar ou par com base no índice
      if (index % 2 === 0) {
          $(this).addClass('par');
      } else {
          $(this).addClass('impar');
      }
  });
});

// Inicializar o carrossel para garantir que as classes sejam aplicadas
$('.carrosel_servico').slick('slickGoTo', 0);

let parallax = document.getElementsByClassName('parallax');
new simpleParallax(parallax, {
  overflow: true,
	delay: .6,
	transition: 'cubic-bezier(0,0,0,1)'
});

let parallax1 = document.getElementsByClassName('parallax1');
new simpleParallax(parallax1, {
  overflow: true,
	delay: .6,
	transition: 'cubic-bezier(0,0,0,1)'
});

let parallax2 = document.getElementsByClassName('parallax2');
new simpleParallax(parallax2, {
  overflow: true,
	delay: .6,
	transition: 'cubic-bezier(0,0,0,1)'
});
