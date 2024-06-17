<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area do cliente</title>
    <link rel="icon" href="img\favicon.ico">

    <!--Reseta o estilo-->
    <link rel="stylesheet" href="css/reset.css" />

    <!--Aponta para o arquivo de estilo-->
    <link rel="stylesheet" href="css/estilo_Login_e_Cadastro.css" />
    <link rel="stylesheet" href="css/mobile.css" />
</head>

<body>
    <header>
        <div class="topoLogin">
            <img src="img\Logo_Patas_e_pelos.svg" alt="Logo do patas e pelos">
            <div>
                <ul class="menu_icones">
                    <li>
                        <a href="#"><img src="img/menu/login.svg" alt="Login" draggable=false></a>
                    </li>
                    <li>
                        <a href="#"><img src="img/menu/favoritos.svg" alt="Favoritos" draggable=false></a>
                    </li>
                </ul>
                <hr>

                <h1>Login/Registro</h1>
            </div>
        </div>
    </header>
    <main>
        <div>
            <form class="formulario" action="#" method="POST">
                <div class="formLogin">
                    <div><span><img src="img\PG_area-do-cliente\Estrelas esquerda.svg" alt="Aglomerado de his"></span><span></span></div>
                    <div>
                        <h2>Login</h2>
                        <input type="text" name="login" id="login" placeholder="Digite o seu Login" required>
                        <!--o name e o id é como se fosse a variavel, o placeholder é pro texto ficar dentro do input q é uma caixa q tem o tipo texto e o required é para ser um campo obrigatorio, tendeu?-->
                    </div>
                    <div>
                        <h2>Senha</h2>
                        <input type="text" name="senha" id="senha" placeholder="Digite sua senha" required>
                        <!--o name e o id é como se fosse a variavel, o placeholder é pro texto ficar dentro do input q é uma caixa q tem o tipo texto e o required é para ser um campo obrigatorio, tendeu?-->
                    </div>

                    <div><input type="submit" value="entrar"></div>
                </div>
            </form>
        </div>

    </main>
</body>

</html>