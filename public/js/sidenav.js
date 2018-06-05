
$(document).ready(function(){
    alert('hola');
    $("#add-date").click(function(){

        $("#createCita").fadeToggle(2000);
    }
  );

  $("#btnEnviarCita").click(function(){
      $("#createCita").fadeOut(2000);
  }
);

$("#btnCancelarCita").click(function(){
    $("#createCita").fadeOut(2000);
}
);

});



function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
    document.getElementById("mySidenav").className = " sidenav  col-0";
}
