/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
        
        //función que observa los cambios del campo file y obtiene información
        $(':file').change(function()
        {
            //obtenemos un array con los datos del archivo
            var file = $("#exampleInputFile")[0].files[0];
            //obtenemos el nombre del archivo
            var fileName = file.name;
            //obtenemos el tamaño del archivo
            var fileSize = file.size;
            //obtenemos el tipo de archivo image/png ejemplo
            //var fileType = file.type;
            //mensaje con la información del archivo
            showMessage("<span class='info'>Archivo para subir: "+fileName+", peso total: "+fileSize+" bytes.</span>");
        });

        //al enviar el formulario
        $('#uploadT').click(function(){
            //información del formulario
            var formData = new FormData($(".formulario")[0]);
            var message = "";
            //hacemos la petición ajax  
            $.ajax({
                url: 'territorio/upload.php',  
                type: 'POST',
                // Form data
                //datos del formulario
                data: formData,
                //necesario para subir archivos via ajax
                cache: false,
                contentType: false,
                processData: false,
                //mientras enviamos el archivo
                beforeSend: function(){
                    message = $("<p align='center'><img src='images/preloader.gif' /></p>");
                    showMessage(message)        
                },
                //una vez finalizado correctamente
                success: function(data){
                    message = $("<span class='success'>El territorio fue almacenado correctamente.</span>");
                    showMessage(data);
                },
                //si ha ocurrido un error
                error: function(data){
                    message = $("<span class='error'>Ha ocurrido un error.</span>");
                    showMessage(data);
                }
            });
        });
                
        $(window).scrollTop(0);
        
        function showMessage(message){
            $(".messages").html("").show();
            $(".messages").html(message);
        }

        
});