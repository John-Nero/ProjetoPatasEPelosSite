function filtrar(pagina) {
  switch (pagina) {
    case "banner":
      var status = document.getElementById("filtragemStatusBanner").value;
      var pagina = document.getElementById("filtragemPaginaBanner").value;
      window.location.href = "http://localhost/Site-PatasEPelos/admin/index.php?p=" + pagina + "&status=" + status + "&pagina=" + pagina;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;
    case "depoimento":
      var status = document.getElementById("filtragemStatusDepo").value;
      window.location.href = "http://localhost/Site-PatasEPelos/admin/index.php?p=" + pagina + "&status=" + status;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;

    case "cliente":
      var status = document.getElementById("filtragemStatusCliente").value;
      window.location.href = "http://localhost/Site-PatasEPelos/admin/index.php?p=" + pagina + "&status=" + status;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;
    default:
      break;
  }

  // Submeter o formulário para atualizar a variável PHP
}
