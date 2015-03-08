/**
 * Created by leescobarg on 9/02/15.
 */
var base_url = $("#base_url").val();

$('#client_list, #line_list').DataTable({

});

$('').DataTable({

});

$('#banco_list').DataTable({

});

$('#usuario_list').DataTable({

});

$('#nomina_list').DataTable({

});

$('#prestamo_list').DataTable({

});


$('#operacion_list').DataTable({

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

$("#guardar_operacion").click(function(){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/operacion/guardar_operacion/",
        data: $("#form_guardar_operacion").serialize()
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

$("#guardar_linea").click(function(){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/linea/guardar_linea/",
        data: $("#form_linea").serialize()
    })
});

$("#guardar_control").click(function(){
    $.ajax({
        type: "POST",
        url: base_url+"index.php/control/guardar_control/",
        data: $("#form_control").serialize()
    })
});




