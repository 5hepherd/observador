var grado = "";
var codigo = "";
$("#cuadro").hide();
$("#back").hide();
$(document).ready(function() {
    $("a").click(function() {
        $("a").removeClass("current-demo");
        $(this).addClass("current-demo");
        grado = $(this).html();
        cargaGrupo(grado);
        $("#grado").html(grado);
    });


});
$(".lista").on("click", "tr",function(){
    var texto = $(this).text();
    var faltas = texto[texto.length-3];
    var llegadas = texto[texto.length-2];
    var salidas = texto[texto.length-1];
    codigo = "";
    var nombre = "";
	for(i=0;i<6;i++){
        codigo += texto[i];
    };
    for(i=6;i<texto.length-3;i++){
        nombre += texto[i];
    };
    $("#nombre").html(nombre);
    $("#grupo").html(grado);
    $("#faltas").html(faltas);
    $("#llegadas").html(llegadas);
    $("#salidas").html(salidas);
    $.getJSON('js/actividades?t=llegadas&c='+codigo, function(dataSource) {
        data = dataSource;
        $.each( dataSource, function( index ) {
            $( ".llegadas tbody" ).append( "<tr>" );
                $.each( dataSource[index], function( key, value ) {
                  $( ".llegadas tbody tr:last-child" ).append( "<td>"+value+"</td>" );
                });
            $( ".llegadas tbody" ).append( "</tr>" );
        });
    });
    $.getJSON('js/actividades?t=salidas&c='+codigo, function(dataSource) {
        data = dataSource;
        $.each( dataSource, function( index ) {
            $( ".salidas tbody" ).append( "<tr>" );
                $.each( dataSource[index], function( key, value ) {
                  $( ".salidas tbody tr:last-child" ).append( "<td>"+value+"</td>" );
                });
            $( ".llegadas tbody" ).append( "</tr>" );
        });
    });
    $.getJSON('js/actividades?t=faltas&c='+codigo, function(dataSource) {
        data = dataSource;
        $.each( dataSource, function( index ) {
            $( ".faltas tbody" ).append( "<tr>" );
                $.each( dataSource[index], function( key, value ) {
                  $( ".faltas tbody tr:last-child" ).append( "<td>"+value+"</td>" );
                });
            $( ".faltas tbody" ).append( "</tr>" );
        });
    });
    $("#cuadro").fadeIn();
    $("#back").fadeIn();
});
$(".tabla tbody").on("click", "tr",function(){
    var id=$("td:first-child",this).text();
    if($(this).parent().parent().hasClass( "llegadas" )){
        var tipo = "llegadas";
    }else if($(this).parent().parent().hasClass( "salidas" )){
        var tipo = "salidas";
    }else if($(this).parent().parent().hasClass( "faltas" )){
        var tipo = "faltas";
    };
    borrar(id,tipo,codigo);
});
$("#back").click(function(){ocultar()});
$("#cerrar").click(function(){ocultar()});
$("#fuckear").click(function(){
    var datos = {
        cod:codigo,
        observacion:$('#observaciones').val()
    };
    enviarData(datos);
});
$(".nav").click(function(){
    window.location ="http://"+location.hostname;
});
function ocultar(){
    cargaGrupo(grado);
    $("#back").fadeOut();
    $("#cuadro").fadeOut();
    $('#observaciones').val("");
    $(".tabla tbody").html("");
}
function cargaGrupo(grado){
    var conexion = new XMLHttpRequest();
        conexion.onreadystatechange=function(){
            if(conexion.readyState==4 && conexion.status==200){
                $('.lista').html(conexion.responseText);
            };
        };
        conexion.open("GET","js/lista?g="+grado,true);
        conexion.send();
}
function borrar(id,tipo){
    var conexion = new XMLHttpRequest();
        conexion.onreadystatechange=function(){
            if(conexion.readyState==4 && conexion.status==200){
                ocultar();
            };
        };
        conexion.open("GET","js/borrar?id="+id+"&tipo="+tipo+"&c="+codigo,true);
        conexion.send();
}
/*function actividades(codigo){
    var conexion = new XMLHttpRequest();
        conexion.onreadystatechange=function(){
            if(conexion.readyState==4 && conexion.status==200){
                $('#actividades').html(conexion.responseText);
            };
        };
        conexion.open("GET","js/actividades?c="+codigo,true);
        conexion.send();
}*/
function enviarData(formData){
    $.ajax({
    url : "js/guardar",
    type: "POST",
    data : formData,
    success: function(data, textStatus, jqXHR)
    {
        ocultar();
    },
    error: function (jqXHR, textStatus, errorThrown)
    {

    }
});
};
