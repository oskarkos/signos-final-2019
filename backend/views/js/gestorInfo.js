// editar info

$(".editarli").click(function(){
    idInfo = $(this).parent().parent().attr("id");
    linkimagen = $("#"+idInfo).find("img").attr("src");
    titulo = $("#"+idInfo).find("h3").html();
    contenido = $("#"+idInfo).find("p").html();

    $("#editarInfoSec").html('<form method="POST" enctype="multipart/form-data"><div class="container edicion-titulo mt-3"><p>Editar información </p></div><div class="container editar-articulo pt-3 mb-3"><div class="container"><input name="editarTituloInfo" placeholder="Titulo" value="'+titulo+'" class="form-control mb-3" /><input name="editarLinkInfo" placeholder="Link de la imagen" value="'+linkimagen+'" class="form-control mb-3" /><textarea class="form-control" name="contenidoEditarInfo" rows="5">'+contenido+'</textarea><input type="hidden" name="idInfo" value="'+idInfo+'"><button class="btn btn-primary mt-3 mb-3" type="submit"> <i class="fas fa-save"></i>  Guardar</button></div></form>');

    $('html, body').animate({
        // #elemento2 · Será el elemento donde queremos desplazarnos.
        scrollTop: $("#editarInfoSec").offset().top
        //1500 · La velocidad que le queremos dar
         }, 500);
})

//editar orden

var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarInfo").click(function(){

    $("#ordenarInfo").hide();
    $("#guardarInfo").show();

    $("#listaInfo").css({
        "cursor":"move"
    });

    $(document).ready(function(){
        //Aplicar la función sortable a la lista con id milista
        $( "#listaInfo" ).sortable({
            stop: function(event){
                for ( var i =0; i < $("#listaInfo div").length; i++){
                    almacenarOrdenId[i] = event.target.children[i].id;
                    ordenItem[i] = i+1;  
                }
            }
        });
    });
})

$("#guardarInfo").click(function(){

    $("#guardarInfo").hide();
    $("#ordenarInfo").show();

    for(var i =0; i < $("#listaInfo div").length; i++){
        var actualizarOrden = new FormData();
        actualizarOrden.append("actualizarOrdenInfo", almacenarOrdenId[i]);
        actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

        $.ajax({
            url: "views/Ajax/gestorInfo.php",
            method: "POST",
            data: actualizarOrden,
            cache: false,
            contentType: false,
            processData: false,
            success: function(respuesta){
                swal({
                    title: "OK!",
                    text: "El orden se modifico correctamente",
                    type: "success",
                    confirmButtonText:"Cerrar",
                    closeOnConfirm: false
                    },
                    function(isConfirm){
                        if(isConfirm){
                            window.location = "?action=info";
                    }
                });
            }
        })
    }
})