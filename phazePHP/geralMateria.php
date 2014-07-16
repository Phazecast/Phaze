<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Phaze Materia</title>

        <link rel="shortcut icon" href="Imagens/favicon.png" />

        <link rel="stylesheet" type="text/css" href="Estilo/estilo_geral.css"/>
        
        <style>
            .topoItem{
                background-color: rgba(0, 0, 0, 0.05);
            }
            .corpoItem{
                background-color: rgba(255, 255, 255, 0.4);
            }
            .corpoItem img{
                margin: 5px;
                margin-right: 20px;
            }
        </style>
        
        
    </head>
    <body>
        <div id="aplicacao">

        <?php 
            include 'topo.php';
            include 'slider.php';
        ?>
            
        <div id="corpo">
            <div id="corpo_interno">
                
<br>
	<h1 class="tituloSecao">Matérias</h1>
                
        <?php
	include("conectaBanco.php");
	$phazepodcast = mysql_query("select * from materia");
	$materia = mysql_fetch_assoc($phazepodcast);
	
while ($materia) { // uso o while pra continuar lendo o que tem no banco, tipo enquanto tiver materia ele vai listar
    
    $codMateria = $materia['cod_materia'];
    $nomeMateria = $materia['nome_materia'];
    $texto = $materia['texto'];
    $introducao = $materia['introducao'];
    $tema = $materia['tema'];
    $imagem = $materia['imagem_da_capa'];
    $data = $materia['data_hora'];
    $usuario = $materia['usuario_do_post'];
        
echo "  
<div>
            <table width='100%'  >
                <tr class='topoItem'>
                    <td colspan='2'>  <a href='individualMateria.php?nomeMateria=$nomeMateria'><h2>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;". $nomeMateria . " </h2> </a> </td>
                </tr>
                <tr class='corpoItem'>
                    <td  width='250px'> 
                        <a href='individualMateria.php?nomeMateria=$nomeMateria'><img src='$imagem' width=400' height='150' /></a> 
                    </td>
                    <td style=''> <a href='individualMateria.php?nomeMateria=$nomeMateria'>" . $data ." &nbsp; <b> [ ". $tema ." ] </b> <br>  ". $introducao .  " </a></td>
            
            </table>
        </div> 
        <br>
        ";
    
// chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
    $materia = mysql_fetch_assoc($phazepodcast);
}

?>
               
                
        </div>
        </div>
            
        <?php 
            include 'rodape.php';
        ?>
    
        </div>
    </body>
</html>

