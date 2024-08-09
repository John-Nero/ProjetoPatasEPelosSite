<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$ok = 0;

if (isset($_POST['email'])) {

    $nome   = $_POST['nome'];
    $email  = $_POST['email'];
    $fone   = $_POST['fone'];
    $mens   = $_POST['mens'];

    require_once('admin/class/ClassContato.php');

    $contato = new ClassContato();

    $contato->nomeContato = $nome;
    $contato->emailContato = $email;
    $contato->telefoneContato = $fone;
    $contato->mensagemContato = $mens;
    $contato->statusContato = "ATIVO";

    $contato->Inserir();

    require 'mailer/Exception.php';
    require 'mailer/PHPMailer.php';
    require 'mailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com.br';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'pethouse@ti22.smpsistema.com.br';
        $mail->Password   = 'Senac@pethouse01';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('pethouse@ti22.smpsistema.com.br', 'pet house');
        $mail->addAddress('pethouse@ti22.smpsistema.com.br');

        $mail->isHTML(true);
        $mail->Subject = 'Patas E pelos';

        $mail->Body    = "
            <strong> Novo contato Patas E pelos </strong>
            <br><br>
            <strong> Nome: </strong> $nome <br>
            <strong> Email: </strong> $email <br>
            <strong> Telefone: </strong> $fone <br>
            <strong> Mensagem: </strong> $mens
        ";

        $mail->AltBody = "
            <strong> Novo contato Patas E pelos </strong>
            <br><br>
            <strong> Nome: </strong> $nome <br>
            <strong> Email: </strong> $email <br>
            <strong> Telefone: </strong> $fone <br>
            <strong> Mensagem: </strong> $mens    
        ";

        $mail->send();
        $ok = 1;
    } catch (Exception $e) {
        $ok = 2;
        $errorMessage = "Erro do Mailer: {$mail->ErrorInfo}";
    }

    // Redirecionar para a página de resultado
    header('Location: formulario.php?status=' . $ok);
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contato - Patas e pelos Pethouse</title>
    <link rel="icon" href="img/favicon.ico">


    <!--Link para o arquivo que da um reset.min maneiro na pagina (Tem que ficar antes pq se n reset.mina tudo mo perigo)-->
    <link rel="stylesheet" href="css/reset.min.css">

    <!--Slick-->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">

    <!--Link pro css do site pra ficar bonitinho-->
    <link rel="stylesheet" href="css/estilo.min.css">
    <link rel="stylesheet" href="css/estilo_contato.min.css">

    <!--Responsivo-->
    <link rel="stylesheet" href="css/mobile.css">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>


</head>

<body>
    <header>

        <!--FAIXA MENU-->
        <?php include_once 'conteudos/menu-superior.php' ?>
        <!--FIM FAIXA MENU-->

    </header>
    <main>
        <section class="entreEmContato">
            <div class="site">

                <!--Imagem do topo e o fale conosco acima do form-->
                <div>
                    <img src="img/PG_contato/entreEmContatoBanner.svg" alt="Entre em contato agora mesmo. Marque seu horário e tire suas Duvidas" draggable=false>
                    <h2>Fale conosco e agende o seu horário, agora mesmo !</h2>
                </div>
            </div>

        </section>

        <!--Form-->
        <section class="form">
            <img src="img/PG_contato/fundoFormulario1200.svg" alt="" draggable=false>
            <img src="img/PG_contato/fundoFormularioResponsivo.svg" alt="" draggable=false>

            <div class="site">

                <h3 class="confirm">
                    <?php
                    if ($ok == 1) {
                        echo $nome . ", sua mensagem foi enviada com sucesso.";
                    } else if ($ok == 2) {
                        echo $nome . ", não foi possível enviar sua mensagem.";
                    }
                    ?>
                </h3>

                <form class="formulario" action="#" method="POST">
                    <div>
                        <div>
                            <h2>Nome</h2>
                            <input type="text" name="nome" id="nome" placeholder="Digite o seu nome e sobrenome" required>
                            <!--o name e o id é como se fosse a variavel, o placeholder é pro texto ficar dentro do input q é uma caixa q tem o tipo texto e o required é para ser um campo obrigatorio, tendeu?-->
                        </div>
                        <div>
                            <h2>Telefone</h2>
                            <input type="tel" name="fone" id="fone" placeholder="DDD + Celular" required>
                        </div>
                        <div>
                            <h2>Email</h2>
                            <input type="email" name="email" id="emall" placeholder="Digite seu email" required>
                        </div>
                        <span><img src="img/PG_contato/cachorrosEEstrelasForm.svg" alt="" draggable="false"></span>
                    </div>
                    <div>
                        <div>
                            <h2>Descreva o que deseja</h2>
                            <textarea name="mens" id="mens" cols="30" rows="10" placeholder="Digite sua mensagem aqui"></textarea>
                        </div>
                        <div>
                            <div><img src="img/PG_contato/icons/iconWhatsappForm.svg" alt="icone whatsapp" draggable=false><button onclick="EnviarWhats()">Whatsapp</button></div>
                            <div><img src="img/PG_contato/icons/iconEmailForms.svg" alt="Icon email" draggable=false><input type="submit" value="Email"></div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!--RODAPÉ-->
        <?php include_once 'conteudos/rodape.php' ?>
        <!--FIM RODAPÉ-->
    </main>

    <!--Script de funções js-->
    <script src="js/script.js">
    </script>

    <!--arquivo de configuração das animações-->
    <script src="js/animacoes.js"></script>
</body>