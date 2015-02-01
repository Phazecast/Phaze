<!DOCTYPE html>

<?php
session_start();
if(isset($_SESSION['nome']) and $_SESSION['permissao']==1 or $_SESSION['permissao']==2){



?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" /> 

        
        <style>
     /*--------------------------------
             Functional Styles (Required)
            ---------------------------------*/
            /* Tim Pietrusky advanced checkbox hack (Android <= 4.1.2) */
            body{ -webkit-animation: bugfix infinite 1s; }
            @-webkit-keyframes bugfix { from {padding:0;} to {padding:0;} }

            .header { position: relative; }
            #toggle, .toggle { display: none; }
            .menu > li { list-style: none; float:left;	}

            /* Nicolas Gallagher micro clearfix */
            .clearfix:before, .clearfix:after { display: table; content: ""; }
            .clearfix:after { clear: both; }

            @media only screen and (max-width: 768px){
                .menu { display: none; opacity: 0; width: 100%; position: absolute; right: 0; }
                .menu > li { display: block; width: 100%; margin: 0; }
                .menu > li > a { display: block; width: 100%; text-decoration: none; -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
                .toggle { display: block; position: relative; cursor: pointer; -webkit-touch-callout: none; -webkit-user-select: none; user-select: none; }
                #toggle:checked ~ .menu { display: block; opacity: 1;}
            }


            /*--------------------------------
             Presentation Styles (Editable)
            ---------------------------------*/
            .header{
                min-height: 100px;
                height: 100%;
                padding: 0 20px;
                background: #222222;
            }

            .header > h1 {
                float: left;
                padding: 30px 0 0;
                font-family: Tahoma;
                font-weight: 300;
                font-size: 28px;
                color: #DFDFDF;
            }

            .nav{ 
                display: block; 
                float: right; 
            }

            .nav, .menu, .menu > li, .menu > li > a{ 
                height: 100%; 
            }

            .menu > li > a{
                display: block;
                padding: 42px 20px;
                text-decoration: none;
                font-weight: normal;
                font-size: 16px;
                line-height: 1;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box; 
                box-sizing: border-box;
                -webkit-transition: all 0.25s linear;
                -moz-transition: all 0.25s linear;
                -o-transition: all 0.25s linear;
                transition: all 0.25s linear;
            }

            .menu > li > a:hover, .menu > li > a:focus{
                background: #F2F2F2;
                box-shadow: inset 0px 5px #51C1F1;
                color: #51C1F1;
                padding: 50px 20px 34px;
            }

            .toggle{ 
                z-index: 2; 
            }

            @media only screen and (max-width: 768px){
                .menu{
                    background: #FFFFFF;
                    border-top: 1px solid #51C1F1;
                }

                .menu, .menu > li, .menu > li > a{
                    height: auto;
                }

                .menu > li > a{
                    padding: 15px 15px;
                }

                .menu > li > a:hover, .menu > li > a:focus{
                    background: #F2F2F2;
                    box-shadow: inset 5px 0px #51C1F1;
                    padding: 15px 15px 15px 25px;
                }

                .toggle:after {
                    content: 'Main Menu';
                    display: block;
                    width: 200px;
                    margin: 33px 0;
                    padding: 10px 50px;
                    background: #51C1F1;
                    -webkit-border-radius: 2px;
                    border-radius: 2px;
                    text-align: center;
                    font-size: 12px;
                    color: #FFFFFF;
                    -webkit-transition: all 0.5s linear;
                    -moz-transition: all 0.5s linear;
                    -o-transition: all 0.5s linear;
                    transition: all 0.5s linear;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box; 
                }

                .toggle:hover:after{
                    background: #45ABD6;
                }

                #toggle:checked + .toggle:after{
                    content: 'Close Menu';
                }
            }

            @media only screen and (max-width: 479px){
                .header > h1 { 
                    text-align: center;
                }
                .header > h1, .nav, .toggle:after{ 
                    float: none; 
                }
                .toggle:after { 
                    text-align: center; width: 100%; 
                }
            }

        </style>

        <!-- Demo Styles -->
        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
                outline: 0;
            }

            html, body{

                background: #F2F2F2;
            }

            body, a{
                font: normal 16px Tahoma;
                color: #3F3F3F;		
            }

            .container{
                min-height: 100%;
                height: auto !important;
                height: 100%;
                margin: 0 auto -30px;
            }

            .container:after{
                content: '';
                display: block;
                height: 30px;
                clear: both;
            }

        </style>

        <link rel="stylesheet" href="navigataur.css" />
        
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
        
        <title> Phaze - Administrativo</title>
        <link rel="shortcut icon" href="Recursos/Imagens/favicon.png" />
        
        
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <style>
            
        </style>
        
        <link  href="../Estilo/estilo_adm.css" rel="stylesheet" type="text/css" />
        
    </head>
    <body>


        <div class="container">
            <div class="header clearfix">
                <h1>Painel de Controle PHAZE</h1>

                <div class="nav">
                    <input type="checkbox" id="toggle" />
                    <label for="toggle" class="toggle" onclick></label>
                    <ul class="menu">

                        <li><a href="phazeADM.php?centro=admIndex">Home</a></li>
                        <li><a href="phazeADM.php?centro=cadPodcast">Podcast</a></li>
                        <li><a href="phazeADM.php?centro=cadMateria">Materia</a></li>
                        <li><a href="phazeADM.php?centro=listarPodcast">List. Podcast</a></li>
                        <li><a href="phazeADM.php?centro=listarMateria">List. Materia</a></li>
                        <li><a href="phazeADM.php?centro=cadUsuario">Integrantes</a></li>
                        <li id="saID"><a href="../sair.php">Sair</a></li>

                    </ul>
                </div><!-- End of Navigation -->

            </div><!-- End of Header -->

        </div><!-- End of Container -->

        <br/>
        <br/>


        <div id="conteudoADM">
            <?php
           
               @$centro = $_GET['centro'];

                if(@$centro == null || @$centro == "")
                {
                    @include ("admIndex.php");
                }
                else
                {
                    @include ($centro . ".php");
                }
                   
            ?>
        </div>


</body>
</html>

<?php

}else{
    
    header("location:login.php");
}

?>