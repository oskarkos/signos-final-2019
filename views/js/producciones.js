cantidadProducciones = $(".imagen-pro").length;
if(cantidadProducciones > 6){
    $("#showmore").show();
    var x = document.getElementsByClassName('contenedor');
    var i;
    for (i = 6; i < x.length; i++) 
    {
    x[i].className += ' readmore'; // WITH space added
    }
    $("#showmore").click(function(){
        $(this).hide();
        $("#showless").show();
        $(".readmore").toggle(400);
        $(".readmore").css({
            "display": "block",
        });
    })
    $("#showless").click(function(){
        $(this).hide();
        $("#showmore").show();
        $(".readmore").toggle(400);
    })
}