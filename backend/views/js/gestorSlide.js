//Area de arrastre

if ($("#milista").html() == 0) {
    $("#milista").css({
        "height": "50px"
    });
} else {
    $("#milista").css({
        "height": "auto"
    });
}

// Fin area de Arrastre

// Subir Imagen

$("#milista").on("dragover", function (e) {
    e.preventDefault();
    e.stopPropagation();

    $("#milista").css({
        "background": "url(views/images/pattern.jpg)"
    });
})

// Fin Subir Imagen

//Soltar Imagen

$("#milista").on("drop", function (e) {
    e.preventDefault();
    e.stopPropagation();

    $("#milista").css({
        "background": "rgba(238, 235, 235, 0.904)"
    });
    var archivo = e.originalEvent.dataTransfer.files;
    var imagen = archivo[0];

    //Validar Tamaño de la imagen
    var imagenSize = imagen.size;

    if (Number(imagenSize) > 2000000) {
        $(".seccion-editar").before('<div class="alert alert-warning text-center alerta">El archivo excede el peso permitido de 2MB</div>');
    } else {
        $(".alerta").remove();
    }

    //Validar tipo de la imagen
    var imagenType = imagen.type;
    console.log('respuesta', imagenType);
    if (imagenType == "image/jpeg" || imagenType == "image/png") {
        $(".alerta").remove();
    } else {
        $(".seccion-editar").before('<div class="alert alert-warning text-center alerta">El archivo no coincide con el formato aceptado</div>');
    }

    //Subir imagen al servidor
    if (Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png") {
        var datos = new FormData();
        datos.append("imagen", imagen);
        $.ajax({
            url: "views/Ajax/gestorSlide.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType:"json",
            beforeSend: function () {
                $(".seccion-editar").before('<img src="views/images/status.gif" id="status">');
            },
            success: function(respuesta){

                $("#status").remove();

                if(respuesta == 0){
                    $(".seccion-editar").before('<div class="alert alert-warning text-center alerta">La imagen es inferior al tamaño recomendado</div>');
                }else{     
                    $("#milista").css({
                        "height": "auto"
                    });
                    $("#milista").append('<div class="col-md-6 col-lg-4 item zoom-on-hover"><span class="lnr lnr-cross cruz"></span><img class="img-fluid" src="'+respuesta["ruta"].slice(6)+'" alt=""></div>');   

                    swal({
                        title: "OK!",
                        text: "La imagen se subio correctamente!",
                        type: "success",
                        confirmButtonText:"Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm){
                            if(isConfirm){
                                window.location = "edicionSlide";
                        }
                    });
                }
            }
        });
    }

})

//Fin Soltar Imagen

//Eliminar Item slide

$('.eliminarSlide').click(function(){

    if($(".eliminarSlide").length == 1){
        $("#milista").css({
            "height": "50px"
        });
    }

    idSlide = $(this).parent().attr("id");
    rutaSlide = $(this).attr("ruta");

    console.log('slide#', idSlide);
    $(this).parent().remove();

    var borrarItem = new FormData();
    borrarItem.append("idSlide", idSlide);
    borrarItem.append("rutaSlide", rutaSlide);

    $.ajax({
        url: "views/Ajax/gestorSlide.php",
        method: "POST",
        data: borrarItem,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta){
            
            console.log('respuesta', respuesta);
            swal({
                title: "OK!",
                text: "La imagen se Elimino correctamente",
                type: "success",
                confirmButtonText:"Cerrar",
                closeOnConfirm: false
                },
                function(isConfirm){
                    if(isConfirm){
                        window.location = "edicionSlide";
                }
            });
            
        }
    })

})

// ORDENAR ITEMS

var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarSlide").click(function(){

    $("#ordenarSlide").hide();
    $("#guardarSlide").show();

    $("#milista").css({
        "cursor":"move"
    });

    $("#milista span").hide();
    baguetteBox.run('.contenido');
        $(document).ready(function(){
        //Aplicar la función sortable a la lista con id milista
        $( "#milista" ).sortable({
            stop: function(event){
                for ( var i =0; i < $("#milista div").length; i++){
                    almacenarOrdenId[i] = event.target.children[i].id;
                    ordenItem[i] = i+1;  
                }
            }
        });
    });
})

$("#guardarSlide").click(function(){

    $("#guardarSlide").hide();
    $("#ordenarSlide").show();

    for(var i =0; i < $("#milista div").length; i++){
        var actualizarOrden = new FormData();
        actualizarOrden.append("actualizarOrdenSlide", almacenarOrdenId[i]);
        actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

        console.log('orden', ordenItem[i]);
        console.log('almacenarOrdenId', almacenarOrdenId[i]);

        $.ajax({
            url: "views/Ajax/gestorSlide.php",
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
                            window.location = "edicionSlide";
                    }
                });
            }
        })
    }
})