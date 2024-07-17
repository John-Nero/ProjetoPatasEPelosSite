/*BANNER*/
$(".banner").slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
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
        slidesToScroll: 1,
      },
    },
  ],
});

/*EQUIPE*/
$(".carrosel_equipe").slick({
  slide: "div",
  centerMode: true,
  autoplay: true,
  centerPadding: "0",
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: false,
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
  asNavFor: ".carrosel_depo_texto",
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
  asNavFor: ".carrosel_depo_imagem",
});

//---------------PAGINA SERVIÇOS-------------------------------

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
        slidesToScroll: 1,
      },
    },
  ],
});

let parallax = document.getElementsByClassName("parallax");
new simpleParallax(parallax, {
  overflow: true,
  delay: 0.6,
  transition: "cubic-bezier(0,0,0,1)",
});



document.addEventListener("DOMContentLoaded", function () {
  const popups = document.querySelectorAll(".popup");

  popups.forEach(function (popup) {
    popup.addEventListener("mouseenter", function () {
      const popupContent = this.querySelector(".popup-content");
      if (popupContent) {
        popupContent.style.display = "block";
      }
    });

    popup.addEventListener("mouseleave", function () {
      const popupContent = this.querySelector(".popup-content");
      if (popupContent) {
        popupContent.style.display = "none";
      }
    });
  });
});

//---------------PAGINA SOBRE NÓS-------------------------------
$(".carrosel_Marcas").slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  cssEase: "linear",
  responsive: [
    {
      breakpoint: 901,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      },
    },
  ],
});

/* FORM WhatsAPP */
function EnviarWhats() {
  let assunto = "Site Oficina Auto Mestre";
  let nome = "*Nome:* " + document.getElementById("nome").value;
  let email = "*E-mail:* " + document.getElementById("email").value;
  let fone = "*Fone:* " + document.getElementById("fone").value;
  let mens = "*Mens:* " + document.getElementById("mens").value;

  let numeroWhats = "5511997548991";

  let quebraDeLinha = "%0A";

  var mensagem = encodeURIComponent(
    assunto +
      quebraDeLinha +
      nome +
      quebraDeLinha +
      email +
      quebraDeLinha +
      fone +
      quebraDeLinha +
      mens
  );

  window.open(
    "https://api.whatsapp.com/send?phone=" + numeroWhats + "&text=" + mensagem,
    "_blank"
  );

  // Limpar os valores dos campos do formulário
  document.getElementById("nome").value = "";
  document.getElementById("email").value = "";
  document.getElementById("fone").value = "";
  document.getElementById("mens").value = "";
}
