<html>

    <meta charset="UTF-8">
    <title>Login - PHAZE</title>
    <link rel="shortcut icon" href="Recursos/Imagens/favicon.png" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <head>
        <style>
            body {
                background-image: url(Imagens/bg2.png);
                color: white;
            }
        </style>
    </head>
    <body>
        <div id="logoADM">
            <center> <img style="width: 80%" src="Imagens/logo.png" /></center>

        </div>
        <div id="formADM" align="center">
            <form method="post" action="login.php" class="pure-form">

                <p>Login &nbsp; <input name="campLogin" type="text" required="true" /></p>
                <p>Senha &nbsp; <input type="password" name="campSenha" required="true" /></p>
                <br/>
                <div class="g-recaptcha" data-sitekey="6LfmhxsTAAAAAH7YBgyPjnwPiECK9J49Mgct7ATM"></div>
                <br/>
                <p><input class="pure-button pure-button-primary" type="submit" name="logar" value="Logar" /></p>

            </form>
        </div>
    </body>
</html>

<?php

if (isset($_POST['logar'])) {
    
    //
    // VALIDAÇÃO reCaptcha
    //
    
    if (isset($_POST['g-recaptcha-response'])){
        $captcha_data = $_POST['g-recaptcha-response'];
    }

    // Se nenhum valor foi recebido, o usuário não realizou o captcha
    if (!$captcha_data){
        echo "Por favor, confirme o captcha.";
        exit;
    }

    $resposta = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LfmhxsTAAAAAAQ2ehxRUnkGwxYUdDMW6G5BxH2z&response=".$captcha_data."&remoteip=".$_SERVER['REMOTE_ADDR']));
    
    //
    // VALIDAÇÃO NORMAL
    //
    
    // através do metodo POST eu pego o valod do campo e coloco na variavel
    //note que o que esta entre [](colchetes) é o nome do campo
    $login = $_POST['campLogin'];
    $senha = $_POST['campSenha'];

    include './Admin/conectaBanco.php';
    
    // fazendo um select e o que retornar do select é salvo na variavel usuarios
    $usuarios = mysql_query("select * from usuario where login_usuario = '$login' and senha_usuario='$senha'"); 
    // criei um vetor usando mysql_fetch_assoc e estou salvando o resultado nele
    $vetUsuarios = mysql_fetch_assoc($usuarios); 

    // se retornou alguma informaçao do banco
    if ($vetUsuarios AND $resposta->{'success'}) {
        session_start(); //iniciando a sessao. esta variavel inicia sessao

        $_SESSION['nome'] = $vetUsuarios['nome_usuario']; // criei uma variavel de sessao chamada nome e mandei pra ela o campo nome do banco de dados
        $_SESSION['permissao'] = $vetUsuarios['permissao']; // variavel permissao e fiz a mesma coisa
        $_SESSION['codUsuario'] = $vetUsuarios['cod_usuario'];

        if ($_SESSION['permissao'] == 1 or $_SESSION['permissao']==2) { // se permissao for igual a 1 entao vai ir pra pagina de adm
            
            header("location:Admin/phazeADM.php");
            
        } else {
            $_SESSION['permissao'] = 1;
            header("location:Admin/phazeADM.php");
            //header("location:login.php");
        }
    } else {

        echo "<script>  alert('Dados incorretos');  </script>";
    }
}
    
?>