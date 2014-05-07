<!DOCTYPE html>
<html>
    <head>
        
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="Script/ckeditor/ckeditor.js"></script>
      <script src="Script/ckeditor/config.js"></script> 

    </head>
    <body>
        <form>

            <textarea name="editor1" id="editor1" >
                This is my textarea to be replaced with CKEditor.
            </textarea>

            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.


                CKEDITOR.replace('editor1');
             

            </script>
        </form>
    </body>
</html>