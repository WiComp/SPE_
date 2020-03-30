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


<script src="script.js"></script>


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
   //print_r("PHP OK");
   //print_r($_POST['Horas']);
      
        if (isset($_POST['NombreProfesor']) && isset($_POST['ApellidoProfesor']) && isset($_POST['NiuProfesor']) && isset($_POST['Sexo']) && isset($_POST['mail']) && isset($_POST['tel']) && isset($_POST['departamento']) ) {
          print_r($_POST['NombreProfesor']);
        newProfesor($_POST['NiuProfesor'],$_POST['NombreProfesor'],$_POST['ApellidoProfesor'],$_POST['Sexo'],$_POST['mail'],$_POST['tel'],$_POST['departamento'], $curso);
        }
        if (isset($_POST['NombreDep'])) {
          print_r($_POST['NombreDep']);
          newDepartamento($_POST['NombreDep'],$_POST['AcronimoDep'],$_POST['GradoDep'],$_POST['idDep']);
        }
        
      ?>
    <!--<h3> <b> ¿Desea añadir un nuevo profesor o departamento? <br><br> <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#exampleModal" >Añadir nuevo profesor</button></b> </h3> <br><br>
    <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#exampleModal" >Añadir nuevo departamento</button></b> </h3> <br><br>-->

<div class="card bg-light">
    <div class="card-body"><h1 class='text-center'><b>Profesores</b> &emsp;&emsp;&emsp;  <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal" >Nou profesor</button> </h1></div>
  </div>
   <br
       <div class = "changeBoxInicial">
        <!-- PUESTOS A HIDDEN PORQUE NO SON NECESARIOS -->
        <label hidden > Grado: </label>
         <select hidden id="gradosAjax" class="selectpicker form-control" id="profesores" name="NiuProfesor" required = "true">
            <?php
            $gradosAll =  getGrados();
            //var_dump($gradosAll);
            print_r("<option value=" . "Todos" . ">" .  "Todos" . "</option>");
            foreach($gradosAll as $gr){
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
              print_r("<option value=" . $gr['codigo_grado'] . ">" .  $gr['nombre'] . "</option>");
            }
           print_r("<br><br>");   
            ?>
           </select> <br>
          <label for="depAjax">Departamento: </label>
            <select id="depAjax" class="selectpicker form-control" id="profesores" name="NiuProfesor" required = "true">
            <?php
            $departamentosAll =  getDepartamentos();
            print_r("<option value=" . "Todos" . ">" .  "Todos" . "</option>");
            foreach($departamentosAll as $dep){
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
              print_r("<option value=" . $dep['acronimo'] . ">" .  $dep['acronimo'] . "</option>");
            }
           print_r("<br><br>");   
            ?>
           </select> <br>

   <!-- <b>Finalizadas </b><input id="finalizadas" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked="false" checked data-off="NO">
   &emsp; PARA AÑADIR TABULACIÓN ENTRE Finalizadas y en curso 
    <b>&emsp;&emsp;En curso </b><input id="encurso" type="checkbox" data-toggle="toggle" data-size="xs" data-on="SI" checked data-off="NO"><br><br>-->
  </div>
</div>
<?php 
      //$tableEstancias = ajaxTable();
    ?>
  <div id="estancias" class="container ">           
  <table id="tableProf" class="table  text-center table-striped table-responsive table-sm">
    <thead class="table-bordered" >
      <tr>
        <?php 
       

        print_r("<th> Nombre </th>");
        print_r("<th> Departamento </th>");
        print_r("<th> Alumnos asignados");
        print_r("<th> Máximo alumnos");
        print_r("<th hidden> Editar")
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
      
      $profesoresNuevaEstancia = ajaxTableProfesores();
      //print_r($profesoresNuevaEstancia);
      foreach($profesoresNuevaEstancia as $profesor){
         print_r('<tr>');
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
            ?><td class="table-light"><?php print_r($profesor['Nombre'] . " ". $profesor['Apellidos'] ."</td>");
            $departamento = getDepartamentosProfesor($profesor['NIU']);
            //print_r($departamento);
            $numAlumnos = getAlumnosAsignadosProfesor($profesor['NIU']);
            //print_r($numAlumnos);
            //print_r($departamento[0]['Departamento'])?>
            <td class="table-light"><?php print_r($departamento['Departamento'] .  "</td>");?>
            <td class="table-light"><?php print_r($numAlumnos['numAlumnos'] .  "</td>");?>
            
            <td class="table-light"><?php $maxalumnos = getMaxEstProfesor($profesor['NIU']); print_r($maxalumnos['num_max_alum'] .  "</td>");?>
            <td class="table-light"><?php  print_r('<button class="btn btn-link" data-toggle="modal" data-target="#myModal"><i class="fa fa-edit"></i></button>' .  "</td>");

           print_r('</tr>'); 
             //print_r("<option value=" . $profesor['NIU'] . ">" .  $profesor['Nombre'] . " " .  $profesor['Apellidos'] . "</option>");
      }?>
            
    </tbody>
  </table>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title text-center" id="myModalLabel">Edit</h4>
                <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">×   </span><span class="sr-only">Close</span>

                </button>
                 

            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<br><br>

<div class="card bg-light">
    <div class="card-body"><h1 class='text-center'><b>Departamentos</b> &emsp;&emsp;&emsp; <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal1" >Nou departament</button>  </h1></div>
  </div>
<br>
  <table id="tableDep" class="table  text-center table-striped table-responsive table-sm">
    <thead class="table-bordered" >
      <tr>
        <?php 
       

        print_r("<th> Nombre </th>");
        print_r("<th> Iniciales </th>");
        print_r("<th> Total estudiantes ");
        
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
      
      //$profesoresNuevaEstancia = ajaxTableProfesores();
      //print_r($profesoresNuevaEstancia);
      $i = 0; 
      foreach($departamentos as $dep){
         print_r('<tr>');
             // print_r($profesor);
             // print_r("HOLA " .  $profesor['Nombre']);
            ?><td data-editable="false" class="table-light"><?php print_r($dep['nombre_departamento'] ."</td>");
           
            //print_r($departamento);
            
            //print_r($numAlumnos);
            //print_r($departamento[0]['Departamento'])?>
            <td data-editable="false" class="table-light"><?php print_r($dep['acronimo'] .  "</td>");?>
            <td id=<?php print_r('\'' . 'change'. $i . '\'')?> class="uneditable table-light"><?php print_r($numAlumnos['numAlumnos'] . "</td>");
            
           $i++;
           print_r('</tr>'); 
             //print_r("<option value=" . $profesor['NIU'] . ">" .  $profesor['Nombre'] . " " .  $profesor['Apellidos'] . "</option>");
      }?>
            
    </tbody>
  </table>

</div><br>
 <h4> ¿Qué desea añadir? <br><br> <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#exampleModal" >Añadir nuevo profesor</button> </h3> <br><br>
    <button type="button" class="btn btn-primary pull-left" data-toggle="modal" data-target="#exampleModal1" >Añadir nuevo departamento</button></b> </h3> <br><br>
    <a href="index.php?id=1" class="btn btn-primary pull-left" >Añadir nuevo curso</a>
   

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

$(".btn[data-target='#myModal']").click(function() {
       var columnHeadings = $("thead th").map(function() {
                 return $(this).text();
              }).get();
       columnHeadings.pop();
       var columnValues = $(this).parent().siblings().map(function() {
                 return $(this).text();
       }).get();
  var modalBody = $('<div id="modalContent"></div>');
  var modalForm = $('<form role="form" name="modalForm" action="putYourPHPActionHere.php" method="post"></form>');
  var i = 0; 
  $.each(columnHeadings, function(i, columnHeader) {
       var formGroup = $('<div class="form-group"></div>');
       formGroup.append('<label for="'+columnHeader+'">'+ '<b>' +columnHeader+'<b></label>');

       formGroup.append('<input class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'" value="'+columnValues[i]+'" />'); 
       if(i < 4){
          modalForm.append(formGroup);
       }
     

  });
  modalBody.append(modalForm);
  $('.modal-body').html(modalBody);
});
$('.modal-footer .btn-primary').click(function() {
   $('form[name="modalForm"]').submit();
});





$('#tableDep').editableTableWidget();

$('#tableDep td.uneditable').on('change', function(evt, newValue) {
    var column =  $(this).index();
    var row = $(this).parent().index();
     var currentRow = $(this).closest("tr");
  //  alert(row);
    //alert(column);
    var find = (row*2) + 4;
       
   // alert($(this).find("tbody tr").eq(find).children());
    $id = '#change' + row; 
   // alert($id);
    $($id).html(newValue + ' ' +  '<i class="fa fa-edit"></i>');
    //alert($('#tableDep').eq(column).html('hola'));
 //  $('#tableDep td.uneditable').html(newValue + '<i class="fa fa-edit"></i>');
  return value;
});



function DataTableFunction(){
     return $('#tableProf').DataTable( {
       language: {
        url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
       }
    } );
}
function DataTableFunction1(){
     return $('#tableDep').DataTable( {
       language: {
        url: 'http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
       }
    } );
}

var table =DataTableFunction();
var table1 = DataTableFunction1();


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
       // console.log(response);
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
         $('#tableProf').replaceWith($('#tableProf',response));
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
   //alert(valor);

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


  
</script>  
</body>
</html>
