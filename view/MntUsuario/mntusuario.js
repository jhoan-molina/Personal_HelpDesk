var usu_id = $('#user_idx').val();
var rol_id = $('#rol_idx').val();

function init(){
    $("#usuario_form").on("submit", function(e){
        guardaryeditar(e);
    
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url : "../../controller/usuario.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            console.log(datos);
            $("#usuario_form")[0].reset();
            $("#modalMantenimiento").modal('hide');
            $("#usuario_data").DataTable().ajax.reload();
            swal({
                title: "HelpDesk",
                text: "Ha sido registrado satisfactoriamente!",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).ready(function(){

    tabla=$('#usuario_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom:'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url: '../../controller/usuario.php?op=listar',
                type: "post",
                dataType: "json",
                data:{usu_id : usu_id},
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength":10,
            "autoWidth":false,
            "language":{
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando un total de 0 registros",
                "sInfoFiltered": "(filtrando de un total de _MAX_ registros",
                "sInfoPostFix": "",
                "sSearch": "Buscar",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguente",
                    "sPrevious": "Anterior"
                },
                "oAria":{
                    "sSortAscending": ": Activar para ordenar la columna de maneras ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de maneras descendente"
                }
            }
    }).DataTable();

});

function editar(usu_id){
    $('#mdlTitulo').html('Editar Registro');

    $.post("../../controller/usuario.php?op=mostrar", {usu_id : usu_id}, function(data){
        data = JSON.parse(data);
        $('#usu_id').val(data.usu_id);
        $('#usu_nom').val(data.usu_nom);
        $('#usu_ape').val(data.usu_ape);
        $('#usu_correo').val(data.usu_correo);
        $('#usu_pass').val(data.usu_pass);
        $('#rol_id').val(data.rol_id).trigger('change');
        console.log(data);
    });

    $('#modalMantenimiento').modal('show');
}

function eliminar(usu_id){
    swal({
        title: "HelpDesk",
        text: "¿Esta seguro de eliminar a este usuario?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controller/usuario.php?op=eliminar", {usu_id : usu_id}, function(data){

            });
            $('#usuario_data').DataTable().ajax.reload();
            swal({
                title: "HelpDesk",
                text: "Ha sido eliminado satisfactoriamente!",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click", "#btnNuevo", function(){
    $('#mdlTitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    $('#modalMantenimiento').modal('show');

});

init();