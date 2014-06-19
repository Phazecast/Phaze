
<meta charset="UTF-8">
<title>Login - PHAZE</title>
<form method="post" action="login.php"  >
    <p>Login: <input name="campLogin" type="text"  />  
    <p>Senha: <input type="password" name="campSenha"/>
        <input type="submit" name="logar" value="Logar"/>

</form>
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
        $_SESSION['permissao'] = $vetUsuarios['pemissao'];// variavel permissao e fiz a mesma coisa

        if ($_SESSION['permissao'] == 1) { // se permissao for igual a 1 entao vai ir pra pagina de adm
            
            header("location:admHome.php");
        } else {
            
           
            header("location:login.php");
            
        }
    } else {

        echo "<script>  alert('Dados incorretos');  </script>";
    }
}
?>