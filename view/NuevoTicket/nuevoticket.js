function init(){
    $("#ticket_form").on("submit", function(e){
        guardaryeditar(e);
    });
}

//Activa el input de descripcion y se le ajusta su altura
$(document).ready(function() {
    $('#tick_descrip').summernote({
        height: 150,
        lang: "es-ES",
        callbacks: {
            onImageUpload: function(image){
                console.log("Image detect...");
                myimagetreat(image[0]);
            },
            onPaste: function(e){
                console.log("Text detect...");
            }
        }
    });

    //Trae de la bd sus elementos 

    $.post("../../controller/categoria.php?op=combo", function(data, status){
        $('#cat_id').html(data);
    });

});

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);

    if($('#tick_descrip').summernote('isEmpty') || $('#tick_titulo').val()==''){
        swal("Advertencia", "Campos Vacios", "warning");

    }else{
        
        $.ajax({
        url: "../../controller/ticket.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $('#tick_titulo').val("");
            $('#tick_descrip').summernote("reset");
            swal("Exito", "Se ha registrado correctamente", "success");
        }
        });
    }
    
}

init();