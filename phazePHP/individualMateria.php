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
	$phazepodcast = mysql_query("select * from materia ORDER BY cod_materia ASC");
	$materia = mysql_fetch_assoc($phazepodcast);
        
        $codMateria = $materia['cod_materia'];
        $nomeMateria = $materia['nome_materia'];
        $texto = $materia['texto'];
        $introducao = $materia['introducao'];
        $tema = $materia['tema'];
        $imagem = $materia['imagem_da_capa'];
        $data = $materia['data_hora'];
        $usuario = $materia['usuario_do_post'];
        
        echo "  <div>
            <table width='100%'  >
                <tr class='topoItem'>
                    <td colspan='2'> <h2>#<b>&nbsp;&nbsp;".$codMateria."</b>&nbsp;&nbsp;&nbsp;&nbsp;". $nomeMateria . "</h2> </td>
                </tr>
                <tr class='corpoItem'>
                    <td  width='250px'> 
                        <img src='$imagem' width=500' height='200' /> 
                    </td>
                    <td style=''>" . $data ." &nbsp; <b> [ ". $tema ." ] </b> <br> ". $introducao .  "</td>
                <tr>
                    <td>".$texto." </td>
                        <br>
                        <br>
                </tr>
                
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
