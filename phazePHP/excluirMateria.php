<?php

if (isset($_GET['codigoMateria'])) {

    include "conectaBanco.php";
    $codigoMat = $_GET['codigoMateria'];// pegando o codigo para excluir
    mysql_query("delete from materia where cod_materia='$codigoMat'");

     header("location:phazeADM.php?centro=listarMateria");
     
} else {

    header("location:listarMateria.php");
}
