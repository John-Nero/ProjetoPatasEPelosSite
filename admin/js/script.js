function filtrar() {
  var opcao = document.getElementById("filtragemStatus").value;
  // Atualizar o valor do campo hidden para enviar ao PHP

  // Submeter o formulário para atualizar a variável PHP
  window.location.href =
    "http://localhost/Site-PatasEPelos/admin/index.php?p=banner&opcao=" + opcao;
}
