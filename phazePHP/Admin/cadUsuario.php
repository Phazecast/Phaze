<?php
@session_start();

if(isset($_SESSION['nome']) and $_SESSION['permissao']==1) {

?>
<head>
    <meta charset="utf-8"/>
    <title>ADM - PHAZE</title>
    <link rel="shortcut icon" href="Recursos/Imagens/favicon.png" />
</head>
<body>
    <div id="aplicacao">
        
        <h1>Cadastro de Usuario</h1>
        <br/>

        <form action="cadUsuario.php" method="POST" class="pure-form"> 

            <div class="label">Nome</div>
            <input type="text" name="nomeUsuario"required="true" /> 
            <br><br>

            <div class="label">Login</div>
            <input type="text" name="loginUsuario" required="true" /> 
            <br><br>

            <div class="label">Senha</div>
            <input type="password" name="senhaUsuario" required="true"  />
            <br><br>

            <div class="label">Confirmação Senha</div>
            <input type="password" name="senhaUsuario2" required="true"  />
            <br><br>

            <div class="label">Permissão</div>
            <select name="permissaoUsuario">
                <option value="1">Administrador</option>
                <option value="2">Usuario Comum</option>
            </select>
            <br><br>

            <div class="label">&nbsp;</div>
            <input class="pure-button pure-button-primary" type="submit" value="Salvar" name="salvaUsuario" />

        </form>
    </div>
</body>
        
<?php

    if (isset($_POST['salvaUsuario'])) 
    {
        $nomeUser = $_POST['nomeUsuario'];
        $loginUser = $_POST['loginUsuario'];
        $senhaUser = $_POST['senhaUsuario'];
        $confSenha = $_POST['senhaUsuario2'];
        $permissaoUser = $_POST['permissaoUsuario'];

        if ($senhaUser === $confSenha) 
        {
            include './usuario.class.php';
            $usuario = new Usuario($nomeUser, $loginUser, $senhaUser, $permissaoUser);
            $usuario->SalvarUsuario();
        } 
        else 
        {
            echo "<script> alert('Senhas diferentes!'); </script>";
        }
    }
}
else
{
    header("location:phazeADM.php");
}

?>
