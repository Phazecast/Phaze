<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Phaze Podcast</title>

        <link rel="shortcut icon" href="Imagens/favicon.png" />

        <link rel="stylesheet" type="text/css" href="Estilo/estilo_geral.css"/>
    </head>
    <body>
        <div id="aplicacao">

        <?php 
            include 'topo.php';
        ?>
        <div id="corpo">
            <div id="corpo_interno">
        <?php
	include("conectaBanco.php");
	$phazepodcast = mysql_query("select * from podcast");
	$podcast = mysql_fetch_assoc($phazepodcast);
	
        echo "<table align='center' border='1' width='80%'>";
echo "<tr>";
echo "<td><b>Codigo Podcast</b></td>";
echo "<td><b>Nome do Podcast</b></td>";
echo "<td><b>Data</b></td>";
echo "<td><b>Texticulo</b></td>";
echo "<td><b>Introdução</b></td>";
echo "<td><b>Links do Post</b></td>";
echo "<td><b>Tema</b></td>";
echo "<td><b>Link do Player</b></td>";
echo "<td><b>Imagem</b></td>";
echo "</tr>";
while ($podcast) { // uso o while pra continuar lendo o que tem no banco, tipo enquanto tiver podcast ele vai listar
    
    $codPodcast = $podcast['cod_do_podcast'];
    $nomePodcast = $podcast['nome_do_podcast'];
    $texticulo = $podcast['texticulo'];
    $introducao = $podcast['introducao'];
    $linkPost = $podcast['link_do_post'];
    $tema = $podcast['tema'];
    $linkPlayer = $podcast['link_do_player'];
    $imagem = $podcast['link_da_imagem'];
    $data = $podcast['data_hora'];

    echo "<tr>";
    echo "<td>" . $codPodcast . "</td>";
    echo "<td>" . $nomePodcast . "</td>";
    echo "<td>" . $data . "</td>";
    echo "<td>" . $texticulo . "</td>";
    echo "<td>" . $introducao . "</td>";
    echo "<td>" . $linkPost . "</td>";
    echo "<td>" . $tema . "</td>";
    echo "<td>" . $linkPlayer . "</td>";
    echo "<td> <img src='$imagem' width='100' height='100' /> </td>";
    echo "</tr>";

// chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
    $podcast = mysql_fetch_assoc($phazepodcast);
}

echo "</table>";

?>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
        </div>
        </div>
            
        <?php 
            include 'rodape.php';
        ?>
    
        </div>
    </body>
</html>

