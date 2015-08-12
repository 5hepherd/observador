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
$("tbody").on("click", "tr",function(){
    var texto = $(this).text();
    var faltas = texto[texto.length-1];
    var nombre = texto.substring(6,texto.length-1);
    codigo = texto.substr(0,6);
    $("#nombre").html(nombre);
    $("#grupo").html(grado);
    $("#faltas").html(faltas);
    $("#cuadro").fadeIn();
    $("#back").fadeIn();
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
}
function cargaGrupo(grado){
    var conexion = new XMLHttpRequest();
        conexion.onreadystatechange=function(){
            if(conexion.readyState==4 && conexion.status==200){
                $('tbody').html(conexion.responseText);
            };
        };
        conexion.open("GET","js/lista?g="+grado,true);
        conexion.send();
}
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
