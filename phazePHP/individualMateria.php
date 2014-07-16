<!DOCTYPE html>

<?php

    include("conectaBanco.php");

    $phazepodcast = mysql_query("select * from materia WHERE nome_materia = '".$_GET['nomeMateria']."'  ORDER BY cod_materia ASC");
    $materia = mysql_fetch_assoc($phazepodcast);

    $codMateria = $materia['cod_materia'];
    $nome = $materia['nome_materia'];
    $texto = $materia['texto'];
    $introducao = $materia['introducao'];
    $tema = $materia['tema'];
    $imagem = $materia['imagem_da_capa'];
    $data = $materia['data_hora'];
    $usuario = $materia['usuario_do_post'];

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Phaze - <?php echo $nome ?> </title>
        <link rel="shortcut icon" href="Imagens/favicon.png" />
        <link rel="stylesheet" type="text/css" href="Estilo/estilo_geral.css"/>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo_postagem.css"/>
    </head>
    <body>
        
        <?php

            include 'topo.php';
           

            echo "
                <div id='topo'>
                    <div id='topo_interno'>
                        <center> <img src='$imagem' /> </center>
                    </div>
                </div>
            ";

        ?>
        
        <div id="corpo">
            <div id="corpo_interno">
                <br/>

                <?php
                echo "  
                <div>

                <div id='divPodcast'>

                    <div id='tituloPodcast'>
                        &nbsp;". $nome . "
                    </div>

                    <div id='infoPodcast'>
                        Postado por <b> $usuario </b> as <b> $data </b> Tema <b> $tema </b>
                    </div>

                    <div id='barraSocialPodcast'>
                        <table>
                            <tr>
                                <td>
                                    &nbsp;
                                    &nbsp;
                                </td>
                                <td>
                                    <a href='https://twitter.com/share' class='twitter-share-button' data-lang='en'>Tweet</a>
                                </td>
                                <td>
                                    <div class='g-plusone' data-size='medium'></div>
                                </td>
                                <td>
                                    <div class='fb-like' data-href='https://developers.facebook.com/docs/plugins/' data-layout='button_count' data-action='like' data-show-faces='true' data-share='true'></div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <br>

                    <div id='introducaoPodcast'>
                        $introducao
                    </div>

                    <div id='textoPodcast'>
                        $texto
                    </div>

                    <br>

                </div>

                </div> 
                <br>
                ";
                        
                ?>

            </div>
            
        </div>
                
        <br>
                
        <?php include 'rodape.php'; ?>
    
    </body>
    
    
    
    <!-- Facebook -->
    
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    
    
    <!-- Twitter -->
    
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    
    <!-- Google + -->
    
    <script type="text/javascript">
      window.___gcfg = {lang: 'pt-BR'};

      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/platform.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>
    
</html>
