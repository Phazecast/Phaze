
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
    
    
    
}
?>