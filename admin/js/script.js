function filtrar(pagina) {
  switch (pagina) {
    case "banner":
      var status = document.getElementById("filtragemStatusBanner").value;
      var paginaSelecionada = document.getElementById("filtragemPaginaBanner").value;
      console.log(pagina);
      window.location.href = "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" + pagina + "&status=" + status + "&pagina=" + paginaSelecionada;
      // Atualizar o valor do campo hidden para enviar ao PHP
    break;

    case "depoimento":
      var status = document.getElementById("filtragemStatusDepo").value;
      window.location.href = "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" + pagina + "&status=" + status;
      // Atualizar o valor do campo hidden para enviar ao PHP
    break;

    case "cliente":
      var status = document.getElementById("filtragemStatusCliente").value;
      window.location.href = "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" + pagina + "&status=" + status;
      // Atualizar o valor do campo hidden para enviar ao PHP
    break;
    
    case "categoria":
      var status = document.getElementById("filtragemStatusCategoria").value;
      window.location.href = "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" + pagina + "&status=" + status;
      // Atualizar o valor do campo hidden para enviar ao PHP
    break;
    case "galeria":
      var status = document.getElementById("filtragemStatusGaleria").value;
      window.location.href = "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" + pagina + "&status=" + status;
      // Atualizar o valor do campo hidden para enviar ao PHP
    break;
    
  }

  // Submeter o formulário para atualizar a variável PHP
}
