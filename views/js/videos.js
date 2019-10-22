  $("#movieClick").click(function(){ var theLink = "https://www.youtube.com/embed/GWFRazoyKxU?rel=0&color=white"; document.getElementById("onscreen").src = theLink; }); 
  
  $("#movie").on('hidden.bs.modal', function (e) { $("#movie iframe").attr("src", ''); }); 
