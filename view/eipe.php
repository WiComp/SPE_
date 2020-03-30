<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="estilos.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

</head>
<body id="central" onload=hola() >

<nav class="navbar navbar-expand-sm bg-primary navbar-dark navbar-fixed-top" role="navigation">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><h1>EIPE</h1></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
        <a class="nav-link" href="#" onclick=hola()><h3>Inicio</h3></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?id=2" onclick=hola() ><h3>Estancias</h3></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?id=3" onclick=hola()><h3>Configuración</h3></a>
        </li>
      </ul>
    </div>   
</nav>
<br>
<br>
<h2>Tienes un total de <b><?php print_r(sizeof($estanciasRevision))?></b> estancias a revisar: </h2>
<br><br>



<div class="container col-md-7">
        <div class="row">
          <div class="col-md-10 blog-content">
            <?php 

            foreach ($estanciasRevision as $alumno) {
              # code...
              //print_r($alumno);
              //print_r($alumno['NIU']);
            //($InfoAlumno['NIU']){
              $info = "Informacion" . $alumno['NIU']  ?>

            <p class="lead mb-2"> <b><?php 
                     print_r($alumno['Nombre']);
            ?></b> <span class ="fa fa-angle-down" aria-hidden="true" data-toggle="collapse" data-target =<?php print_r("#Informacion" . $alumno['NIU'])?>></span>
            <div id=<?php print_r($info) ?> class="collapse"><?php print_r('<script type="text/javascript">$("#txtCreatureInfo").html("");</script>'); 
          
            print_r(printPasosARevisar($alumno));?>
               <p><a href="index.php?id=1" class="btn btn-primary btn-sm float-right">Ver más</a></p> <br>
            </div>
            <div class="progress">
               <div class="progress-bar progress-bar-striped bg-danger active" role="progressbar" aria-valuenow= "70" aria-valuemin="0" aria-valuemax="100" style="width: 80%<?php //$Porcentaje['Porcentaje']?>"><br><br>
               </div>
            </div>
            <?php }?>
          </p>
        </div>
              </div>
</div>
<script type="text/javascript">
  


</script>
</script>
</body>
</html>
