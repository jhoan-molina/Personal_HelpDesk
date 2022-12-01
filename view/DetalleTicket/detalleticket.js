function init(){

}

$(document).ready(function(){
    var tick_id = getUrlParameter('ID');
    
    listarDetalle(tick_id);

   

    $('#tickd_descrip').summernote({
        height: 400,
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

    $('#tickd_descripusu').summernote({
        height: 400,
        lang: "es-ES"
    });

    $('#tickd_descripusu').summernote('disable');
    
});

//Captura el id del URL, en este caso esta asignado con ID

var getUrlParameter = function getUrlParameter(sParam){
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('&'),
    sParameterName,
    i;
    for(i = 0; i<sURLVariables.length; i++){
        sParameterName = sURLVariables[i].split('=');
        if(sParameterName[0] === sParam){
            return sParameterName[1]===undefined ? true : sParameterName[1];
        }
    }
};

$(document).on("click", "#btnEnviar", function(){
    var tick_id = getUrlParameter('ID');
    var usu_id = $('#user_idx').val();
    var tickd_descrip = $('#tickd_descrip').val();

    if($('#tickd_descrip').summernote('isEmpty')){
        swal("Advertencia", "Campo Vacio", "warning");
    }else{
        $.post("../../controller/ticket.php?op=insertdetalle", {tick_id : tick_id, usu_id : usu_id, tickd_descrip : tickd_descrip}, function(data){
            listarDetalle(tick_id);
            $('#tickd_descrip').summernote("reset");
            swal("Exito", "Se ha registrado correctamente", "success");
        });
    }

    
});

$(document).on("click", "#btnCerrarTicket", function(){
    swal({
        title: "HelpDesk",
        text: "¿Esta seguro de cerrar el ticket?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        var tick_id = getUrlParameter('ID');
        var usu_id = $('#user_idx').val();
        if (isConfirm) {
            $.post("../../controller/ticket.php?op=update", {tick_id : tick_id, usu_id : usu_id}, function(data){
            });
            listarDetalle(tick_id);
            swal({
                title: "HelpDesk",
                text: "Ticket cerrado correctamente!",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
});

function listarDetalle(tick_id){
    $.post("../../controller/ticket.php?op=listardetalle", {tick_id : tick_id}, function(data){
        $("#lbldetalle").html(data);
    });

    $.post("../../controller/ticket.php?op=mostrar", {tick_id : tick_id}, function(data){
        data = JSON.parse(data);
        console.log(data);
        $("#lblestado").html(data.tick_estado);
        $("#lblnomusuario").html(data.usu_nom+' '+data.usu_ape);
        $("#lblfechcrea").html(data.fech_crea);
        $("#lblnomidticket").html("Detalle Ticket No."+data.tick_id);
        $("#cat_nom").val(data.cat_nom);
        $("#tick_titulo").val(data.tick_titulo);
        $("#tickd_descripusu").summernote('code',data.tick_descrip);
        if(data.tick_estado_texto=="Cerrado"){
            $("#pnldetalle").hide();
        }
        
        
    });
}

init();