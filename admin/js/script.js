function filtrar(categoria) {
  var status = document.getElementById("filtragemStatus").value;
  var pagina = document.getElementById("filtragemPagina").value;
  // Atualizar o valor do campo hidden para enviar ao PHP

  // Submeter o formulário para atualizar a variável PHP
  window.location.href =
    "http://localhost/Site-PatasEPelos/admin/index.php?p=" + categoria + "&status=" + status + "&pagina=" + pagina;
}