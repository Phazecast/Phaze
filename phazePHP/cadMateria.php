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
</head>
<center> <h1> - Cadastro de Matéria - </h1> </center> <br/><br/>

<form action="cadMateria.php" method="POST" enctype="multipart/form-data">

    <table border="0" cellpadding="3" >
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td> Titulo Materia:</td>
                <td ><textarea name="titulo" style="width:600px ; text-transform:uppercase;" required="true"> </textarea></td>
            </tr>
            <tr>
                <td >Introdução:</td>
                <td><textarea name="introducao" style="width:600px;" required="true"></textarea></td>
            </tr>
            <tr>

                <td> Texto:</td>
                <td style="width:600px" ><textarea name="textoMateria" id="editor2" required="true" >
                Escreva aqui!
                    </textarea>
                    <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace('editor2');
                    </script> </td>

            </tr>
            <tr>
                <td>Tema:</td>
                <td><input type="text" name="temaMateria" style="text-transform:uppercase;" required="true"/></td>
            </tr>
            <tr>
                <td>Imagem capa:</td>
                <td><input type="file" name="imagemMateria" required="true"/></td>
            </tr>
        </tbody>
    </table>
    <br />
    <br />
    <input type="submit" name="postar" value="POSTAR!"/>

    <br />
    <br />
    <br />
</form>

<?php
if (isset($_POST['postar'])) {

    $tituloMateria = $_POST['titulo'];
    $introducao = $_POST['introducao'];
    $texto = $_POST['textoMateria'];
    $imagemCapa = "imagemMateria/" . time() . $_FILES['imagemMateria']['name'];
    $imagemTempMateria = $_FILES['imagemMateria']['tmp_name'];
    move_uploaded_file($_FILES['imagemMateria']['tmp_name'], $imagemCapa);

    $tema = $_POST['temaMateria'];
    $data = date('Y-m-d H:i:s');

    include './materia.class.php';

    $phazeMateria = new Materia($tituloMateria, $texto, $imagemCapa, $data, $introducao, $tema,  $_SESSION['codUsuario']);

    try {
        $phazeMateria->salvarMateria();
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
}
?>