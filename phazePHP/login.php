
<html>

    <meta charset="UTF-8">
    <title>Login - PHAZE</title>
    <style>
        body{
            background-image:url(Imagens/bg2.png);
            color: white;
        }

    </style>
    <body>
        <div id="logoADM">
            <center> <img src="Imagens/logo.png"/></center>

        </div>
        <div id="formADM" align="center">
            <form method="post" action="login.php"  >

                <p>LOGIN: <input name="campLogin" type="text" required="true"/>  
                <p>SENHA: <input type="password" name="campSenha" required="true"/>
                <p> <input type="submit" name="logar" value="Logar"/>

            </form>
        </div>
    </body>
</html>
<?php
if (isset($_POST['logar'])) {
    // através do metodo POST eu pego o valod do campo e coloco na variavel
    //note que o que esta entre [](colchetes) é o nome do campo
    $login = $_POST['campLogin'];
    $senha = $_POST['campSenha'];

    include './conectaBanco.php';

    $usuarios = mysql_query("select * from usuario where login_usuario = '$login' and senha_usuario='$senha'"); // fazendo um select e o que retornar do select é salvo na variavel usuarios
    $vetUsuarios = mysql_fetch_assoc($usuarios); // criei um vetor usando mysql_fetch_assoc e estou salvando o resultado nele

    if ($vetUsuarios) {// se retornou alguma informaçao do banco
        session_start(); //iniciando a sessao. esta variavel inicia sessao

        $_SESSION['nome'] = $vetUsuarios['nome_usuario']; // criei uma variavel de sessao chamada nome e mandei pra ela o campo nome do banco de dados
        $_SESSION['permissao'] = $vetUsuarios['permissao']; // variavel permissao e fiz a mesma coisa
        $_SESSION['codUsuario'] = $vetUsuarios['cod_usuario'];

        if ($_SESSION['permissao'] == 1 or $_SESSION['permissao']==2) { // se permissao for igual a 1 entao vai ir pra pagina de adm
            header("location:phazeADM.php");
        } else {


            header("location:login.php");
        }
    } else {

        echo "<script>  alert('Dados incorretos');  </script>";
    }
}
?>