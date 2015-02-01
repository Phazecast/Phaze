<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />        
        <title>Phaze</title>
        <link rel="shortcut icon" href="Recursos/Imagens/favicon.png" />
        <link rel="stylesheet" type="text/css" href="Estilo/estilo_geral.css"/>
    </head>
    <body>
        <div id="aplicacao">

        <?php 
            include 'topo.php';
            include 'slider.php';
        ?>
        
        <div id="corpo">
            <div id="corpo_interno">
                <!-- Conteudo a ser apresentado -->
                
                <?php

                include("Admin/conectaBanco.php");

                $phazepodcast = mysql_query("SELECT nome_do_podcast AS nome, link_da_imagem 
                AS imagem, data_hora, tema, texticulo AS texticulo, nome_usuario, 0 AS tipo
                FROM podcast JOIN usuario WHERE usuario_post = cod_usuario UNION
                SELECT nome_materia AS nome, imagem_da_capa 
                AS imagem, data_hora, tema, introducao AS texticulo, nome_usuario, 1 AS tipo
                FROM materia JOIN usuario WHERE usuario_do_post = cod_usuario 
                ORDER BY data_hora DESC;");

                $podcast = mysql_fetch_assoc($phazepodcast);


                while ($podcast) { // uso o while pra continuar lendo o que tem no banco, tipo enquanto tiver podcast ele vai listar

                    $nome = $podcast['nome'];
                    $imagem = $podcast['imagem'];
                    $data_hora = $podcast['data_hora'];
                    $tema = $podcast['tema'];
                    $texticulo = $podcast['texticulo'];
                    $nome_usuario = $podcast['nome_usuario'];
                    $tipo = $podcast['tipo'];

                    if($tipo == 0) // PODCAST
                    {
                        echo "  <div>
                            <table width='100%'  >
                                <tr class='topoItem'>
                                    <td colspan='2'> <a href='individualPodcast.php?nomePodcast=$nome'><h2>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;". $nome . " </h2></a> </td>
                                </tr>
                                <tr class='corpoItem'>
                                    <td  width='250px'> 

                                        <a href='individualPodcast.php?nomePodcast=$nome'><img src='$imagem' width=400' height='150' /> <a/>

                                    </td>
                                    <td style='vertical-align: text-top; padding-top: 10px'> 
                                        <a href='individualPodcast.php?nomePodcast=$nome'> ". $data_hora ." &nbsp; <b> [ ". $tema ." ] </b> <br><br> ". $texticulo ." </a> 
                                    </td>

                            </table>
                        </div> 
                        <br>";
                    }
                    else if($tipo == 1) // MATERIA
                    {
                        echo "  <div>
                            <table width='100%'  >
                                <tr class='topoItem'>
                                    <td colspan='2'> <a href='individualMateria.php?nomeMateria=$nome'><h2>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;".$nome." </h2></a> </td>
                                </tr>
                                <tr class='corpoItem'>
                                    <td  width='250px'> 

                                        <a href='individualMateria.php?nomeMateria=$nome'><img src='$imagem' width=400' height='150' /> <a/>

                                    </td>
                                    <td style=''>
                                        <a href='individualMateria.php?nomeMateria=$nome'>".$data_hora." &nbsp; <b> [ ".$tema." ] </b> <br><br> ".$texticulo."</a>
                                    </td>
                            </table>
                        </div> 
                        <br>";
                    }

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
