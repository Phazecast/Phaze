<?php
@session_start();

if(isset($_SESSION['nome']) and $_SESSION['permissao']==1) {


?>
<center> <h1> - Cadastro de Usuario - </h1> </center> <br/><br/>
<meta charset="utf-8" />
<div align="center">
    
    <form action="cadUsuario.php" method="POST"> 

        <table border="0">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nome:</td>
                    <td><input type="text" name="nomeUsuario"required="true" /> </td>
                </tr>
                <tr>
                    <td>Login:</td>
                    <td><input type="text" name="loginUsuario" required="true" /> </td>
                </tr>
                <tr>
                    <td>Senha:</td>
                    <td> <input type="password" name="senhaUsuario" required="true"  /> </td>
                </tr>
                <tr>
                    <td>Confirmação Senha:</td>
                    <td> <input type="password" name="senhaUsuario2" required="true"  /></td>
                </tr>
                <tr>
                    <td>Permissão:</td>
                    <td><select name="permissaoUsuario">
                            <option value="1">Administrador</option>
                            <option value="2">Usuario Comum</option>
                        </select>  </td>
                </tr>
            </tbody>
        </table> <br /> <br />
        <input type="submit" value="Salvar" name="salvaUsuario" />

    </form>
</div>

<?php

if (isset($_POST['salvaUsuario'])) {

    $nomeUser = $_POST['nomeUsuario'];
    $loginUser = $_POST['loginUsuario'];
    $senhaUser = $_POST['senhaUsuario'];
    $confSenha = $_POST['senhaUsuario2'];
    $permissaoUser = $_POST['permissaoUsuario'];


    if ($senhaUser === $confSenha) {

        include './usuario.class.php';

        $usuario = new Usuario($nomeUser, $loginUser, $senhaUser, $permissaoUser);

        $usuario->SalvarUsuario();
    } else {

        echo "<script> alert('Senhas diferentes!'); </script>";
    }
}

}else{
    
    header("location:phazeADM.php");
    
}


?>
