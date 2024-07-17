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
