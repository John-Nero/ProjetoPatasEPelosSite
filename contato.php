<?php
 
// Importar classes do PHPMailer para o espaço de nomes global
// Estas devem estar no topo do seu script, não dentro de uma função
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
 
$ok = 0;
 
if(isset($_POST['email'])){
 
 
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
 
 
    // Carregar o autoloader do Composer
    require 'mailer/Exception.php';
    require 'mailer/PHPMailer.php';
    require 'mailer/SMTP.php';
   
    // Criar uma instância; passar `true` habilita exceções
    $mail = new PHPMailer(true);
 
    try {
        // Configurações do servidor
 
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Habilitar saída de depuração detalhada
        $mail->isSMTP();                                            // Enviar usando SMTP
        $mail->Host       = 'smtp.hostinger.com.br';                // Definir o servidor SMTP para enviar
        $mail->SMTPAuth   = true;                                   // Habilitar autenticação SMTP
        $mail->Username   = 'pethouse@ti22.smpsistema.com.br';    // Nome de usuário SMTP
        $mail->Password   = 'Senac@pethouse01';                           // Senha SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Habilitar criptografia TLS
        $mail->Port       = 465;                                    // Porta TCP para conectar-se
 
        // Destinatários
        $mail->setFrom('pethouse@ti22.smpsistema.com.br', 'pet house');
        $mail->addAddress('pethouse@ti22.smpsistema.com.br');                 // Adicionar um destinatário
 
        // Conteúdo
        $mail->isHTML(true);                                        // Definir formato de e-mail para HTML
        $mail->Subject = 'Teacher Camila';
       
        $mail->Body    = "
            <strong> Mensagem da Teacher Camila </strong>
            <br><br>
            <strong> Nome: </strong> $nome <br>
            <strong> Email: </strong> $email <br>
            <strong> Telefone: </strong> $fone <br>
            <strong> Mensagem: </strong> $mens
        ";
       
        $mail->AltBody = "
        <strong> Mensagem da Teacher Camila </strong>
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
        echo "Erro do Mailer: {$mail->ErrorInfo}";
    }
 
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Teacher Camila</title>

    <!--Link para o arquivo que da um reset maneiro na pagina (Tem que ficar antes pq se n reseta tudo mo perigo)-->
    <link rel="stylesheet" href="css/reset.css">

    <!--Ícones do Google-->

    <!--Location-ON-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!--Mail-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!--Slick-->

    <link rel="stylesheet" href="css/slick.css">

    <link rel="stylesheet" href="css/slick-theme.css">

    <!--Animate CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!--Link pro css do site pra ficar bonitinho-->

    <link rel="stylesheet" href="css/estilo_contato.css">

    <!--Responsivo-->

    <link rel="stylesheet" href="css/mobile.css">

</head>

<body>
    <main>
        <section class="entreEmContato">
            <div class="site">
                <div>
                    <img src="img\banners\EntreEmContato.svg"
                        alt="Entre em contato agora mesmo. Marque seu horário e tire suas Duvidas">

                    <h2>Fale conosco e agende o seu horário, agora mesmo !</h2>
                </div>
            </div>

        </section>
        <section class="form">
        <img src="img\PG_contato\FundoFormulario.svg" alt="">
            <div class="site">
                
                <h3 class="confirm">
                    <?php
                    if($ok == 1){
                        echo $nome . ", sua mensagem foi enviada com sucesso.";
                    }else if($ok == 2){
                        echo $nome . ", não foi possível enviar sua mensagem.";
                    }
                    ?>
                </h3>

                <form class="formulario" action="#" method="POST">
                    <div>
                        <div>
                            <h2>Nome</h2>
                            <input type="text" name="nome" id="nome" placeholder="Digite o seu nome e sobrenome" required>
                            <!--o nome e o id é como se fosse a variavel, o placeholder é pro texto ficar dentro do input q é uma caixa q tem o tipo texto e o required é para ser um campo obrigatorio, tendeu?-->
                        </div>
                        <div>
                            <h2>Telefone</h2>
                            <input type="tel" name="tel" id="tel" placeholder="DDD + Celular" required>
                        </div>
                        <div>
                            <h2>Email</h2>
                            <input type="email" name="email" id="email" placeholder="Digite seu email   " required>
                        </div>
                        <span><img src="img\enfeites\DetalhesForms.svg" alt=""></span>
                    </div>
                    <div>
                        <div>
                            <h2>Descreva o que deseja</h2>
                            <textarea name="mens" id="mens" cols="30" rows="10"
                                placeholder="Informe sua mensagem:"></textarea>
                        </div>
                        <div>
                            <div><img src="img\enfeites\iconWhatsappForm.svg" alt="icone whatsapp"><button
                                    onclick="EnviarWhats()"> Enviar por WhatsApp </button></div>
                            <div><img src="img\enfeites\iconEmailForms.svg" alt="Icon email"><input type="submit"
                                    value="Enviar por e-mail"></div>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </main>
</body>