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
        <li class="nav-item ">
          <a class="nav-link" href="index.php?id=2" onclick=hola()><h3>Estancias</h3></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php?id=3" onclick=hola()><h3>Configuración</h3></a>
        </li>
      </ul>
    </div>   
</nav>
<br>
<br>

  <div class = container>

    <div class=container>
     <?php
     $pasos = getPasos();
     $curso = "'" . '%' . '2019/20' . '%' . "'";
     $etapas = getEtapas($curso);
   //print_r("PHP OK");
   //print_r($_POST['Horas']);
      
        if (isset($_POST['NombreProfesor']) && isset($_POST['ApellidoProfesor']) && isset($_POST['NiuProfesor']) && isset($_POST['Sexo']) && isset($_POST['mail']) && isset($_POST['tel']) && isset($_POST['departamento']) ) {
          print_r($_POST['NombreProfesor']);
        newProfesor($_POST['NiuProfesor'],$_POST['NombreProfesor'],$_POST['ApellidoProfesor'],$_POST['Sexo'],$_POST['mail'],$_POST['tel'],$_POST['departamento']);
        }
        if (isset($_POST['NombreDep'])) {
          print_r($_POST['NombreDep']);
          newDepartamento($_POST['NombreDep'],$_POST['AcronimoDep'],$_POST['GradoDep'],$_POST['idDep']);
        }
        
      ?>
    <!--<h3> <b> ¿Desea añadir un nuevo profesor o departamento? <br><br> <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#exampleModal" >Añadir nuevo profesor</button></b> </h3> <br><br>
    <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#exampleModal" >Añadir nuevo departamento</button></b> </h3> <br><br>-->


 
   <!-- <b>Finalizadas </b><input id="finalizadas" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked="false" checked data-off="NO">
   &emsp; PARA AÑADIR TABULACIÓN ENTRE Finalizadas y en curso 
    <b>&emsp;&emsp;En curso </b><input id="encurso" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked data-off="NO"><br><br>-->
  </div>
</div>
 <div class="container">
  <h1> El curso está formado por las siguientes fases: </h1> <br><br>

<?php 
        $i=1;
         foreach($etapas as $etapa){?>
        
             <table id="tableE" class="table text-center table-striped table-responsive table-sm">
             <thead class="table-bordered">
             <tr>
             <th> Etapa </th>
             <th> Descripción </th>
             </tr> </thead><tbody
             <?php
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
          //print_r($etapa['nombre_etapa']);
          print_r("<br>");
           print_r("<h3> " . $i . ". " . $etapa['nombre_etapa'] . "<br>" . "</h3><br>");
           print_r("<h5> Esta fase está formada por las siguientes etapas:  </h5><br>"); 
           foreach($pasos as $paso){
            
              if($paso['id_etapa'] == $etapa['id_etapa']){
                  print_r("<tr>");
               print_r(" <td class='table-light'>" . $paso['nombre'] . "<br></td>"); 
               print_r(" <td class='table-light'>" . $paso['descripcion'] . "<br></td>");    
               print_r("</tr>");          
             }    
              
           }

           $i++;
            
          } //print_r($pasos);
          //$tableEstancias = ajaxTable();
    ?>
  
     <?php 
      
      //$profesoresNuevaEstancia = ajaxTableProfesores();
      //print_r($profesoresNuevaEstancia);
      /*foreach($etapas as $etapa){
         print_r('<tr>');
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
           print_r("<b>" . $etapa['nombre_etapa'] . "<br>" . "<b>");
           foreach($pasos as $paso){
               
              if($paso['id_etapa'] == $etapa['id_etapa']){?>
               <td class="table-light"> <?php print_r($paso['nombre'] . "<br>");?> </td><?php
              }    
           
           }
            print_r("<br");
           print_r("<br");
           //print_r($pasos);
           print_r('</tr>'); 
           
             //print_r("<option value=" . $profesor['NIU'] . ">" .  $profesor['Nombre'] . " " .  $profesor['Apellidos'] . "</option>");
      }*/?>
            
    </tbody>
  </table>
<br>
 <h4> Configurar fases y etapas:<br><br> 
     <div class="col text-center">
     
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" >Eliminar una fase</button></b> </h3> <br> 
    <div class="col text-center">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" >Eliminar una fase</button></b> </h3> <br><br>  
     <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" >Añadir nueva etapa</button> </h3> <br><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" >Eliminar una etapa</button></b> </h3> <br><br>  
   
      <br><br>  
      <button type="button" class="btn btn-danger " data-toggle="modal" data-target="#exampleModal" >¡Nuevo curso!</button> </h3> <br><br>
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
        <form id="formEstancias" action = "index.php?id=3" method="post">
          <div class = "container">
           <label><b> Nombre Profesor</b> </label><br>
           <input type="text" class="form-control" name="NombreProfesor" required="true" ></input><br>
           <label><b> Apellido Profesor</b> </label><br>
           <input type="text" class="form-control" name="ApellidoProfesor" required="true" ></input><br>
           <label><b> NIU Profesor</b> </label><br>
           <input type="text" class="form-control" name="NiuProfesor" required="true" ></input><br>
           <label><b> Sexo</b> </label><br>
           <select id="depAjax" class="selectpicker form-control" id="Sexo" name="Sexo" required = "true">
            <?php
            print_r("<option value=" . 'H' . ">" . 'H' . "</option>");
            print_r("<option value=" . 'F' . ">" . 'F' . "</option>");
            ?>
           </select><br>
           <label><b> E-mail</b> </label><br>
           <input type="text" class="form-control" name="mail" required="true"></input><br>
           <label><b> Telefono</b> </label><br>
           <input type="textbox" class="form-control" name="tel" required="true"></input><br>
           <label><b> Departamento</b> </label><br>
            <select id="depAjax" class="selectpicker form-control" id="departamento" name="departamento" required = "true">
            <?php
            //print_r("<option value=" . "Todos" . ">" .  "Todos" . "</option>");
            foreach($departamentosAll as $dep){
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
              print_r("<option value=" . $dep['acronimo'] . ">" .  $dep['acronimo'] . "</option>");
            }
           print_r("<br><br>");   
            ?>
          </select><br>
          <button id="reload"type="submit" class="form-control btn btn-primary">Añadir</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva estancia</h5>
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <form id="formEstancias" action = "index.php?id=3" method="post">
          <div class = "container">
           <label><b> Nombre Departamento</b> </label><br>
           <input type="text" class="form-control" name="NombreDep" required="true" ></input><br>
           <label><b> Acronimo</b> </label><br>
           <input type="text" class="form-control" name="AcronimoDep" required="true" ></input><br>
           <label><b> Grado</b> </label><br>
           <select id="depAjax" class="selectpicker form-control" id="GradoDep" name="GradoDep" required = "true">
            <?php
            $grados =  getGrados();
            //print_r("<option value=" . "Todos" . ">" .  "Todos" . "</option>");
            foreach($grados as $grado){
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
              print_r("<option value=" . $grado['nombre'] . ">" .  $grado['nombre']  . "</option>");
            }
           print_r("<br><br>");   
            ?>
           </select><br>
           <label><b> Identificador</b> </label><br>
           <input type="text" class="form-control" name="idDep" required="true" ></input><br>
          <button id="reload"type="submit" class="form-control btn btn-primary">Añadir</button>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<script>

function DataTableFunction(){
     return $('#tableProf').DataTable( {
       language: {
        url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
       }
    } );
}

var table =DataTableFunction();


$('#depAjax').change(function(){
   
    //alert();
    let valor = $(this).val();
    console.log(valor);
    let valor2 = $('#gradosAjax').val();
    if(valor2 != 'Todos' && valor == 'Todos'){

       //alert("hola");
     
       let valor2 = $('#gradosAjax').val();
    //console.log(valor);
   // alert(valor);

    $.post("index.php?id=3",
       {grado: valor2},
       function(response){
        console.log(response);
         table.destroy();//Destrozamos la tabla para volver a iniciarla una vez hemos cambiado los datos
         $('#estancias').replaceWith($('#estancias',response));
         table = DataTableFunction();//volvemos a crear la tabla ahora que hemos creado datos 
                /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );

    }else{

    $.post("index.php?id=3",
       {dep: valor},
       function(response){
        console.log(response);
        table.destroy(); // MIRAR FUNCION ABAJO QUE HACE LO MISMO
         $('#estancias').replaceWith($('#estancias',response));
         table = DataTableFunction();
        /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );
}
    //$('#tableProf').DataTable().ajax.reload()

  });

$('#gradosAjax').change(function(){
   
    //alert();
    let valor = $(this).val();
    //console.log(valor);
   // alert(valor);

    $.post("index.php?id=3",
       {grado: valor},
       function(response){
        console.log(response);
         table.destroy();//Destrozamos la tabla para volver a iniciarla una vez hemos cambiado los datos
         $('#estancias').replaceWith($('#estancias',response));
         table = DataTableFunction();//volvemos a crear la tabla ahora que hemos creado datos 
                /*var result = $('<div />').append(response).find('#estancias').html();
        alert(result);
        $('#estancias').html(response + '#estancias');     */ 
       }
    );


  });




$('.alert').alert()



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
  if(!$('#finalizadas').is(":checked")&&!$('#encurso').is(":checked")){
     $('#bodyTable').replaceWith("");
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
       {name1: name2},
       function(response){
        console.log(response);
         $('#estancias').replaceWith($('#estancias',response));
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
    
    $.post("index.php?id=2",
       {name1: name2},
       function(response){
        console.log(response);
         $('#estancias').replaceWith($('#estancias',response));
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
