function render_prepararSalidaresultados(jsonData){
    $("#inventarioResultados").empty();
    for(var indice in jsonData.inventario)
        render_agregarResultado(jsonData.inventario[indice]);
        
     $("#inventarioResultado" + jsonData.ultimaModificacion).fadeIn( "slow" );
}

function render_agregarResultado(articulo) {
    var li = $('<li>').html('<span style="font-size:8pt;">'+articulo.transaccion.cantidad + 'x</span> ' + articulo.nombre + ' - ' + articulo.descripcion);
    
    li.attr('id','inventarioResultado' + articulo.id);
    
    li.prepend('<img src="/images/icono_borrar.png" style="vertical-align:middle;"/>&nbsp;');

    li.append('<ul class="inventarioContenedorResutaldosDetalles"><li>Disponibilidad: ' + articulo.cantidadDisponible);
    
    $("#inventarioResultados").prepend(li);
}

function mostrarErrorDeOperacion (strData) {
    
    beepError.play();
    $("#inventarioContenedorResultadosMensaje").html(strData).fadeIn('slow').delay(2000).fadeOut('slow')
    
}

function action_buscarInventarioPorCodigoBarra(codigoBarra) {
    $.getJSON(__ROUTE['ajax_producto_codigobarra'] + '/' + _OPERACION + '/' + codigoBarra, function(jsonData){
        
        if ( $.isEmptyObject(jsonData) )
        {
            beepError.play();
            mostrarErrorDeOperacion ('** ERROR GENERAL AJAX **');
            return;
        }
        
        if (jsonData.hasOwnProperty('error'))
        {
            beepError.play();
            mostrarErrorDeOperacion (jsonData.titulo + ' - ' + jsonData.descripcion);
            return;
        }
        
        beepOk.play();
        render_prepararSalidaresultados(jsonData);
    });
}

function on_inventarioCodigoBarra(e){
    if(e.which === 13 && $(this).val() !== '') {
        action_buscarInventarioPorCodigoBarra($(this).val());
        $(this).val('');
    }
}


function on_inventarioProcesarTransaccion(e) {
    
    $.getJSON(__ROUTE['ajax_inventario_procesar'], function(jsonData){
        $("#inventarioContenedorResultados").html('Transaccion procesada!');
    });
 
}

function action_hidratarInventario() {
    $.getJSON(__ROUTE['ajax_cargarInventarioVirtual'], function(jsonData){
       render_prepararSalidaresultados(jsonData);
    });
}

function on_inventarioEliminarVirtual() {
    $.getJSON(__ROUTE['ajax_eliminarInventarioVirtual'], function(){
        action_hidratarInventario();
    });
}

$(function(){
   
    $("#inventarioCodigoBarra").focus();
   
    $("#inventarioCodigoBarra").keypress(on_inventarioCodigoBarra);
    
    $("#inventarioCodigoBarra").click(function(){$(this).val('');});
    
    $("#inventarioEliminarVirtual").click(on_inventarioEliminarVirtual);
    
    $("#inventarioProcesarTransaccion").click(on_inventarioProcesarTransaccion);
    
    action_hidratarInventario();
   
});