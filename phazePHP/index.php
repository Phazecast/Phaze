<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />        
        <title>Phaze</title>

        <link rel="shortcut icon" href="Recursos/Imagens/favicon.png" />

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
        ?>
        
        <div id="corpo">
            <div id="corpo_interno">
                <!-- Conteudo a ser apresentado -->
                
                
                
                      
        <?php
	include("conectaBanco.php");

	$phazepodcast = mysql_query("SELECT nome_do_podcast AS nome, link_da_imagem AS imagem, data_hora, tema, texticulo AS texticulo, nome_usuario
FROM podcast JOIN usuario WHERE usuario_post = cod_usuario UNION
SELECT nome_materia AS nome, imagem_da_capa AS imagem, data_hora, tema, introducao AS texticulo, nome_usuario
FROM materia JOIN usuario WHERE usuario_do_post = cod_usuario ORDER BY data_hora DESC");

	$podcast = mysql_fetch_assoc($phazepodcast);


while ($podcast) { // uso o while pra continuar lendo o que tem no banco, tipo enquanto tiver podcast ele vai listar
    
    $nome = $podcast['nome'];
    $imagem = $podcast['imagem'];
    $data_hora = $podcast['data_hora'];
    $tema = $podcast['tema'];
    $texticulo = $podcast['texticulo'];
    $nome_usuario = $podcast['nome_usuario'];
    
    
echo "  <div>
            <table width='100%'  >
                <tr class='topoItem'>
                    <td colspan='2'> <h2>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;". $nome . " </h2> </td>
                </tr>
                <tr class='corpoItem'>
                    <td  width='250px'> 
                        <img src='$imagem' width=400' height='150' /> 
                    </td>
                    <td style=''>" . $data_hora ." &nbsp; <b> [ ". $tema ." ] </b> <br><br> ". $texticulo .  "</td>
            
            </table>
        </div> 
        <br>";


// chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
    $podcast = mysql_fetch_assoc($phazepodcast);
}

?>
                <br>

            </div>
        </div>
            
        <?php 
            include 'rodape.php';
        ?>
    
        </div>
    </body>

</html>
