<?php

// Importar classes do PHPMailer para o espaço de nomes global
// Estas devem estar no topo do seu script, não dentro de uma função
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Isso aqui indica se deu tudo certo mais pra frente
$ok = 0;

//Ta confirmando se o email ta prenchido caso esteja ele continua
if (isset($_POST['email'])) {

    //Declaração das variaveis pra passar pelo corpo do email
    $nome   = $_POST['nome'];
    $email  = $_POST['email'];
    $fone   = $_POST['fone'];
    $mens   = $_POST['mens'];


    //chama a ClassContato pra usar os metodos dela
    require_once('admin/class/ClassContato.php');

    //instancia a ClassContato
    $contato = new ClassContato();

    //Atribui Valores as variaveis da ClassContato
    $contato->nomeContato = $nome;
    $contato->emailContato = $email;
    $contato->telefoneContato = $fone;
    $contato->mensagemContato = $mens;
    $contato->statusContato = "ATIVO";

    //chamammos o metodo de inserrir, como a  gente alimentou as variaveis da classe logo ali encima ele vai direto
    $contato->Inserir();


    // Carregar o autoloader do Composer
    require 'mailer/Exception.php';
    require 'mailer/PHPMailer.php';
    require 'mailer/SMTP.php';

    // Criar uma instância; passar `true` habilitando as exceções
    $mail = new PHPMailer(true);

    //SERVIDOR E MENSSAGEM DO EMAIL
    try {
        // --------CONFIGURAÇÕES DO SERVIDOR

        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Habilitar saída de depuração detalhada
        $mail->isSMTP();                                            // Enviar usando SMTP
        $mail->Host       = 'smtp.hostinger.com.br';                // Definir o servidor SMTP para enviar  --aqui tem q usar o seu proprio ein
        $mail->SMTPAuth   = true;                                   // Habilitar autenticação SMTP
        $mail->Username   = 'pethouse@ti22.smpsistema.com.br';      // Nome de usuário SMTP                 --aqui tem q usar o seu proprio ein
        $mail->Password   = 'Senac@pethouse01';                     // Senha SMTP                           --aqui tem q usar o seu proprio ein
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Habilitar criptografia TLS
        $mail->Port       = 465;                                    // Porta TCP para conectar-se

        // --------FIM CONFIGURAÇÕES DO SERVIDOR

        // Destinatários
        $mail->setFrom('pethouse@ti22.smpsistema.com.br', 'pet house');       // Adicionar um Remetente
        $mail->addAddress('pethouse@ti22.smpsistema.com.br');                 // Adicionar um destinatário

        // Conteúdo
        $mail->isHTML(true);                                                  // Definir formato de e-mail para HTML

        $mail->Subject = 'Patas E pelos';                        // Titulo do email

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
        $ok = 1;                                     //caso tudo tenha dado certo ele só segue a vida
    } catch (Exception $e) {
        $ok = 2;                                     //caso tudo tenha dado Errado ele retonra com um salve
        echo "Erro do Mailer: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contato - Patas e pelos Pethouse</title>

    <!--Link para o arquivo que da um reset maneiro na pagina (Tem que ficar antes pq se n reseta tudo mo perigo)-->
    <link rel="stylesheet" href="css/reset.css">

    <!--Slick-->
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/slick-theme.css">

    <!--Link pro css do site pra ficar bonitinho-->
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="css/estilo_contato.css">

    <!--Responsivo-->
    <link rel="stylesheet" href="css/mobile.css">

</head>

<body>
    <header>

        <!--FAIXA MENU-->
        <?php include_once 'conteudos/menu_superior.php' ?>
        <!--FIM FAIXA MENU-->

    </header>
    <main>
        <section class="entreEmContato">
            <div class="site">

                <!--Imagem do topo e o fale conosco acima do form-->
                <div>
                    <img src="img\PG_contato\entreEmContatoBanner.svg" alt="Entre em contato agora mesmo. Marque seu horário e tire suas Duvidas" draggable=false>
                    <h2>Fale conosco e agende o seu horário, agora mesmo !</h2>
                </div>
            </div>

        </section>

        <!--Form-->
        <section class="form">
            <img src="img\PG_contato\fundoFormulario1200.svg" alt="" draggable=false>
            <img src="img\PG_contato\fundoFormularioResponsivo.svg" alt="" draggable=false>

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
                        <span><img src="img\PG_contato\cachorrosEEstrelasForm.svg" alt="" draggable="false"></span>
                    </div>
                    <div>
                        <div>
                            <h2>Descreva o que deseja</h2>
                            <textarea name="mens" id="mens" cols="30" rows="10" placeholder="Digite sua mensagem aqui"></textarea>
                        </div>
                        <div>
                            <div><img src="img\PG_contato\icons\iconWhatsappForm.svg" alt="icone whatsapp" draggable=false><button onclick="EnviarWhats()">Whatsapp</button></div>
                            <div><img src="img\PG_contato\icons\iconEmailForms.svg" alt="Icon email" draggable=false><input type="submit" value="Email"></div>
                        </div>
                    </div>
                </form>
            </div>

        </section>
    </main>

    <!--arquivo de configuração das animações-->
    <script src="js/animacoes.js"></script>
</body>