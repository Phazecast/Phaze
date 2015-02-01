<?php

class Usuario {

    public $nome;
    public $login;
    public $senha;
    public $permissao;

    function Usuario($nome, $login, $senha, $permissao) {
        $this->nome = $nome;
        $this->login = $login;
        $this->senha = $senha;
        $this->permissao = $permissao;
    }

    public function SalvarUsuario() {

        try {
            include './conectaBanco.php';

            $pesqUsuario = mysql_query("select * from usuario where login_usuario ='$this->login' and senha_usuario='$this->senha'");

            $usersPesq = mysql_fetch_assoc($pesqUsuario);

            if ($this->login == $usersPesq['login_usuario'] and $this->senha == $usersPesq['senha_usuario']) {

                echo "<script> alert('Usuario já cadastrado!'); </script>";
                
            } else {

                mysql_query("INSERT INTO usuario(nome_usuario, login_usuario, senha_usuario, permissao) VALUES ('$this->nome', '$this->login', '$this->senha', $this->permissao)")or die(mysql_error());

                echo "<script> alert('Salvo com sucesso!'); </script>";
            }
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}
?>