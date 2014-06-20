
<head>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="Script/ckeditor/ckeditor.js"></script>
    <script src="Script/ckeditor/config.js"></script> 
    <link rel="stylesheet" type="text/css" href="Estilo/estilo_adm.css"/>
    <meta charset="utf-8"/>
    <title>ADM - PHAZE</title>
</head>


<form action="admHome.php" method="POST" enctype="multipart/form-data">
    Nome do PODCAST:<textarea type="text" name="nomePodcast" style="width: 700px ; height:20px "></textarea> <br />
    Texticulo: <textarea name="texticulo" style="width: 700px ; height:35px "></textarea> <br />

    <div style="width:600px"> <!-- esta div é do editor de texto -->
        Introdução:<textarea name="introducao" id="editor1" >
                Escreva aqui!
        </textarea>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1');
        </script>

    </div>
    Links Post:<textarea name="linksPost" style="width: 700px ; height:20px "> </textarea> <br />
    Tema: <input type="text" name="tema" /> <br />
    Link do Player: <textarea  name="linkPlayer" style="width: 700px ; height:20px "> </textarea> <br />
    Imagem: <input type="file" name="imagem" /><br /><br />

    <input type="submit" name="salvar" value="Salvar"/>
</form>

<?php
if (isset($_POST['salvar'])) {

    // usando o metodo POST salvei o conteudo dos campos em variaveis.. note que nos colchetes estao os nomes dos campos 
    $nomePodcast = $_POST['nomePodcast'];
    $texticulo = $_POST['texticulo'];
    $introducao = $_POST['introducao'];
    $linkPost = $_POST['linksPost'];
    $tema = $_POST['tema'];
    $linkPlayer = $_POST['linkPlayer'];
    $imagem = ".\imagemPodcast" . $_FILES['imagem']['name']; // esta parte é pro upload da imagem.. ele salvar a imagem em outro lugar.. ainda em experimentação
    $imagemTemp = $_FILES['imagem']['tmp_name']; 
    move_uploaded_file($imagemTemp, $imagem);
    $data = date("Y-m-d");
    
    include './podcast.class.php';
    
    $phazeCast = new Podcast($nomePodcast, $texticulo, $introducao, $linksPost, $tema, $data, $linkPlayer, $imagem, $usuario); // dando valor aos atributos da classe atravez do construtor
    $phazeCast->salvaPodcast();// chamando o metodo de salvar
   
}

?>