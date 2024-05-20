    <?php 

    //Importa as classes do PHPMailer para o espaço de nomes global
    //Essas aq tem q ta no topo se n da pau
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //VARIAVEL DE CONFIRMAÇÃO
    $ok = 0;

    //CASO O CAMPO EMAIL NÃO ESTEJA NULL ELE EXECUTA OS COMANDOS DO IF
    if(isset($POST['email'])){

        //INSERINDO OS DADOS NAS VARIAVEIS VINDO DE DENTRO DO FORM
        $nome   = $_POST['nome'];
        $email  = $_POST['email'];
        $fone   = $_POST['fone'];
        $mens   = $_POST['mens'];
    
        //CHAMA O CLASS CONTATO
        require_once('admin/classes/ClassContato.php');
    
        //INSTANCIA UM NOVO CLASSCONTATO NA VARIAVEL CONTATO
        $contato = new ClassContato();
    
        //ATRIBUI OS VALORES DA NOVA CLASSCONTATO USANDO OS DADOS QUE FORAM PASSADOS ACIMA
        $contato->nomeContato = $nome;
        $contato->emailContato = $email;
        $contato->telefoneContato = $fone;
        $contato->mensagemContato = $mens;
        $contato->statusContato = "ativo";
    
        //CHAMA O METODO PARA INSERIR UM NOVO CADASTRO NO DB
        $contato->Inserir();
    
    
        // CARREGA OS AUTO LOADER 
        require 'mailer/Exception.php';
        require 'mailer/PHPMailer.php';
        require 'mailer/SMTP.php';
    
        // CRIA UMA INSTANCIA E PASSA TRUE PRA FUNCIONA
        $mail = new PHPMailer(true);
    
        try {
            //CONFIGURAÇÕES DA CONEXÃO DO SERVIDOR DO SERVIDOR 

            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                          // Habilitar saída de depuração detalhada  ||só deixa ativo nos testes
            $mail->isSMTP();                                                // Enviar usando SMTP                      ||default
            $mail->Host       = 'smtp.hostinger.com.br';                    // Definir o servidor SMTP para enviar     ||aqui vem qual o host q tu usa, no caso aq é o do ricas
            $mail->SMTPAuth   = true;                                       // Habilitar autenticação SMTP             ||default
            $mail->Username   = 'pethouse@ti22.smpsistema.com.br';          // Nome de usuário SMTP                    ||é p campo email la q o ricas mandou
            $mail->Password   = 'Senac@pethouse01';                         // Senha SMTP                              ||senha do email
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                // Habilitar criptografia TLS              ||default
            $mail->Port       = 465;                                        // Porta TCP para conectar-se              ||default geralmente
    
            // Destinatários
            $mail->setFrom('pethouse@ti22.smpsistema.com.br', 'PATAS E PELOS');
            $mail->addAddress('lennondepaulak9@gmail.com');                 // Adicionar um destinatário
    
            // Conteúdo
            $mail->isHTML(true);                                        // Definir formato de e-mail para HTML
            $mail->Subject = 'Site Oficina Auto Mestre';                //Titulo do email
        
            //corpo do email aq vai aquelas parafernalha pra fica bonitinho
            $mail->Body    = "
                <strong> PATAS E PELOS </strong>
                <br><br>
                <strong> Nome: </strong> $nome <br>
                <strong> Email: </strong> $email <br>
                <strong> Telefone: </strong> $fone <br>
                <strong> Mensagem: </strong> $mens
            ";
        
            $mail->AltBody = "
            <strong> PATAS E PELOS alt </strong>
                <br><br>
                <strong> Nome: </strong> $nome <br>
                <strong> Email: </strong> $email <br>
                <strong> Telefone: </strong> $fone <br>
                <strong> Mensagem: </strong> $mens    
            ";
            $mail->send();                                     //Ta enviando essa c4 pro destinario
            $ok = 1;                                           //se der certo o ok recebe 1
        } catch (Exception $e) {
            $ok = 2;                                           //se nao recebe 2 e da um salve pelo echo
            echo "Erro do Mailer: {$mail->ErrorInfo}";
        }
    
    }
    ?>


    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Patas e pelos Pethouse</title>
        <!--Reseta o estilo-->
        <link rel="stylesheet" href="css/reset.css" />

        <!--API do google para os icones-->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

        <!--API do google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto:wght@900&1display=swap"
            rel="stylesheet" />

        <!--SLICK-->
        <link rel="stylesheet" href="css/slick.css" />
        <link rel="stylesheet" href="css/slick-theme.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

        <!--Aponta para o arquivo de estilo-->

        <link rel="stylesheet" href="css/estilo_contato.css">
        <link rel="stylesheet" href="css/mobile.css" />
    </head>

    <body>
        <header>
            <!--FAIXA MENU-->
            <?php include_once 'conteudos/menu_superior.php' ?>
            <!--FIM FAIXA MENU-->
        </header>
        <main>
            <section class="form">
                <div class="site">
                    <h2>CONTATO</h2>
                    <?php
                if($ok == 1){
                echo $nome . ", sua mensagem foi enviada com sucesso.";
                }else if($ok == 2){
                echo $nome . ", não foi possível enviar sua mensagem.";
                }?>
                    <h2>Fale Conosco e agende o seu horário, agora mesmo !</h2>
                    <div class="conteudo_principal">
                        <!--    <span><img src="img\enfeites\blobs_roxo.svg" alt=""></span> -->
                        <form action="#" method="POST">
                            <div>
                                <div><label for=""></label>
                                    <input type="text" name="nome" id="nome"
                                        placeholder="Digite o seu nome e sobrenome: " required>
                                </div>
                            </div>
                            <div>
                                <div><input type="tel" name="tel" id="tel" placeholder="DDD + Celular " required></div>
                            </div>
                            <div>
                                <div><input type="email" name="email" id="email" placeholder="Digite o seu e-mail: "
                                        required></div>
                            </div>
                            <div>
                                <div>
                                    <textarea name="mens" id="mens" cols="30" rows="10"
                                        placeholder="Digite sua mensagem aqui:"></textarea>
                                </div>
                                <div>
                                    <button onclick="eviarzap()"><span><img src="" alt=""></span>Whatsapp</button>
                                    <input type="submit" value="Email">
                                </div>
                            </div>

                        </form>
                        <!--  <span><img src="img\enfeites\blobs_laranja.svg" alt=""></span>-->
                    </div>
                </div>
            </section>
            <!--jQuery-->
            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <!--sempre o primeiro pq o bicho é enjoado slc kk-->

            <!--Sclick JS-->
            <script src="js/slick.min.js"></script>

            <!--WOW-->
            <script src="js/wow.min.js"></script>

            <script src="js/animacoes.js"></script>
            <!--sempre o ultimo blz? (esse aq é humilde)-->


        </main>
    </body>