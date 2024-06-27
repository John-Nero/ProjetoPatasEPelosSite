function filtrar() {
  var caixaDeopcao = document.getElementById("filtragemStatus");
  var opcao = caixaDeopcao.value;
  // Atualizar o valor do campo hidden para enviar ao PHP
console.log(opcao);
  document.getElementById("valorSelecionado").value = opcao;
  
  // Submeter o formulário para atualizar a variável PHP
  document.getElementById("paginaHomeFiltragemBanner").submit();
}
