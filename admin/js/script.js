function filtrar(categoria) {
  switch (categoria) {
    case "banner":
      var status = document.getElementById("filtragemStatusBanner").value;
      var pagina = document.getElementById("filtragemPaginaBanner").value;
      window.location.href = "http://localhost/Site-PatasEPelos/admin/index.php?p=" + categoria + "&status=" + status + "&pagina=" + pagina;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;
    case "depoimento":
      var status = document.getElementById("filtragemStatusDepo").value;
      window.location.href = "http://localhost/Site-PatasEPelos/admin/index.php?p=" + categoria + "&status=" + status;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;

    default:
      break;
  }

  // Submeter o formulário para atualizar a variável PHP
}
