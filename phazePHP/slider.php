
<html>
    <head>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <link rel="stylesheet" href="Script/css/bootstrap.min.css">
        <script src="Script/js/bootstrap.min.js"></script>
    </head>
    <body>
        
        
        <div id="fundo_topo"><br> </div>
            <div id="topo">
                <div id="topo_interno">
                    
                    <!--Carousel-->
                    <div id="meuSlider" class="carousel slide" style="z-index: 0">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                    <li data-target="#meuSlider" data-slide-to="0" class="active"></li>
                                    <li data-target="#meuSlider" data-slide-to="1" class></li>
                                    <li data-target="#meuSlider" data-slide-to="2" class></li>
                            </ol>
     
                            <div class="carousel-inner">
                                
                                
                                
           <?php

                include("Admin/conectaBanco.php");

                $phazepodcast = mysql_query("SELECT nome_do_podcast AS nome, link_da_imagem 
                AS imagem, data_hora, tema, texticulo AS texticulo, nome_usuario, 0 AS tipo
                FROM podcast JOIN usuario WHERE usuario_post = cod_usuario UNION
                SELECT nome_materia AS nome, imagem_da_capa 
                AS imagem, data_hora, tema, introducao AS texticulo, nome_usuario, 1 AS tipo
                FROM materia JOIN usuario WHERE usuario_do_post = cod_usuario 
                ORDER BY data_hora DESC LIMIT 3;");

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
                        echo " 
                                    <div class='item'>
                                            <img src='$imagem' alt='$nome' class='img-responsive' width='100%'>
                                              <div class='carousel-caption'>
                                                <h1>$nome</h1>
                                              </div>
                                    </div>
                        ";
                    }
                    else if($tipo == 1) // MATERIA
                    {
                        echo "
                                    <div class='item active'>
                                            <img src='$imagem' alt='$nome' class='img-responsive' width='100%'>
                                              <div class='carousel-caption'>
                                                <h1>$nome</h1>
                                              </div>
                                    </div>
                        ";
                    }

                // chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
                    $podcast = mysql_fetch_assoc($phazepodcast);
                }

                ?>
                            </div>
                        
                          <!-- Controls -->
                          <a class="left carousel-control" href="#meuSlider" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                          </a>
                          <a class="right carousel-control" href="#meuSlider" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                    </div>
                       </div>           
                </div>
            </div>
        
</body>
</html>