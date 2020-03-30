
<html>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="estilos.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</head>
<body onload=hola()>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark navbar-fixed-top" role="navigation">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><h1>EIPE</h1></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link" href=index.php><h3>Inicio</h3></a></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?id=2"><h3>Estancias</h3></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=><h3>Configuración</h3></a>
        </li>
      </ul>
    </div>   
</nav>
<br>
<br>
<div class="container">
  <div class="card-columns">
    <div class="card" style= "border:none">
        <h4 class="card-title center">Anass Abajtour</h4>
        <h6 class="card-subtitle mb-2 text-muted">Alumno</h6>
        <p class="card-text">
          <div class = "col">
            <i class = "fa fa-at"></i> correu@correu.com<br>
            <i class = "fa fa-phone"></i>  666555444<br>
            <i class = "fa fa-book"></i> Tecnologies de la Informació
          </div><br>
        </p>
    </div>
     <div class="card" style="border:none">
        <h4 class="card-title center">Alberto Random</h4>
        <h6 class="card-subtitle mb-2 text-muted">Tutor</h6>
        <p class="card-text">
          <div class = "col">
            <i class = "fa fa-at"></i> inventado@correu.com<br>
            <i class = "fa fa-phone"></i>  699333222<br>
            <i class = "fa fa-book"></i> Google España
          </div><br>
        </p>
    </div>
   <div class="card" style= "border:none">
        <h4 class="card-title center">Calendario</h4>
      
        <p class="card-text">
            Contacto inicial: <b>17/2/20</b><br>
            1r seguimiento estudiante: <b>19/2/20</b><br>
            Contacto tutor: <b>20/2/20</b> <br>
            2n seguimiento estudiante: <b>26/2/20</b> <br>
            Solicitudes finales: <b>12/3/20</b><br>
            Final: <b>24/3/20</b> <br>
        </div>
    </div>
  </p>
  </div>

</div>
<div class = container>
  <!--<button type="button" class="btn btn-dark float-right" >Evaluar</button>-->
</div>

<div class=container>

  <b>Aquí tienes el progreso de la estancia:</b> 
<br><br> 
  <div class="progress">
   <div 
      class="progress-bar" role="progressbar" style="width: 90%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">90%
   </div>
 </div><br>
 <div class = "container">
  <div class="alert alert-success" style="line-height: 34px;" role="alert">
  <b>FASE INICIAL</b>
  <a class="btn btn-info float-right" data-toggle="collapse" href="#faseInicial" role="button" aria-expanded="false" aria-controls="collapseExample">
    consultar
  </a>
    </div>
  <div class = "changeBoxInicial">
    <div class = "collapse" class="container" id="faseInicial">
    <div class="row align-items-start">
    <div class="col">
      <u><b>Comunicación con estudiante</b></u> <br><br>
      <b>Correo enviado </b><input id="inicialAlumnoS" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked data-off="NO"><br>
      <span id="inicialAlumnoSend">Realizado correctamente a fecha: 26/2/2020</span> <br>
      <b>Respuesta recibida </b><input id="inicialAlumnoR" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked data-off="NO"><br>
      <span id="inicialAlumnoResp">Realizado correctamente a fecha: 26/2/2020</span><br>
    </div>
    <div class="col">
      <u><b>Comunicación con tutor</b></u><br><br>
      <b>Correo enviado </b><input id="inicialTutorS" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked data-off="NO"><br>
      <span id="inicialTutorSend">Realizado correctamente a fecha: 26/2/2020</span><br>
      <b>Respuesta recibida </b><input id="inicialTutorR" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked data-off="NO"><br>
      <span id="inicialTutorResp">Realizado correctamente a fecha: 26/2/2020</span><br>
    </div>
  </div>
</div>
</div>



</div>
  <div class = "container">
  <div class="alert alert-warning" style="line-height: 34px;" role="alert">
  <b>FASE DE SEGUIMIENTO</b>
  <a class="btn btn-info float-right" data-toggle="collapse" href="#faseInicial1" role="button" aria-expanded="false" aria-controls="collapseExample">
    consultar
  </a>
  </div>
  <div class = "changeBoxInicial">
  <div class = "collapse" class="container" id="faseInicial1">
    <div class="row align-items-start">
    <div class="col">
      <u><b>Comunicación con estudianteaisodjsaijdoisa</b></u> <br><br>
      <b>Correo enviado oidhjidosadaso</b><input id="medioAlumnoS" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" data-off="NO"><br>
      <span id="medioAlumnoSend"></span><br>
      <b>Respuesta recibidaiudhsadisa </b><input id="medioAlumnoR" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" data-off="NO"><br>
      <span id="medioAlumnoResp"></span><br>
    </div>
    <div class="col">
      <u><b>Comunicación con tutor</b></u><br><br>
      <b>Correo enviado </b><input id="medioTutorS" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" data-off="NO"><br>
      <span id="medioTutorSend"></span>
      <b>Respuesta recibida </b><input id="medioTutorR" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" data-off="NO"><br>
      <span id="medioTutorResp"></span>
    </div>
  </div>
</div>
</div>
</div>
<div class = "container">
  <div class="alert alert-light" style="line-height: 34px;" role="alert">
  <b>FASE FINAL</b>
  <a class="btn btn-info float-right" data-toggle="collapse" href="#faseInicial2" role="button" aria-expanded="false" aria-controls="collapseExample">
    consultar
  </a>
  </div>
</div>
<div class = container>  
<br>
<br>
<div class="container">

    <form>
      <div class="form-group"> 
        <label for="comentarios">Deje aquí sus comentarios</label>
        <textarea class="form-control" rows="5" id="comentarios" name="comentarios"></textarea>
      </div> 
      <button type="submit" class="btn btn-info float-right">Enviar</button>       
    </form>

  </div> 
 
 </div>
 <script>


/*$('#inicialAlumno').change(function() {

  alert("changed");
  //var f = new Date();
  //$("#contactoInicialAlumnoFecha").html(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
 // document.getElementByID("contactoInicialAlumnoFecha").innerHTML = document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
})*/
/*$('#inicialAlumno').change(function() {

   if($(this).is(":checked")) {
      //'checked' event code
     var id = $(this).attr('id');
     alert(id);
     var f= new Date();
     $("#contactoInicialAlumnoFecha").html("Realizado correctamente a fecha: " + f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
   }
   else{
    $("#contactoInicialAlumnoFecha").html("");
   }
})*/
$('.changeBoxInicial input[type=checkbox]').change(function() { // while you're at it listen for change rather than click, this is in case something else modifies the checkbox
  var id = $(this).attr('id');
  var idF =" #"+ id + "FechaSend";
  //alert(id);
  if(id.substr(-1) == 'S'){
    var idF =" #"+ id + "end";
  }
  else{
    var idF =" #"+ id + "esp";
  }
  if($(this).is(":checked")) {
     var f= new Date();
     $(idF).html("Realizado correctamente a fecha: " + f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear() + prueba() + "<br>");
     prueba();
   }
   else{
    $(idF).html("");
    prueba();
   }

});
  


  var prueba = function(){
   return ''// <i class="fa fa-calendar"></i>'
  }

</script>

</body>