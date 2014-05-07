<!DOCTYPE html>
<html>
    <head>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="Script/ckeditor/ckeditor.js"></script>
	<script src="Script/ckeditor/config.js"></script> 
    </head>
    <body>

	<div style="width: 800px">

        <form>

            <textarea name="editor1" id="editor1" >
                Escreva aqui!
            </textarea>

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.


                CKEDITOR.replace('editor1');

            </script>
        </form>

	</div>

    </body>
</html>