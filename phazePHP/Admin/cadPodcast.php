<?php
session_start();

 $_SESSION['codUsuario'];

?>

<head>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="Script/ckeditor/ckeditor.js"></script>
    <script src="Script/ckeditor/config.js"></script> 
    <meta charset="utf-8"/>
    <title>ADM - PHAZE</title>
    <link rel="shortcut icon" href="Recursos/Imagens/favicon.png" />
</head>
<body>
    <div id="aplicacao">
    
        <h1>Cadastro de Podcast</h1>
        <br/>

        <form action="cadPodcast.php" method="POST" enctype="multipart/form-data" class="pure-form"> 

            <div class="label">Nome do PODCAST </div>
            <input type="text"  name="nomePodcast" required="true"></input>
            <br><br>

            <div class="label">Texticulo </div>
            <textarea name="texticulo" required="true"></textarea>
            <br><br>

            <div class="label">Introdução</div>
            <textarea name="introducao" id="editor1"  required="true"> Escreva aqui! </textarea>

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
            </script>
            <br><br>

            <div class="label">Links Post</div>
            <textarea name="linksPost" required="true"> </textarea>
            <br><br>

            <div class="label">Link do Player</div>
            <textarea  name="linkPlayer" required="true"> </textarea>
            <br><br>

            <div class="label">Tema</div>
            <input type="text" name="tema" required="true"/>
            <br><br>

            <div class="label">Imagem</div>
            <input type="file" name="imagemPodcast"  required="true"/>
            <br /><br />

            <div class="label">&nbsp;</div>
            <input class="pure-button pure-button-primary" type="submit" name="salvar" value="POSTAR!"/>
            <br /><br />

        </form>
    </div>
</body>
    
<?php

if (isset($_POST['salvar'])) 
{
    // usando o metodo POST salvei o conteudo dos campos em variaveis.. note que nos colchetes estao os nomes dos campos 
    $nomePodcast = $_POST['nomePodcast'];
    $texticulo = $_POST['texticulo'];
    $introducao = $_POST['introducao'];
    $linkPost = $_POST['linksPost'];
    $tema = $_POST['tema'];
    $linkPlayer = $_POST['linkPlayer'];
    
    // esta parte é pro upload da imagem.. ele salvar a imagem em outro lugar.. ainda em experimentação
    $imagem = 'imagemMateria/' .time() . $_FILES['imagemPodcast']['name']; 
    $imagemTemp = $_FILES['imagemPodcast']['tmp_name'];
    move_uploaded_file($_FILES['imagemPodcast']['tmp_name'], '../'.$imagem);

    $data = date('Y-m-d H:i:s');

    include 'podcast.class.php';
   
    // dando valor aos atributos da classe atravez do construtor
    $phazeCast = new Podcast($nomePodcast, $texticulo, $introducao, $linkPost, $tema, $data, $linkPlayer, $imagem, $_SESSION['codUsuario']); 
    
    try 
    {
        $phazeCast->salvaPodcast(); // chamando o metodo de salvar
    } 
    catch (Exception $exc) 
    {
        echo $exc->getTraceAsString();
    }
}

?>