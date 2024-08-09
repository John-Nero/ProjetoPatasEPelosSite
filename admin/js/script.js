function filtrar(pagina) {
  switch (pagina) {
    case "banner":
      var status = document.getElementById("filtragemStatusBanner").value;
      var paginaSelecionada = document.getElementById(
        "filtragemPaginaBanner"
      ).value;
      console.log(pagina);
      window.location.href =
        "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" +
        pagina +
        "&status=" +
        status +
        "&pagina=" +
        paginaSelecionada;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;

    case "depoimento":
      var status = document.getElementById("filtragemStatusDepo").value;
      window.location.href =
        "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" +
        pagina +
        "&status=" +
        status;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;

    case "cliente":
      var status = document.getElementById("filtragemStatusCliente").value;
      window.location.href =
        "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" +
        pagina +
        "&status=" +
        status;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;

    case "categoria":
      var status = document.getElementById("filtragemStatusCategoria").value;
      window.location.href =
        "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" +
        pagina +
        "&status=" +
        status;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;
    case "galeria":
      var status = document.getElementById("filtragemStatusGaleria").value;
      window.location.href =
        "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=" +
        pagina +
        "&status=" +
        status;
      // Atualizar o valor do campo hidden para enviar ao PHP
      break;
  }

  document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".avaliacao_estrela input").forEach((input) => {
      input.addEventListener("change", () => {
        document.getElementById("rating-value").textContent = input.value;
      });
    });
  });

  // Submeter o formulário para atualizar a variável PHP
}

// Função para manipular o login do administrador
function LoginAdmin() {
  // Adiciona um ouvinte de eventos de clique ao formulário de login do administrador
  $("#FormLoginAdmin").click(function () {
    var formData = $("#FormLoginAdmin").serialize(); // Serializa os dados do formulário em uma string de consulta

    // Envia uma requisição AJAX para o servidor
    $.ajax({
      url: "./class/ClassFuncionario.php",
      method: "POST",
      data: formData,
      dataType: "json",

      // SUCCESS
      success: function (data) {
        // Verifica se a resposta indica sucesso
        if (data.success) {
          // Exibe uma mensagem de sucesso
          $("#msgLogin").html(
            "<div class='msgLogin'>" + data.success + "</div>"
          );

          var idFuncionario = data.idFuncionario; // Obtém o ID do mecânico da resposta
          window.location.href =
            "https://pethouse.smpsistema.com.br/john/Patas_e_pelos/admin/index.php?p=banner&status=todos&pagina=todas"; // Redireciona para o dashboard do administrador
        } else {
          // Exibe uma mensagem de login inválido
          $("#msgInvalido").html(
            "<div class='msgInvalido'>" + data.success + "</div>"
          );
        }
      },
      // FIM SUCCESS

      // ERROR
      error: function (xhr, status, error) {
        console.log(error); // Exibe o erro no console
        console.log("Resposta completa:", xhr.responseText); // Exibe a resposta completa do servidor
      }, // FIM ERROR
    });
  });
}



