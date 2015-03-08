/**
 * Created by leescobarg on 9/02/15.
 */
var base_url = $("#base_url").val();

$('#client_list, #line_list, #banco_list, #usuario_list, #nomina_list, #prestamo_list, #operacion_list').DataTable();

$("#guardar_alquiler").click(function(){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/alquiler/guardar_alquiler/",
        data: $("#form_alquiler").serialize()
    }) .done(function( msg ) {
        $("#guardar_alquiler").hide();
        $("#asociar_alquiler").attr("href", base_url+"linea/nuevo_historial/"+msg);
        $("#asociar_alquiler").show();

    });
});

<<<<<<< HEAD



=======
>>>>>>> 8a2a0e4e4314add3f05ca0df784dc471f2e0848b
$('[data-toggle=confirmation]').confirmation({
    title: '¿Esta seguro de eliminar este registro?',
    btnOkLabel: 'Si',
    btnCancelLabel: 'No',
    href: function(){
        var ref = $(this).attr('data-ref');
        return ref;
    },
    onCancel: function(){
        $('[data-toggle=confirmation]').confirmation('hide')
    }
});

