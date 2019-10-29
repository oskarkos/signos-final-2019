//Agregar Articulo
$("#btn-agregar-articulo").click(function(){

    $("#agregarArticulos").toggle(400);
    $(".imagen-seleccion").css({
        "height": "40px"
    });

})

// subir imagen con el input

$("#subirFoto").change(function(){

    imagen = this.files[0];

    //validar tamaño imagen

    imagenSize = imagen.size;
    if(Number(imagenSize)>2000000){
        $("#imagenArt").before('<div class="alert alert-warning text-center alerta">El archivo excede el peso permitido de 2MB</div>');
    }else{
        $(".alerta").remove();
    }

    imagenType = imagen.type;
    
    if(imagenType == "image/jpeg" || imagenType == "image/png"){
        $(".alerta").remove();
    }else{
        $("#imagenArt").before('<div class="alert alert-warning text-center alerta">Formato de imagen no Soportado, este debe ser JPG o PNG</div>');
    }

    //Mostrar Imagen con AJAX

    if(Number(imagenSize)<2000000 && imagenType == "image/jpeg" || imagenType == "image/png" ){

        var datos = new FormData();
        datos.append("imagen", imagen);

        $.ajax({
            url: "views/Ajax/gestorProducciones.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#imagenArt").before('<img src="views/images/loading.gif" id="status">');
            },
            success: function(respuesta){

                $("#status").remove();

                if(respuesta==0){
                    $("#imagenArt").before('<div class="alert alert-warning text-center alerta">La imagen es inferior a 1920px X 1080px</div>');
                }else{
                    $(".imagen-seleccion").css({
                        "height": "auto"
                    });
                    $(".imagen-seleccion").html('<div id="imagenASubir"><img class="img-fluid" src="'+respuesta.slice(6)+'" alt=""></div>');
                }
                console.log('respuesta', respuesta);
            }
        })
    }
})

//editar Articulo



$(".editar-icon").click(function(){
        
    idArticulo = $(this).parent().parent().attr("id");
    rutaImagen = $("#"+idArticulo).find("img").attr("src");
    titulo = $("#"+idArticulo).find(".centrado").html();
    link = $("#"+idArticulo).find("input").val();
    

    $("#editarArticulo").html('<form method="POST" enctype="multipart/form-data"><div class="container edicion-titulo mt-3"><p>Editar producción </p></div><div class="container editar-articulo pt-3 mb-3"><input type="file" style="display:none" id="subirNuevaFoto" class="btn btn-default mb-3"><div id="nuevaFoto"><img class="img-fluid mb-3 imagen-editar alt="Responsive image" src="'+rutaImagen+'" alt="" srcset=""><span class="lnr lnr-cross borrar-img cambiarImagen"></span></div><input name="editarTitulo" class="form-control mb-3" type="text" placeholder="Título" value="'+titulo+'"><input class="form-control type="text" placeholder="Link" name="editarLink" value="'+link+'"><div class="custom-control custom-checkbox my-1 mb-3 mr-sm-2"></div><button type="submit" class="btn btn-primary mb-3"><i class="fas fa-save"></i>   Guardar</button></div><input type="hidden" name="id" value="'+idArticulo+'"><input type="hidden" name="fotoAntigua" value="'+rutaImagen+'"><form>');

        $('html, body').animate({
            // #elemento2 · Será el elemento donde queremos desplazarnos.
            scrollTop: $("#editarArticulo").offset().top
            //1500 · La velocidad que le queremos dar
             }, 500);

    $(".cambiarImagen").click(function(){

        $(this).hide();
        $("#subirNuevaFoto").show();
        $("#nuevaFoto").html("");
        
        $("#subirNuevaFoto").attr("name", "editarImagen");
        $("#subirNuevaFoto").attr("required", true);

       $("#subirNuevaFoto").change(function(){

            imagen = this.files[0];
            imagenSize = imagen.size;

            if(Number(imagenSize)>2000000){
                $("#nuevaFoto").before('<div class="alert alert-warning text-center alerta">El archivo excede el peso permitido de 2MB</div>');
            }else{
                $(".alerta").remove();
            }

            imagenType = imagen.type;
    
            if(imagenType == "image/jpeg" || imagenType == "image/png"){
                $(".alerta").remove();
            }else{
                $("#nuevaFoto").before('<div class="alert alert-warning text-center alerta">Formato de imagen no Soportado, este debe ser JPG o PNG</div>');
            }

            if(Number(imagenSize)<2000000 && imagenType == "image/jpeg" || imagenType == "image/png" ){

                var datos = new FormData();
                datos.append("imagen", imagen);
        
                $.ajax({
                    url: "views/Ajax/gestorProducciones.php",
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $("#nuevaFoto").html('<img src="views/images/loading.gif" id="status">');
                    },
                    success: function(respuesta){
        
                        $("#status").remove();
        
                        if(respuesta==0){
                            $("#nuevaFoto").before('<div class="alert alert-warning text-center alerta">La imagen es inferior a 1920px * 1080px</div>');
                        }else{
                            $("#nuevaFoto").html('<img class="img-fluid mb-3 imagen-editar alt="Responsive image" src="'+respuesta.slice(6)+'" alt="" srcset="">');
                        }
                        console.log('respuesta', respuesta);
                    }
                })
            }
        })
    })
})


//Ordenar Item Articulos

/*var almacenarOrdenId = [];
var cantidadArt = $("#produccc img").length;
var ordenItem = [];

$("#btn-ordenar-articulos").click(function(){

    $("#btn-ordenar-articulos").hide();
    $("#btn-guardar-articulos").show();

    $(".editar-icon").hide();
    $(".eliminar-icon").hide();
    $(".modal").remove();
    
    $("#editarArticulo").sortable({
        revert: true,
        connectWith: ".bloqueArticulo",
        handle: ".handleArticle",
        stop: function(event){

            for(var i= 0; i < $("#editarArticulo li").length; i++){

                almacenarOrdenId[i] = event.target.children[i].id;
                ordenItem[i]  =  i+1;

            }	
        }
    });
    
    

    $("#btn-guardar-articulos").click(function(){

        $("#btn-ordenar-articulos").show();
        $("#btn-guardar-articulos").hide();

        /*for ( var i=0; i < cantidadArt; i++){
                
            var actualizarOrden = new FormData();

            actualizarOrden.append("actualizarOrdenArticulos", almacenarOrdenId[i]);
            actualizarOrden.append("actualizarOrdenItems", ordenItem[i]);

            console.log('orden A', almacenarOrdenId[i]);
            console.log('orden I', ordenItem[i]);
            $.ajax({
                url: "views/ajax/gestorArticulos.php",
                method: "POST",
                data: actualizarOrden,
                cache: false,
                contentType: false,
                processData: false,
                success: function(respuesta){

                    $("#articulos").html(respuesta);

                    swal({
                        title: "OK!",
                        text: "El orden se modifico correctamente",
                        type: "success",
                        confirmButtonText:"Cerrar",
                        closeOnConfirm: false
                        },
                        function(isConfirm){
                            if(isConfirm){
                                window.location = "articulos";
                        }
                    });
                }
            })
        }
    })
})*/
