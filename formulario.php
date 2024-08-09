<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contato - Patas e pelos Pethouse</title>
    <link rel="icon" href="img/favicon.ico">
    
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>
<body>
    <!-- Aqui você pode incluir o restante do conteúdo da sua página, se desejar -->

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const urlParams = new URLSearchParams(window.location.search);
            const status = urlParams.get('status');
            
            if (status === '1') {
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Mensagem enviada com sucesso!',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then(function() {
                    window.location.href = 'contato.php'; // Redirecione para a página do formulário
                });
            } else if (status === '2') {
                Swal.fire({
                    title: 'Erro!',
                    text: 'Houve um erro ao enviar a mensagem.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                }).then(function() {
                    window.location.href = 'contato.php'; // Redirecione para a página do formulário
                });
            }
        });
    </script>
</body>
</html>
