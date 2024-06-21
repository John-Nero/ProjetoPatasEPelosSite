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
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }
  ]
});

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


document.addEventListener('DOMContentLoaded', function() {
  const popups = document.querySelectorAll('.popup');

  popups.forEach(function(popup) {
      popup.addEventListener('mouseenter', function() {
          const popupContent = this.querySelector('.popup-content');
          if (popupContent) {
              popupContent.style.display = 'block';
          }
      });

      popup.addEventListener('mouseleave', function() {
          const popupContent = this.querySelector('.popup-content');
          if (popupContent) {
              popupContent.style.display = 'none';
          }
      });
  });
});