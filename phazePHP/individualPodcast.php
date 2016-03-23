<!DOCTYPE html>

<?php
    include("Admin/conectaBanco.php");

    $phazepodcast = mysql_query("SELECT * FROM podcast JOIN usuario WHERE usuario_post = cod_usuario AND nome_do_podcast = '".$_GET['nomePodcast']."' ORDER BY cod_do_podcast ASC");
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
    $usuario = $podcast['nome_usuario'];

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Phaze - <?php echo $nomePodcast ?> </title>
        <link rel="shortcut icon" href="Imagens/favicon.png" />
        <link rel="stylesheet" type="text/css" href="Estilo/estilo_geral.css"/>
        <link rel="stylesheet" type="text/css" href="Estilo/estilo_postagem.css"/>
        
        
        <?php
        
        list($width, $height, $type, $attr) = getimagesize($imagem);
        
        echo "
        <style>
            
            #fundo_topo
            { 
                marginp: -10px;
            
                background-color:black;
                background-image: url($imagem) !important;
                background-repeat: no-repeat repeat;
                background-size: cover;
                
                -webkit-filter: blur(5px);
                -moz-filter: blur(5px);
                -o-filter: blur(5px);
                -ms-filter: blur(5px);
                filter: blur(5px);
                
                height: ".(string)($height + 30) ."px !important;
                
                position: fixed;
                width: 110%;
                z-index: -5;
            } 

        </style>
        ";

    ?>

        <style>
        
            #fundo_corpo
            {
                margin-top: -5px;
                
                width: 100%;
                background: #151618 url("Imagens/bg.jpg") no-repeat center top !important;
                -moz-box-shadow:   inset  0 0 15px #000000;
                 -webkit-box-shadow:inset  0 0 15px #000000;
                 box-shadow:        inset  0 0 15px #000000;
                
            }
            
        </style>
        
        
    </head>
    <body>

    <?php include_once("analyticstracking.php") ?>
           <?php

            include 'topo.php';
           

            echo "
                <div id='fundo_topo'></div>
                
                <div id'topo_interno'>
                         <center> <img id='imagem' src='$imagem' /> </center>
                         </div>
            ";

        ?>
        
        <div id="fundo_corpo">
        
        <div id="corpo">
            <div id="corpo_interno">
                <br/>
                
        <?php
        
        echo "  <div>
        
        
        
        <div id='divPodcast'>
            
            <div id='tituloPodcast'>
                <span class='codigoPodcast'> #" . $codPodcast ." </span> &nbsp;". $nomePodcast . "
            </div>
            
            <div id='infoPodcast'>
                Postado por  <a href='geralAutor.php?autor=$usuario'> <b> $usuario </b> </a> as <b> $data </b> Tema <a href='geralTema.php?tema=$tema'> <b> $tema </b> </a>
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
                $texticulo
            </div>
            
            <br>
            
            <center>
                <div id='playerPodcast'>
                    $linkPlayer
                </div>
            </center>
            
            <br>
            
            <div id='linksPodcast'>
                $linkPost
            </div>
            
        </div>
        
        
        </div> 
        <br>";

        ?>

                </div>
            </div>

                <div id="leiaMais" >
                <div id="leiaMais_interno" >
                <div id="leiaMais_conteudo" >
                
                    <span class="leiaMais_leiaMais"> Escute Mais </span>    
                    
                    <?php

                        $leiatambem = mysql_query(" SELECT nome_do_podcast, texticulo, tema, link_da_imagem FROM podcast LIMIT 3;");
                        $lermateria = mysql_fetch_assoc($leiatambem);

                        while ($lermateria) { // uso o while pra continuar lendo o que tem no banco, tipo enquanto tiver materia ele vai listar

                            $nome = $lermateria['nome_do_podcast'];
                            $introducao = $lermateria['texticulo'];
                            $tema = $lermateria['tema'];
                            $imagem = $lermateria['link_da_imagem'];

                            echo " 

                            <div class='itens_leiaMais'>
                                <span class='tema_leiaMais'>[".$tema."]</span> 
                                <a href='individualPodcast.php?nomePodcast=".$nome."'> <span class='titulo_leiaMais' > ".$nome." </span>  
                                <span class='introducao_leiaMais' > ".$introducao." </span> </a>
                            </div>

                            ";
                            
                            $lermateria = mysql_fetch_assoc($leiatambem);
                            
                        }

                    ?>

                
                </div>
                    </div>
                </div>
                
        <div id="comentario">
            <div id="comentario_interno">
                <div id="comentario_conteudo">
                
                    <div id="disqus_thread"></div>
                    <script type="text/javascript">
                        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
                        var disqus_shortname = 'phazecast'; // required: replace example with your forum shortname
                        /* * * DON'T EDIT BELOW THIS LINE * * */
                        (function() {
                            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
                            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
                        })();
                    </script>
                    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
                    
                </div>
            </div>
            
        </div>
                
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

