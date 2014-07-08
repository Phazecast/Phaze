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
        <style>
            .topoItem{
                background-color: rgba(0, 0, 0, 0.05);
            }
            .corpoItem{
                background-color: rgba(255, 255, 255, 0.4);
            }
        </style>
    </head>
    <body>
        
        
        <?php
        include 'topo.php';
        ?>
        <div id="corpo">
            <div id="corpo_interno">
                <br/>
        <?php


        include("conectaBanco.php");
	$phazepodcast = mysql_query("SELECT * FROM podcast WHERE nome_do_podcast = '".$_GET['nomePodcast']."' ORDER BY cod_do_podcast ASC");
	$podcast = mysql_fetch_assoc($phazepodcast);
        
        $codPodcast = $podcast['cod_do_podcast'];
        $nomePodcast = $podcast['nome_do_podcast'];
        $texticulo = $podcast['texticulo'];
        $introducao = $podcast['introducao'];
        $linkPost = $podcast['link_do_post'];
        $tema = $podcast['tema'];
        $linkPlayer = $podcast['link_do_player'];
        $imagem = $podcast['link_da_imagem'];
        $data = $podcast['data_hora'];
        $usuario = $podcast['usuario_post'];
        
        echo "  <div>
            <table width='100%'  >
                <tr class='topoItem'>
                    <td colspan='2'> <h2> #" . $codPodcast ."&nbsp;". $nomePodcast . " &nbsp; ".$data."  </h2>  </td>
                </tr>
                <tr>
                <td> ".$introducao." </td>
                    
                </tr>
                <tr class='corpoItem'>
                    <td  width='250px'> 
                        <img src='$imagem' width=500' height='200'/> 
                    </td>
                <tr>
                <td style=''><b> [ ". $tema ." ] </b> <br> ". $texticulo .  "</td>
                </tr>
                <tr>
                <td>".$linkPost."</td>
                </tr>
                <tr>
                <td>".$linkPlayer."</td>
                </tr>
                <br>
                <br>
                <tr>
                <td>".$usuario."</td>
                </tr>
            </table>
        </div> 
        <br>";

        ?>
        </div>
        </div>
        <?php
        include 'rodape.php';        
        ?>
    </body>
</html>
