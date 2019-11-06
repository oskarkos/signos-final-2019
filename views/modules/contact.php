<div class="container-fluid mt-3 contacto" id="contact" >
    <div class="row">
    <div class="col contact">
        <h1 class="text-white text-center pb-3 contactitle">Contact</h1>
    </div>
    </div>
    <div class="row">
    <div class="col-lg-3 tel">
        <h3>Phone:</h3>
        <p>+571-851-0935 </p>
    </div>
    <div class="col-lg-3 mail">
        <h3>E-Mail:</h3>
        <p>info@signos.com.co</p>
    </div>
    <div class="col-lg-6 col-xl-6 direccion">
        <h3>Address:</h3>
        <p>Carrera 14A No. 2A-08 San Pablo, Zipaquirá, Cundinamarca - Colombia</p>
    </div>
    </div>
</div>

<script>

$(".direccion").css({
    "cursor":"pointer"
});

$(".direccion").click(function(e) { 
    e.preventDefault(); 
    var tab = window.open('https://g.page/SignosStudio?share', '_blank'); 
    if(tab){ tab.focus();}
});

</script>