<!DOCTYPE html>
<html lang="en">
<head>
 <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="estilos.css">
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
   <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

 
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.datatables.net/colreorder/1.5.2/js/dataTables.colReorder.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</head>
<body  id="central" onload=hola() >

<nav class="navbar navbar-expand-sm bg-primary navbar-dark navbar-fixed-top" role="navigation">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><h1>EIPE</h1></a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
        <a class="nav-link" href="index.php" ><h3>Inicio</h3></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?id=2" onclick=hola()><h3>Estancias</h3></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?id=3" onclick=hola()><h3>Configuración</h3></a>
        </li>
      </ul>
    </div>   
</nav>
<br>
<br>
<div id="all">
  <div class = container>

    <div class=container>
     <?php
   //print_r("PHP OK");
   //print_r($_POST['Horas']);
     
       // $cursoActual = getCursoActual(NULL, 0);
        $gradosAll =  getGrados();
        
       // print_r($cursoActual);
        $errorConsulta="";
    if(!isset($_POST['grado'])){
     //  $gradoReturn= setGradoToEstancia($gradosAll[0]['codigo_grado']);
     // $gradoReturn = $gradosAll[0]['codigo_grado'];
      //$GLOBALS["gradoReturn"]  = $gradosAll[0]['codigo_grado'];
      if(isset($_POST['gradoNewEstancia'])){
        $tableEstancias = ajaxTableEstancias($_POST['gradoNewEstancia'], NULL, $cursoActual);
      }else{
          $tableEstancias = ajaxTableEstancias(0, NULL, $cursoActual);
      }
    
    
    }
    else{

      //Solo cambio de grado -- OK 
      $grado = $_POST['grado']; 
     // $GLOBALS["gradoReturn"]  = 0;
    //  $gradoReturn= setGradoToEstancia($grado);
      // $gradoReturn = $_GET['grado'];

       //$gradoNewEstancia = $grado;
      // cambia grado y en curso OFF. 
      if(isset($_POST['name1'])){ // si ha cambiado algun check
        $all = $_POST['name1']; 
        
      ///print_r("HOLA");
         //print_r($backUpChange);
        $tableEstancias = ajaxTableEstancias($grado, $all, $cursoActual);
      
      }else{
        
           //print_r("HOLA1");
         $tableEstancias = ajaxTableEstancias($grado, $backUpChange, $cursoActual);
      }

    }

        if (isset($_POST['NiuAlumno']) && isset($_POST['NiuProfesor']) && isset($_POST['FechaInicio']) && isset($_POST['FechaFin']) && isset($_POST['Horas']) && isset($_POST['gradoNewEstancia'])) {
         print_r('HE LLAMADO A LA FUNCION');
          //gradoToEstancia(0);
         print_r(newEstancia($_POST['NombreAlumno'],$_POST['ApellidoAlumno'],$_POST['NiuAlumno'],$_POST['NiuProfesor'],$_POST['FechaInicio'],$_POST['FechaFin'],$_POST['Horas'], $_POST['curso_estancia'], $_POST['gradoNewEstancia']));
         
        }
        if($errorConsulta == 'ERROR'){
          print_r("IF");
        }
       
      ?>
    <h1> <b>  <span id = "cursoActual"><?php print_r('Estades del curs ' . $cursoActual); ?></span><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" >Añadir nueva estancia</button></b> </h1> <br>
 <select id="gradosEstancias" class="selectpicker form-control"  name="NiuProfesor" required = "true">
            <?php
          
           // print_r("<option value=" . "Todos" . ">" .  "Todos" . "</option>");
           
           // print_r($gradoNewEstancia);
            foreach($gradosAll as $gr){
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
              if(isset($_POST['gradoNewEstancia'])){
                if($gr["codigo_grado"] == $_POST['gradoNewEstancia']){
                  print_r("<option selected value=" . $gr['codigo_grado'] . ">" .  $gr['nombre'] . "</option>");
                }
                else{
                  print_r("<option value=" . $gr['codigo_grado'] . ">" .  $gr['nombre'] . "</option>");
                }
              }else{
                print_r("<option value=" . $gr['codigo_grado'] . ">" .  $gr['nombre'] . "</option>");
              }
              
            }
           print_r("<br><br>");   
            ?>
           </select> <br>
           <?php //print_r($gradoNewEstancia); ?>
   <!-- Seleccione las estancias que desea mostrar:<br><br> &emsp;&emsp;&emsp;-->
  <div class = "changeBoxInicial">
    <b>Finalitzades  </b><input id="finalizadas" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked="false" checked data-off="NO">
    <!-- &emsp; PARA AÑADIR TABULACIÓN ENTRE Finalizadas y en curso -->
    <b>&emsp;&emsp;En curs </b><input id="encurso" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked data-off="NO"><br><br>
  </div>
  <div> 
 
  <button id="cursoAnterior" type="button" class="btn btn-link pull-left"><i class="fa fa-arrow-left"></i> Curs anterior </button>
  <button id="cursoSiguiente" type="button" class="btn btn-link pull-right">Curs següent <i class="fa fa-arrow-right"></i></button>
  
  <br><br>
</div>
<?php //PARA ACTUALIZAR LA TABLA CUANDO SE AÑADE NUEVA ESTANCIA Y/O SELECCIONES
   
  
     
    /*if(isset($_POST['grado'])){
       $grado = $_POST['grado'];
       if(isset($_POST['name1'])){
        $all = isset($_POST['name1']);
        $tableEstancias = ajaxTableEstancias($grado, $all);
       }else{
         $tableEstancias = ajaxTableEstancias($grado, NULL);
       }
      //print_r($grado);
    }
    else{
      $tableEstancias = ajaxTableEstancias(0, NULL);
    }*/
    ?>
  <div id="estancias" class="container ">  
        
  <table id="tableE" class="table text-center table-striped table-responsive table-sm">
    <thead class="table-bordered" >
      <tr>
        <?php 
        print_r($fases);
        if(sizeof($fases) > 0){
        print_r("<th> Nombre </th>");
          foreach ($fases as $paso){
              print_r("<th>" . $paso['nombre'] . "</th>");
          }
         print_r("<div id='hola'><th>Estancia</th></div>");
        }else{
          print_r("NO HAY FASES");
        }


        /*<th>Nombre</th>
        <th>Contacto Inicial</th>
        <th>1º Seg estudiante</th>
        <th>Contacto tutor</th>
        <th>2º Seg estudiante</th>
        <th>Solicitudes finales</th>
        <th>Final</th>
        */
        ?>

      </tr>
    </thead>
    <tbody id="bodyTable">
      <?php 
      if(sizeof($tableEstancias) > 0 ){
        print_r("OK");
      }
      foreach($tableEstancias as $tE){ ?>
      <tr>
        <?php //print_r($tE);// colorCasilla('2020-03-25') //for($i = 0; $i < count($tE); $i++){ ?>

        <td class="table-light"><?php print_r($tE[0])?></td>
        <?php print_r('<td class= ' . colorCasilla($tE[1]['fecha_final'],$tE[1]['id_estancia'],$tE[1]['id_paso'],$tE[1]['id'] ) . '>')?><?php  print_r($tE[1]['fecha_final'])?></td>
        <?php print_r('<td class= ' . colorCasilla($tE[2]['fecha_final'],$tE[2]['id_estancia'],$tE[2]['id_paso'],$tE[2]['id']  ) . '>')?><?php  print_r($tE[2]['fecha_final'])?></td>
         <?php print_r('<td class= ' . colorCasilla($tE[3]['fecha_final'],$tE[3]['id_estancia'],$tE[3]['id_paso'],$tE[3]['id']  ) . '>')?><?php  print_r($tE[3]['fecha_final'])?></td>
         <?php print_r('<td class= ' .colorCasilla($tE[4]['fecha_final'],$tE[4]['id_estancia'],$tE[4]['id_paso'],$tE[4]['id']  ) . '>')?><?php  print_r($tE[4]['fecha_final'])?></td>
         <?php print_r('<td class= ' . colorCasilla($tE[5]['fecha_final'],$tE[5]['id_estancia'],$tE[5]['id_paso'],$tE[5]['id'] ) . '>')?><?php  print_r($tE[5]['fecha_final'])?></td>
         <?php print_r('<td class= ' . colorCasilla($tE[6]['fecha_final'],$tE[6]['id_estancia'],$tE[6]['id_paso'],$tE[6]['id']  ) . '>')?><?php  print_r($tE[6]['fecha_final'])?></td>
        <td class="table-light"><a href="index.php?id=1"> <i class = "fa fa-external-link"></i></a></td>
      <?php //}?>
      </tr>
    <?php }?>
            
    </tbody>
  </table>
</div>

<div id="modalCharging" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     
      <div class="modal-body">
        <div class="container w-100 h-100">
    <div class="row align-items-center h-100">
      <div class="col-md-12">
        <div class="text-center">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div><br><br>
  Estamos procesando su petición, espere por favor..
</div>
      </div>
      
    </div>
  </div>
        
      </div>
     
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva estancia</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form id="formEstancias" action = "index.php?id=2" method="post">
          <div class = "container">
           <label><b> Nombre Alumno</b> </label><br>
           <input type="text" class="form-control" name="NombreAlumno" required="true" ></input><br>
           <label><b> Apellido Alumno</b> </label><br>
           <input type="text" class="form-control" name="ApellidoAlumno" required="true" ></input><br>
           <label><b> NIU ALUMNO</b> </label><br>
           <input type="text" class="form-control" name="NiuAlumno" required="true" ></input><br>
           <label><b> PROFESOR</b> </label><br>
           <!--<input for="profesores" class="form-control" name="NiuProfesor" required="true"></input><br>-->
           <select  class = "selectpicker form-control" id="profesores" name="NiuProfesor" required = "true">
    			  <?php
            foreach($profesoresNuevaEstancia as $profesor){
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
              print_r("<option value=" . $profesor['NIU'] . ">" .  $profesor['Nombre'] . " " .  $profesor['Apellidos'] . "</option>");
            }
           print_r("<br><br>");   
    			  ?>
    		   </select>
           <br>
           <label><b> Fecha Inicio</b> </label><br>
           <input type="date" class="form-control" name="FechaInicio" required="true" ></input><br>
           <label><b> Fecha Final</b> </label><br>
           <input type="date" class="form-control" name="FechaFin" required="true"></input><br>
           <label><b> Total horas</b> </label><br>
           <input type="textbox" class="form-control" name="Horas" required="true"></input><br>
           <label><b> Curso</b> </label><br>
           <select  class="form-control" id="curso" name="curso_estancia" required = "true">
            <?php
            foreach($cursos as $c){
              //print_r($c);
             // print_r("HOLA " .  $profesor['Nombre']);
              print_r("<option value=" . $c['curso_etapa'] . ">" .  $c['curso_etapa'] .  "</option>");
            }
           print_r("<br><br>");   
            ?></select><br><br>
             <input id="gradoNewEstancia" type="textbox" class="form-control" name="gradoNewEstancia" hidden ></input><br>
          <button id="reload"type="submit" class="form-control btn btn-primary">Crear</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>

 $('#formEstancias').submit(function(e){

   e.preventDefault();
    $('#exampleModal').modal('hide');
    $('#modalCharging').modal('show');
    var form = $(this);
    var url = form.attr('action');

    $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(response)
           {  


    var actual_year 
    actual_year =   $('#cursoActual').html();
    actual_year = actual_year.substring(17,24); 
    //alert(actual_year);
    let valor = $('#gradosEstancias').val();
   console.log($('#finalizadas').prop('checked'));
   var finalizadas = $('#finalizadas').prop('checked');
   var encurso =  $('#encurso').prop('checked');
    //console.log(valor);
   //alert(valor);
  if(!finalizadas && !encurso){
    alert()
    name2 = 5; 
     table.destroy();
     $('#bodyTable').replaceWith("");
     table = DataTableFunction();
  }else{
  if(finalizadas || encurso) {
    //var id = $(this).attr('id');
    var name2 = 0;//0
    if(finalizadas){
       var name2 = 1;//1 
      if(encurso)
      {
        //alert("TRUE");
        var name2 = 3; //3
      } 
     
    }
    else{
       if(finalizadas)
      {
       // alert("TRUE");
        var name2 = 3; 
      } 
    }
    //alert(id);
    
 
  }
  else{
    //alert("HE ");
    //var id = $(this).attr('id');
    var name2 = 1;
    if(finalizadas){
      if(encurso)
      {
        //alert("TRUE");
        var name2 = 0; 
      } 
      else{
        var name2 = 3;
      } 
    }else{
      if(finalizdas)
      {
        //alert("TRUE");
        var name2 = 1; 
      } 
      else{
        var name2 = 3;
      } 
    }
    
  
   }
  }


    var hola = $.post("index.php?id=2",
       {grado: valor, name1: name2, curso: actual_year, next: 0},
       function(response){
    //  console.log(response);
         table.destroy();//Destrozamos la tabla para volver a iniciarla una vez hemos cambiado los datos
         $('#estancias').replaceWith($('#estancias',response));
         table = DataTableFunction();//volvemos a crear la tabla ahora que hemos creado datos 
         console.log(response);
                /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );
              $('#estancias').replaceWith($('#estancias',response));
              setTimeout(function(){
                console.log(response); // show response from the php script.
                $('#modalCharging').modal('hide');
              }, 6000);

               
           }
         });

 });


 /////// SUBMIT ARRIBA ////


   //$('#estancias').replaceWith($('#estancias',response));  

 $('#cursoAnterior').click(function(){
    var actual_year 
    actual_year =   $('#cursoActual').html();
    actual_year = actual_year.substring(17,24); // 2019/20 -- Sólo coger eso.
    alert(actual_year);

 $.post("index.php?id=2",
       {curso: actual_year, next: -1},
       function(response){
    //  console.log(response);
         table.destroy();//Destrozamos la tabla para volver a iniciarla una vez hemos cambiado los datos
         alert($('#cursoActual',response).html());
         $('#cursoActual').replaceWith($('#cursoActual',response));
          $('#estancias').replaceWith($('#estancias',response));
         table = DataTableFunction();//volvemos a crear la tabla ahora que hemos creado datos 
         console.log(response);
                /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );




 }); 
 $('#cursoSiguiente').click(function(){
      var actual_year 
    actual_year =   $('#cursoActual').html();
    actual_year = actual_year.substring(17,24); // 2019/20 -- Sólo coger eso.
    alert(actual_year);

 $.post("index.php?id=2",
       {curso: actual_year, next: 1},
       function(response){
    //  console.log(response);
         table.destroy();//Destrozamos la tabla para volver a iniciarla una vez hemos cambiado los datos
         alert($('#cursoActual',response).html());
         $('#cursoActual').replaceWith($('#cursoActual',response));
          $('#estancias').replaceWith($('#estancias',response));
         table = DataTableFunction();//volvemos a crear la tabla ahora que hemos creado datos 
         console.log(response);
                /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );
 }); 
  
 $(document).ready(function(){
     var valor = $('#gradosEstancias').val();
     $('#gradoNewEstancia').val(valor);
  //  alert(valor);

 });
 $('#gradosEstancias').change(function(){
     var valor = $('#gradosEstancias').val();
      $('#gradoNewEstancia').val(valor);
 });
 

function DataTableFunction(){
     return $('#tableE').DataTable( {
       language: {
        url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
       }
    } );
}
var table =DataTableFunction();  

$('#gradosEstancias').change(function(){
   var actual_year 
    actual_year =   $('#cursoActual').html();
    actual_year = actual_year.substring(17,24); 
    alert(actual_year);
    let valor = $(this).val();
   console.log($('#finalizadas').prop('checked'));
   var finalizadas = $('#finalizadas').prop('checked');
   var encurso =  $('#encurso').prop('checked');
    //console.log(valor);
   //alert(valor);
  if(!finalizadas && !encurso){
    alert()
    name2 = 5; 
     table.destroy();
     $('#bodyTable').replaceWith("");
     table = DataTableFunction();
  }else{
  if(finalizadas || encurso) {
    //var id = $(this).attr('id');
    var name2 = 0;//0
    if(finalizadas){
       var name2 = 1;//1 
      if(encurso)
      {
        //alert("TRUE");
        var name2 = 3; //3
      } 
     
    }
    else{
       if(finalizadas)
      {
       // alert("TRUE");
        var name2 = 3; 
      } 
    }
    //alert(id);
    
 
  }
  else{
    //alert("HE ");
    //var id = $(this).attr('id');
    var name2 = 1;
    if(finalizadas){
      if(encurso)
      {
        //alert("TRUE");
        var name2 = 0; 
      } 
      else{
        var name2 = 3;
      } 
    }else{
      if(finalizdas)
      {
        //alert("TRUE");
        var name2 = 1; 
      } 
      else{
        var name2 = 3;
      } 
    }
    
  
   }
  }


    var hola = $.post("index.php?id=2",
       {grado: valor, name1: name2, curso: actual_year, next: 0},
       function(response){
    //  console.log(response);
         table.destroy();//Destrozamos la tabla para volver a iniciarla una vez hemos cambiado los datos
         $('#estancias').replaceWith($('#estancias',response));
         $('#profesores').replaceWith($('#profesores',response));
         table = DataTableFunction();//volvemos a crear la tabla ahora que hemos creado datos 
         console.log(response);
                /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );
  //  console.log(hola);

  });
/*$('#tableE').DataTable( {
    columnDefs: [
   { orderable: false, targets: -1 }
],
   language: {
    url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
   }


} );*/

 /* $('#exampleModal').on('click', '.btn-primary', function(){
    var value = $('#myPopupInput').val();
    $('#myMainPageInput').val(value);
    $('#myModal').modal('hide');
  });
*/
  
/*$(document).ready(reloadTable());
function reloadTable(){
  $('#estancias').load(' #estancias');
    function2();
}
function function2() {
 alert('message generated!');
} */
$('.changeBoxInicial input[type=checkbox]').change(function() { // while you're at it listen for change rather than click, this is in case something else modifies the checkbox
  
//CAMBIAR A SWITH CASE
   var actual_year 
    actual_year =   $('#cursoActual').html();
    actual_year = actual_year.substring(17,24); 
    alert(actual_year);
  var grado = $('#gradosEstancias').val();
  alert('HE ENTRADO');
  if(!$('#finalizadas').is(":checked")&&!$('#encurso').is(":checked")){
     table.destroy();
     $('#bodyTable').replaceWith("");
     table = DataTableFunction();
  }else{
  if($(this).is(":checked")) {
    var id = $(this).attr('id');
    var name2 = 0;//0
    if(id == 'finalizadas'){
       var name2 = 1;//1 
      if($('#encurso').is(":checked"))
      {
        //alert("TRUE");
        var name2 = 3; //3
      } 
     
    }
    else{
       if($('#finalizadas').is(":checked"))
      {
       // alert("TRUE");
        var name2 = 3; 
      } 
    }
    //alert(id);
   
    $.post("index.php?id=2",
       {name1: name2, grado: grado, curso: actual_year, next: 0},
       function(response){
        //console.log(response);
        table.destroy();
         $('#estancias').replaceWith($('#estancias',response));
         table = DataTableFunction();
         console.log(response);
        /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );
 
  }
  else{
    //alert("HE ");
    var id = $(this).attr('id');
    var name2 = 1;
    if(id == 'finalizadas'){
      if($('#encurso').is(":checked"))
      {
        //alert("TRUE");
        var name2 = 0; 
      } 
      else{
        var name2 = 3;
      } 
    }else{
      if($('#finalizadas').is(":checked"))
      {
        //alert("TRUE");
        var name2 = 1; 
      } 
      else{
        var name2 = 3;
      } 
    }
     alert(name2);
    $.post("index.php?id=2",
       {name1: name2, grado: grado, curso: actual_year, next: 0},
       function(response){
        //console.log(response);
        table.destroy();
         $('#estancias').replaceWith($('#estancias',response));
         table = DataTableFunction();
         console.log(response);
        /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );
  }
}

  /*var id = $(this).attr('id');
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
   }*/

});

  
</script>  
</body>
</html>
