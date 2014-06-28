<head>
    <!-- Make sure the path to CKEditor is correct. -->
    <script src="Script/ckeditor/ckeditor.js"></script>
    <script src="Script/ckeditor/config.js"></script> 
    <link rel="stylesheet" type="text/css" href="Estilo/estilo_adm.css"/>
    <meta charset="utf-8"/>
    <title>ADM - PHAZE</title>
</head>

<form action="cadMateria.php" method="POST" enctype="multipart/form-data">
    Titulo Materia: <textarea name="titulo"> </textarea> <br />
    Imagem capa: <input type="file" name="imagemMateria"/> <br />
    Introdução:<textarea name="introducao"></textarea> <br />

    <div style="width:600px"> <!-- esta div é do editor de texto -->
        Texto:<textarea name="textoMateria" id="editor2" > <br />
                Escreva aqui!
        </textarea>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor2');
        </script> 

    </div> <br />

    
    Tema: <input type="text" name="temaMateria"/> <br />

    <input type="submit" name="postar" value="POSTAR!"/>

</form>

<?php
if (isset($_POST['postar'])) {

    $tituloMateria = $_POST['titulo'];
    $introducao = $_POST['introducao'];
    $texto = $_POST['textoMateria'];
    $imagemCapa ="imagemMateria/".time(). $_FILES['imagemMateria']['name'];
    $imagemTempMateria = $_FILES['imagemMateria']['tmp_name'];
    move_uploaded_file($_FILES['imagemMateria']['tmp_name'], $imagemCapa);
    
    $tema = $_POST['temaMateria'];
    $data = date('Y-m-d H:i:s');
   
    include './materia.class.php';
    
    $phazeMateria = new Materia($tituloMateria, $texto, $imagemCapa, $data, $introducao, $tema, 1);
    
    try {
        $phazeMateria->salvarMateria();
        
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }

    
}
?>