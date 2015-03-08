/**
 * Created by leescobarg on 9/02/15.
 */
var base_url = $("#base_url").val();

$('#client_list, #line_list, #banco_list' +
'#usuario_list, nomina_list, #prestamo_list, #operacion_list').DataTable({

});

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

$("#guardar_detallebanco").click(function(){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/detallebanco/guardar_detallebanco/",
        data: $("#form_detallebanco").serialize()
    })
});

$("#guardar_historial").click(function(){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/linea/guardar_historial/",
        data: $("#form_historial").serialize()
    })
});


$("#guardar_prestamoempleado").click(function(){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/nomina/guardar_prestamo/",
        data: $("#form_prestamoempleado").serialize()
    })
});

$("#guardar_nomina").click(function(){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/nomina/guardar_nomina/",
        data: $("#form_nomina").serialize()
    })
});



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

