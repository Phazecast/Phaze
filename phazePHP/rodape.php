
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<div id="rodape">
    <div id="rodape_interno">
        
        <br>
        <p>
            <span id="logoRodape"> Phaze &copy;</span>
            <span id="fraseEfeito">"Um pouco de Bacon, Tetris e AC/DC." </span>
        </p>
        <div id="rodapePrincipal" style="float:left; ">
            <ul id="menuRodape">
                <li><span class="subtitulo">Phaze</span></li>
                <li>
                    <a href="index.php">Home</a>
                </li>
                <li>
                    <a href="geralPodcast.php">Podcast</a>
                </li>
                <li>
                    <a href="geralMateria.php">Matérias</a>
                </li>
                <li>
                    <a href="Sobre.php">Sobre</a>
                </li>
                <li>
                    <a href="login.php">ADM</a>
                </li>
            </ul>
        </div>
        <div id="rodapeLeiaMais" style="float:left;">
            <ul id="menuRodape">
                <li><span class="subtitulo">Leia Mais</span></li>
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
                        echo "<li><a href='individualPodcast.php?nomePodcast=$nome'>".$nome."</a></li>";
                    }
                    else if($tipo == 1) // MATERIA
                    {
                        echo "<li><a href='individualMateria.php?nomeMateria=$nome'>".$nome."</a></li>";
                    }

                // chamo o fetch_assoc pra renovar a variavel com mais podcast se existir
                    $podcast = mysql_fetch_assoc($phazepodcast);
                }

                ?>
            </ul>
        </div>
        <div id="rodapeSocialMedia" style="float:right;">
            <!--<a href="https://www.google.com.br"><img src="Imagens/Sociais/rss.png" width="30px"></a>
            <a href="https://www.google.com.br"><img src="Imagens/Sociais/itunes.png" width="30px"></a>-->
            <a href="https://www.facebook.com/PHAZE-620009784694858/?fref=ts"><img src="Imagens/Sociais/facebook.png" width="30px"></a>
            <a href="https://plus.google.com/u/0/110294544033689146328/posts"><img src="Imagens/Sociais/google.png" width="30px"></a>
            <a href="https://twitter.com/phazepodcast"><img src="Imagens/Sociais/twitter.png" width="30px"></a>
        </div>
        
    </div>
</div>