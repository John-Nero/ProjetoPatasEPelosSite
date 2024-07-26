document.addEventListener("DOMContentLoaded", function () {
  // Inicialização do Slick Carousels
  function initializeSlick(selector, settings) {
    if (document.querySelector(selector)) {
      $(selector).slick(settings);
    }
  }

  const slickSettings = {
    banner: {
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
    },
    categorias: {
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    },
    equipe: {
      slide: "div",
      centerMode: true,
      autoplay: false,
      centerPadding: "0",
      slidesToShow: 3,
      slidesToScroll: 1,
    },
    depo_imagem: {
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
    },
    depo_texto: {
      slidesToShow: 1,
      slidesToScroll: 1,
      speed: 500,
      fade: true,
      autoplay: false,
      autoplaySpeed: 2000,
      asNavFor: ".carrosel_depo_imagem",
    },
    servico: {
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
    },
    marcas: {
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 4,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
      ],
    },
  };

  // Inicializar todos os carrosséis
  initializeSlick(".banner", slickSettings.banner);
  initializeSlick(".carrosel_categorias", slickSettings.categorias);
  initializeSlick(".carrosel_equipe", slickSettings.equipe);
  initializeSlick(".carrosel_depo_imagem", slickSettings.depo_imagem);
  initializeSlick(".carrosel_depo_texto", slickSettings.depo_texto);
  initializeSlick(".carrosel_servico", slickSettings.servico);
  initializeSlick(".carrosel_Marcas", slickSettings.marcas);

  // Efeito parallax
  const parallaxElements = document.getElementsByClassName("parallax");
  if (parallaxElements.length > 0) {
    new simpleParallax(parallaxElements, {
      overflow: true,
      delay: 0.6,
      transition: "cubic-bezier(0,0,0,1)",
    });
  }

  // Popups
  const popups = document.querySelectorAll(".popup");
  popups.forEach((popup) => {
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

// Envio de mensagem WhatsApp
function EnviarWhats() {
  let assunto = "Patas e pelos";
  let nome = "*Nome:* " + document.getElementById("nome").value;
  let email = "*E-mail:* " + document.getElementById("email").value;
  let fone = "*Fone:* " + document.getElementById("fone").value;
  let mens = "*Mens:* " + document.getElementById("mens").value;

  let numeroWhats = "5511997548991";
  let quebraDeLinha = "%0A";

  var mensagem = encodeURIComponent(
    `${assunto}${quebraDeLinha}${nome}${quebraDeLinha}${email}${quebraDeLinha}${fone}${quebraDeLinha}${mens}`
  );

  window.open(
    `https://api.whatsapp.com/send?phone=${numeroWhats}&text=${mensagem}`,
    "_blank"
  );

  // Limpar os valores dos campos do formulário
  document.getElementById("nome").value = "";
  document.getElementById("email").value = "";
  document.getElementById("fone").value = "";
  document.getElementById("mens").value = "";
}
