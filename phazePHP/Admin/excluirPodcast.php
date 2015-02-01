<?php

if (isset($_GET['codigoPodcast'])) {

    include "conectaBanco.php";
    $codigo = $_GET['codigoPodcast'];// pegando o codigo para excluir
    mysql_query("delete from podcast where cod_do_podcast='$codigo'");

    header("location:phazeADM.php?centro=listarPodcast");
    
} else {

    header("location:phazeADM.php");
}
