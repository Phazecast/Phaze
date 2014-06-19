<?php

if (isset($_GET['codigoPodcast'])) {

    include "conectaBanco.php";
    $codigo = $_GET['codigoPodcast'];// pegando o codigo para excluir
    mysql_query("delete from podcast where cod_do_podcast='$codigo'");

    echo 'Excluido com sucesso!!';
    echo "<br /><a href='listarPodcast.php'>Voltar</a>";
} else {

    header("location:listarPodcast.php");
}
