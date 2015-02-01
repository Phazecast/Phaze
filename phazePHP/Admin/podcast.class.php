<?php

class Podcast {

    public $nome;
    public $texticulo;
    public $introducao;
    public $linksPost;
    public $tema;
    public $data;
    public $linkPlayer;
    public $imagem;
    public $usuario;

    function Podcast($nome, $texticulo, $introducao, $linksPost, $tema, $data, $linkPlayer, $imagem, $usuario) {
        $this->nome = strtoupper( $nome);
        $this->texticulo = $texticulo;
        $this->introducao = $introducao;
        $this->linksPost = $linksPost;
        $this->tema = strtoupper($tema);
        $this->data = $data;
        $this->linkPlayer = $linkPlayer;
        $this->imagem = $imagem;
        $this->usuario = $usuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTexticulo() {
        return $this->texticulo;
    }

    public function getIntroducao() {
        return $this->introducao;
    }

    public function getLinksPost() {
        return $this->linksPost;
    }

    public function getTema() {
        return $this->tema;
    }

    public function getData() {
        return $this->data;
    }

    public function getLinkPlayer() {
        return $this->linkPlayer;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function salvaPodcast() {

        try {
            include './conectaBanco.php';

            mysql_query("INSERT INTO podcast( nome_do_podcast, texticulo, introducao, link_do_post, tema, data_hora, link_do_player, link_da_imagem, usuario_post) VALUES ('$this->nome','$this->texticulo','$this->introducao','$this->linksPost','$this->tema','$this->data','$this->linkPlayer','$this->imagem',$this->usuario)") or die(mysql_error());

            echo "<script> alert('Dados Salvos com sucesso!'); </script>";
            
            header("location:phazeADM.php?centro=cadPodcast");
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    public function listarPodcast() {

        header("location:listarPodcast.php");
    }

}
