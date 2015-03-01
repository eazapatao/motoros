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

