
<meta charset="UTF-8">
<form method="post" action="login.php"  >
    <p>Login: <input name="campLogin" type="text"  />  
    <p>Senha: <input type="text" name="campSenha"/>
        <input type="button" name="logar" value="Logar"/>

</form>
<?php
if (isset($_POST['logar'])) {

    $login = $_POST['campLogin'];
    $senha = $_POST['campSenha'];

    include './conectaBanco.php';

    $usuarios = mysql_query("select * from usuario where nick_usuario = '$login' and senha_usuario='$senha'");
    $vetUsuarios = mysql_fetch_assoc($usuarios);

    if ($vetUsuarios) {// se retornou alguma informaçao do banco
        session_start(); //iniciando a sessao

        $_SESSION['nome'] = $vetUsuarios['nome_usuario'];
        $_SESSION['permissao'] = $vetUsuarios['permissao'];

        if ($_SESSION['permissao'] == 1) {
            
            header("location:admHome.php");
        } else {

            header("location:login.php");
        }
    } else {

        echo "<script>  alert('Dados incorretos');  </script>";
    }
}
?>