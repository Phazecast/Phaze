<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Phaze</title>

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
	$phazepodcast=mysql_query("select * from phaze_baco1.0");
	$podcast = mysql_fetch_assoc($phazepodcast);
	echo "<table class='formatacao' align='center' border='1' width='80%'>";
	echo "<tr>";
		echo "<td>Codigo do Podcast</td>";
		echo "<td>Nome do Podcast</td>";
		echo "<td>Data e hora</td>";
	echo "</tr>";
        echo "<tr>";
		echo "<td></td>";
		echo "<td>Introdução</td>";
		echo "<td></td>";
	echo "</tr>";
        echo "<tr>";
		echo "<td></td>";
		echo "<td>Texticulo</td>";
		echo "<td></td>";
	echo "</tr>";
        echo "<tr>";
		echo "<td></td>";
		echo "<td>Link da Imagem</td>";
		echo "<td></td>";
	echo "</tr>";
        
        
	while($podcast)
	{
		$codPodcast=$podcast['cod_do_podcast'];
		$nomePodcast=$podcast['nome_do_podcast'];
                $data=$podcast['data_hora'];
		$linkimagem=$podcast['link_da_imagem'];
                $introducao=$podcast['nome_do_podcast'];
		$texticulo=$podcast['link_da_imagem'];
                
		echo "<tr>";
			echo "<td>".$codPodcast."</td>";
			echo "<td>".$nomePodcast."</td>";
			echo "<td>".$data."</td>";
			
		echo "</tr>";
                echo "<tr>";
			echo "<td></td>";
			echo "<td>".$introducao."</td>";
			echo "<td></td>";
		echo "</tr>";
                echo "<tr>";
			echo "<td></td>";
			echo "<td>".$texticulo."</td>";
			echo "<td></td>";
		echo "</tr>";
                echo "<tr>";
			echo "<td></td>";
			echo "<td> <img src='$linkimagem' width='100' height='100'> </td>";
			echo "<td></td>";
                echo '</tr>';
		$podcast=mysql_fetch_assoc($phazepodcast);
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

