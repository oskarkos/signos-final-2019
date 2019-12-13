$("#btn-cambiar-reel").click(function(){

    idReel = $(this).parent().attr("id");
    link = $("#"+idReel).find("input").val();

    $("#editarReel").html('<form method="POST"><div class="container edicion-titulo mt-3"><p>Editar Reel </p></div><div class="container editar-articulo pt-3 mb-3"><input class="form-control mb-3" type="text" placeholder="Link" name="editarLinkReel" value="'+link+'"><input type="hidden" name="idReel" value="'+idReel+'"><button type="submit" class="btn btn-primary mb-3 mt-3"><i class="fas fa-save"></i>   Guardar</button></div><form>');

    $('html, body').animate({
        // #elemento2 · Será el elemento donde queremos desplazarnos.
        scrollTop: $("#editarReel").offset().top
        //1500 · La velocidad que le queremos dar
         }, 500);
})

