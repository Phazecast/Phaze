
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
    
    $usuarios = mysql_query("select * from usuario where login = '$login' and senha='$senha'");
    $vetUsuarios = mysql_fetch_assoc($usuarios); 
    
    if ($vetUsuarios) {// se retornou alguma informaçao do banco
        
        session_start(); //iniciando a sessao

        $_SESSION['nome'] = $vetUsuarios['nome'];


        if ($_SESSION['acesso'] == 1) {

            header("location:listaEscolas.php");
        } else {

            header("location:listaEscolasVisitante.php");
        }
    } else {

        echo "<script>  alert('Dados incorretos');  </script>";
    }
    
}
?>