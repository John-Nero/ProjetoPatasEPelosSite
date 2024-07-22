document.getElementById("abrir_menu").addEventListener("click", function () {
  let menu_lateral = document.getElementById("menu_lateral");

  menu_lateral.style.height = "100%";
  menu_lateral.style.width = "250px";
});

document.getElementById("fechar_menu").addEventListener("click", function () {
  let menu_lateral = document.getElementById("menu_lateral");
  menu_lateral.style.height = "0";
  menu_lateral.style.width = "0";
});

// Seleciona todos os botões do menu principal
document.addEventListener("DOMContentLoaded", function () {
  var menuButtons = document.querySelectorAll(".menu-button");

  menuButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      var parentItem = this.parentNode;

      // Fecha todos os submenus abertos, exceto o do item clicado
      document.querySelectorAll(".menu-item").forEach(function (item) {
        if (item !== parentItem) {
          item.classList.remove("show");
        }
      });

      // Alterna a visibilidade do submenu do botão clicado
      if (parentItem.classList.contains("show")) {
        parentItem.classList.remove("show");
      } else {
        parentItem.classList.add("show");
      }
    });
  });

  // Seleciona todos os botões do submenu
  var filterButtons = document.querySelectorAll(".filter-button");

  filterButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Obtém o filtro associado ao botão
      var filter = this.getAttribute("data-filter");
      console.log("Filtro aplicado:", filter);

      // Aqui você pode adicionar a lógica para aplicar o filtro aos seus dados
    });
  });
});

// Submeter o formulário para atualizar a variável PHP
function filtrar(Pet) {
  window.location.href =
    "http://localhost/site-patasepelos/produto.php?c=" + Pet;
}
