<!DOCTYPE html>
<!DOCTYPE html>
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
        <div id="aplicacao">

        <?php 
            include 'topo.php';
        ?>
        <div id="corpo">
            <div id="corpo_interno">

<br>
	<h1 class="tituloSecao">Podcasts</h1>
                
        <?php
	include("conectaBanco.php");
	$phazepodcast = mysql_query("SELECT * FROM podcast ORDER BY cod_do_podcast DESC");
	$podcast = mysql_fetch_assoc($phazepodcast);


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

    
    
echo "  <div>
            <table width='100%'  >
                <tr class='topoItem'>
                    <td colspan='2'> <h2>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; #" . $codPodcast ."&nbsp;". $nomePodcast . " </h2> </td>
                </tr>
                <tr class='corpoItem'>
                    <td  width='250px'> 
                        <a href='individualPodcast.php?nomePodcast=$nomePodcast'><img src='$imagem' width=400' height='150' /></a> 
                    </td>
                    <td style=''>" . $data ." &nbsp; <b> [ ". $tema ." ] </b> <br> ". $texticulo .  "</td>
            
            </table>
        </div> 
        <br>";


// chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
    $podcast = mysql_fetch_assoc($phazepodcast);
}

?>

            
        <br>
        <br>
                
        </div>
        </div>
            
            
        <?php 
            include 'rodape.php';
        ?>
    
        </div>
    
    </body>
</html>

