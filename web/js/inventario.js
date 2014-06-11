_CACHE_INVENTARIO = [];

function render_agregarResultado(articulo) {   
    var li = $('<li>').html(articulo.nombre + ' - ' + articulo.descripcion);

    if (articulo.resultado === 'error') {
    
        beepError.play();
        li.addClass('inventarioResultados_noEncontrado');
    
    } else if (articulo.resultado === 'duplicado') {
    
        beepError.play();
        li.addClass('inventarioResultados_duplicado');
    
    } else {
    
        beepOk.play();
        li.append('<ul><li>Estado: ');
        li.append('<ul><li>Accion: ');
    
    }
    
    $("#inventarioResultados").prepend(li);
    li.fadeIn( "slow" );
}

function action_buscarInventarioPorCodigoBarra(codigoBarra) {
    $.getJSON(__ROUTE['ajax_producto_codigobarra'] + '/' + codigoBarra, function(jsonData){
        
        if ( $.isEmptyObject(jsonData) )
        {
            
            jsonData = {};
            jsonData['nombre'] = '*ERROR*';
            jsonData['descripcion'] = 'El código ' + codigoBarra + ' produjo una excepción';
            jsonData['resultado'] = 'error';
        }
        
        if ( jsonData.hasOwnProperty('id') && _CACHE_INVENTARIO.indexOf(jsonData.id) > -1 ) {
            
            jsonData = {};
            jsonData['nombre'] = '*DUPLICADO*';
            jsonData['descripcion'] = 'El código ' + codigoBarra + ' ya esta en lista';
            jsonData['resultado'] = 'duplicado';
        
        }
        
        if ( jsonData.hasOwnProperty('id') && _CACHE_INVENTARIO.indexOf(jsonData.id) === -1 ) {
            
            _CACHE_INVENTARIO.push(jsonData.id);
            console.log(_CACHE_INVENTARIO);
            
        }
        
        render_agregarResultado(jsonData);
    });
}

function on_inventarioCodigoBarra(e){
    if(e.which === 13) {
        action_buscarInventarioPorCodigoBarra($(this).val());
    }
}

$(function(){
   $("#inventarioCodigoBarra").focus();
   
   $("#inventarioCodigoBarra").keypress(on_inventarioCodigoBarra);
});