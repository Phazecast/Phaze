<?php
    session_start();
?>
<head>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="Script/ckeditor/ckeditor.js"></script>
    <script src="Script/ckeditor/config.js"></script> 
    <link rel="stylesheet" type="text/css" href="Estilo/estilo_adm.css"/>
    <meta charset="utf-8"/>
    <title>ADM - PHAZE</title>
    <link rel="shortcut icon" href="Recursos/Imagens/favicon.png" />
</head>
<body>
    <div id="aplicacao">

        <h1>Cadastro de Matéria</h1>
        <br/>

        <form action="cadMateria.php" method="POST" enctype="multipart/form-data" class="pure-form"> 

            <div class="label">Titulo Materia</div>
            <textarea name="titulo" required="true"> </textarea>
            <br><br>
            
            <div class="label">Introdução</div>
            <textarea name="introducao" required="true"></textarea>
            <br><br>

            <div class="label">Tema</div>
            <input type="text"name="temaMateria"required="true"/>
            <br><br>
            
            <div class="label">Texto</div>
            <textarea name="textoMateria" id="editor2" required="true" >Escreva aqui!</textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor2');
            </script>
            <br><br>

            <div class="label">Imagem capa</div>
            <input type="file" name="imagemMateria" required="true"/>
            <br /><br />

            <div class="label">&nbsp;</div>
            <input class="pure-button pure-button-primary" type="submit" name="postar" value="POSTAR!"/>
            <br /><br /><br />
       
        </form>
    </div>
</body>
    
<?php

if (isset($_POST['postar'])) 
{
    $tituloMateria = $_POST['titulo'];
    $introducao = $_POST['introducao'];
    $texto = $_POST['textoMateria'];
    $imagemCapa = 'imagemMateria/' . time() . $_FILES['imagemMateria']['name'];
    $imagemTempMateria = $_FILES['imagemMateria']['tmp_name'];
    move_uploaded_file($_FILES['imagemMateria']['tmp_name'], '../'.$imagemCapa);

    $tema = $_POST['temaMateria'];
    $data = date('Y-m-d H:i:s');

    include 'materia.class.php';

    $phazeMateria = new Materia($tituloMateria, $texto, $imagemCapa, $data, $introducao, $tema,  $_SESSION['codUsuario']);

    try 
    {
        $phazeMateria->salvarMateria();
    } 
    catch (Exception $exc) 
    {
        echo $exc->getTraceAsString();
    }
}

?>