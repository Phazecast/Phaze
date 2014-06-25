<?php

if (isset($_GET['codigoMateria'])) {

    include "conectaBanco.php";
    $codigoMat = $_GET['codigoMateria'];// pegando o codigo para excluir
    mysql_query("delete from materia where cod_materia='$codigoMat'");

    echo 'Excluido com sucesso!!';
    echo "<br /><a href='listarMateria.php'>Voltar</a>";
} else {

    header("location:listarMateria.php");
}
