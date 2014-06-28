<?php

class Materia {

    public $nomeMateria;
    public $textoMateria;
    public $imagemMateria;
    public $dataMateria;
    public $introducao;
    public $tema;
    public $usuario;

    function Materia($nomeMateria, $textoMateria, $imagemMateria, $dataMateria, $introducao, $tema, $usuario) {
        $this->nomeMateria = $nomeMateria;
        $this->textoMateria = $textoMateria;
        $this->imagemMateria = $imagemMateria;
        $this->dataMateria = $dataMateria;
        $this->introducao = $introducao;
        $this->tema = $tema;
        $this->usuario = $usuario;
    }

    function salvarMateria() {

        include './conectaBanco.php';

        mysql_query("INSERT INTO materia(nome_materia, texto, imagem_da_capa, data_hora, introducao, tema, usuario_do_post) VALUES ('$this->nomeMateria','$this->textoMateria','$this->imagemMateria','$this->dataMateria','$this->introducao','$this->tema',$this->usuario)") or die(mysql_error());
        
        echo "<script> alert('Salvo com sucesso!!') </script>";
    }

    
}
