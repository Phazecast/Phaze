<?php
session_start();

 $_SESSION['codUsuario'];

?>
<head>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="Script/ckeditor/ckeditor.js"></script>
    <script src="Script/ckeditor/config.js"></script> 
    <link rel="stylesheet" type="text/css" href="Estilo/estilo_adm.css"/>
    <meta charset="utf-8"/>
    <title>ADM - PHAZE</title>
</head>
<center> <h1> - Cadastro de Podcast - </h1> </center> <br/><br/>



<form action="cadPodcast.php" method="POST" enctype="multipart/form-data">



    <table border="0" cellpadding="3">
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nome do PODCAST:</td>
                <td><textarea type="text" name="nomePodcast" style="width: 700px ; height:20px; text-transform:uppercase; " required="true"></textarea></td>
            </tr>
            <tr>
                <td>Texticulo:</td>
                <td><textarea name="texticulo" style="width: 700px ; height:35px " required="true"></textarea></td>
            </tr>
            <tr>
                <td>Introdução:</td>
                <td style="width:600px" ><textarea name="introducao" id="editor1"  required="true">
                Escreva aqui!
                    </textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace('editor1');
                    </script></td>
            </tr>
            <tr>
                <td>Links Post:</td>
                <td><textarea name="linksPost" style="width: 700px ; height:20px " required="true"> </textarea></td>
            </tr>
            <tr>
                <td>Link do Player:</td>
                <td><textarea  name="linkPlayer" style="width: 700px ; height:20px " required="true"> </textarea></td>
            </tr>
            <tr>
                <td>Tema:</td>
                <td><input type="text" name="tema" style="text-transform:uppercase;"  required="true"/></td>
            </tr>
            <tr>
                <td>Imagem:</td>
                <td><input type="file" name="imagemPodcast"  required="true"/></td>
            </tr>
        </tbody>
    </table>
    <br />
    <br />
    <input type="submit" name="salvar" value="POSTAR!"/>

    <br />
    <br />
    <br />
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
    $imagem = "imagemPodcast/" . time() . $_FILES['imagemPodcast']['name']; // esta parte é pro upload da imagem.. ele salvar a imagem em outro lugar.. ainda em experimentação
    $imagemTemp = $_FILES['imagemPodcast']['tmp_name'];
    move_uploaded_file($_FILES['imagemPodcast']['tmp_name'], $imagem);


    $data = date('Y-m-d H:i:s');



    include './podcast.class.php';

    $phazeCast = new Podcast($nomePodcast, $texticulo, $introducao, $linkPost, $tema, $data, $linkPlayer, $imagem, $_SESSION['codUsuario']); // dando valor aos atributos da classe atravez do construtor
    try {
        $phazeCast->salvaPodcast(); // chamando o metodo de salvar
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
?>