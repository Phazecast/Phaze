<html>
    <head>
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <link rel="stylesheet" href="Script/css/bootstrap.min.css">
        <script src="Script/js/bootstrap.min.js"></script>
    </head>
    <body>
    
            <div id="menu">
                <div id="menu_interno">
                    <table>
                        <tr>
                            <td>
                                <img src="Imagens/logo.png" width="280px" style="margin-top: -20px"/>
                            </td>
                            <td>
                                <nav id="menu_lista">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="geralPodcast.php">Podcasts</a></li>
                                        <li><a href="geralMateria.php">Matérias</a></li>
                                        <li><a href="sobre.php">Sobre</a></li>
                                    </ul>
                                </nav>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

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
                                    <div class="item active">
                                            <img src="Imagens/Slider/artleo.com-5465.jpg" alt="orange" class="img-responsive">
                                              <div class="carousel-caption">
                                                <h1>Primeira imagem do slider - 01</h1>
                                              </div>
                                    </div>
     
                                    <div class="item">
                                            <img src="Imagens/Slider/artleo.com-5465.jpg" alt="orange" class="img-responsive">
                                              <div class="carousel-caption">
                                                <h1>Segunda imagem do slider - 02</h1>
                                              </div>
                                    </div>
     
                                    <div class="item">
                                            <img src="Imagens/Slider/artleo.com-5465.jpg" alt="orange" class="img-responsive">
                                              <div class="carousel-caption">
                                                <h1>Terceira imagem do slider - 03</h1>
                                              </div>
                                    </div>
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
</body>
</html>