<html>
<?php 

$variable='ALL';
if( isset($_GET['id'])){
	$variable = $_GET['id'];
}
require_once("/../model/conexion.php");
if(!isset($_POST['curso'])){

     		 $cursoActual = getCursoActual(NULL, 'actual');
     		 print_r($cursoActual);
  		  }else{

  		     $curso = $_POST['curso'];
   		    $next = $_POST['next'];
   		    $cursoActual = getCursoActual($curso, $next);
   		    print_r($cursoActual);
 		   }
switch ($variable) {
	case '1':
		require("/../view/newcurso.php");
		break;
	
	case '2':
		//if(isset($_POST['name'])){print_r($_POST['name']);}
	  	//require_once("/../model/conexion.php");
		if(empty($backUpChange)){
	     $backUpChange = NULL;

	   }
	       $gradoReturn = '';
     	
	   	$InfoAlumno = getAlumno('1459586');
		$numEstanciasRevisar = getNumEstancias();
		//getCurso('1999/00', 1);
		//$fechas = calcDates();
		//newEstancia(1459586,1455667,'2020-02-15','2020-05-13',300);
		getIdEstancia(1);
		getEtapas($cursoActual);
		$fases = getPasos($cursoActual);	
		$variable = 'ALL';
		if(isset($_POST['name'])){

			$variable = $_POST['name'];
		}
		//$tableEstancias = tableEstanciasNombres('ALL');
		$profesoresNuevaEstancia = getProfesores('Todos');
		$cursos = getCursos();
		//print_r($profesoresNuevaEstancia);
		require("/../view/estanciastodas.php");
		break;
	case '3':
		//if(isset($_POST['name'])){print_r($_POST['name']);}
		  //	require_once("/../model/conexion.php");
		   	$InfoAlumno = getAlumno('1459586');
			$numEstanciasRevisar = getNumEstancias();
			//$fechas = calcDates();
			//newEstancia(1459586,1455667,'2020-02-15','2020-05-13',300);
			getIdEstancia(1);
			getEtapas($cursoActual);
			$departamentos = getDepartamentos();
			$fases = getPasos($cursoActual);	
			$variable = 'ALL';
			if(isset($_POST['name'])){

				$variable = $_POST['name'];
			}

			//$tableEstancias = tableEstanciasNombres('ALL');
			//$profesoresNuevaEstancia = getProfesores();
			$cursos = getCursos();
			$curso = $cursoActual; 
			getGrados();
			//newProfesor();
			//getDepartamentosProfesor(1111111);
			//getProfesores();
		  require("/../view/configuracion.php");
		break;
	case 'p':
		  //require_once("/../model/conexion.php");
		if(empty($backUpChange)){
	     $backUpChange = NULL;

	   }
	       $gradoReturn = '';
     	
	   	$InfoAlumno = getAlumno('1459586');
		$numEstanciasRevisar = getNumEstancias();
		//getCurso('1999/00', 1);
		//$fechas = calcDates();
		//newEstancia(1459586,1455667,'2020-02-15','2020-05-13',300);
		getIdEstancia(1);
		getEtapas($cursoActual);
		$fases = getPasos($cursoActual);	
		$variable = 'ALL';
		if(isset($_POST['name'])){

			$variable = $_POST['name'];
		}
		//$tableEstancias = tableEstanciasNombres('ALL');
		$profesoresNuevaEstancia = getProfesores('Todos');
		$cursos = getCursos();
		  require("/../view/procesando.php");
	default:
		//require_once("/../model/conexion.php");
		$InfoAlumno = getAlumno('1459586');
		$numEstanciasRevisar = getNumEstancias();
		//$fechas = calcDates();
		//newEstancia(1455555,1455667,'2020-02-15','2020-05-23',300);
		getIdEstancia(1);
		getEtapas($cursoActual);
		getPasos($cursoActual);	
		$tableEstancias = tableEstanciasNombres(0,123, $cursoActual);
		$estanciasRevision = estanciasARevisar();
		//$profesoresNuevaEstancia = getProfesores();
		$cursos = getCursos();
		//colorCasilla()
		//$estanciasRevision = estanciasARevisar(NULL, NULL, NULL);
		//$estanciasRevision = estanciasARevisar();
		//tableEstanciasFechas();
		//print_r($numEstanciasRevisar);
		//$Porcentaje = getSeguimientoAlumno('1459586');
		//$estanciaInfo = getEstancia('1459586');
		//print_r($estanciaInfo);
		//require_once("/../view/estanciastodas.php");
		require_once("/../view/eipe.php"); 

		break;
}

 /* if($_GET['id'] == 3){ // CONFIGURACIÓN
  	if(isset($_POST['name'])){print_r($_POST['name']);}
  	require_once("/../model/conexion.php");
   	$InfoAlumno = getAlumno('1459586');
	$numEstanciasRevisar = getNumEstancias();
	//$fechas = calcDates();
	//newEstancia(1459586,1455667,'2020-02-15','2020-05-13',300);
	getIdEstancia(1);
	getEtapas(1);
	$fases = getPasos();	
	$variable = 'ALL';
	if(isset($_POST['name'])){

		$variable = $_POST['name'];
	}
	//$tableEstancias = tableEstanciasNombres('ALL');
	//$profesoresNuevaEstancia = getProfesores();
	$cursos = getCursos();
	getGrados();
	//newProfesor();
	//getDepartamentosProfesor(1111111);
	//getProfesores();
  require("/../view/configuracion.php");
  }
  else{
  	if(isset($_POST['name'])){print_r($_POST['name']);}
  	require_once("/../model/conexion.php");
   	$InfoAlumno = getAlumno('1459586');
	$numEstanciasRevisar = getNumEstancias();
	//$fechas = calcDates();
	//newEstancia(1459586,1455667,'2020-02-15','2020-05-13',300);
	getIdEstancia(1);
	getEtapas(1);
	$fases = getPasos();	
	$variable = 'ALL';
	if(isset($_POST['name'])){

		$variable = $_POST['name'];
	}
	//$tableEstancias = tableEstanciasNombres('ALL');
	$profesoresNuevaEstancia = getProfesores('Todos');
	$cursos = getCursos();
	//print_r($profesoresNuevaEstancia);
	require("/../view/estanciastodas.php");
  }
}
else{
require_once("/../model/conexion.php");
$InfoAlumno = getAlumno('1459586');
$numEstanciasRevisar = getNumEstancias();
//$fechas = calcDates();
//newEstancia(1455555,1455667,'2020-02-15','2020-05-23',300);
getIdEstancia(1);
getEtapas(1);
getPasos();	
$tableEstancias = tableEstanciasNombres('ALL');
$estanciasRevision = estanciasARevisar();
//$profesoresNuevaEstancia = getProfesores();
$cursos = getCursos();
//colorCasilla()
//$estanciasRevision = estanciasARevisar(NULL, NULL, NULL);
//$estanciasRevision = estanciasARevisar();
//tableEstanciasFechas();
//print_r($numEstanciasRevisar);
//$Porcentaje = getSeguimientoAlumno('1459586');
//$estanciaInfo = getEstancia('1459586');
//print_r($estanciaInfo);
//require_once("/../view/estanciastodas.php");
require_once("/../view/eipe.php"); 
*/
?>

</html>
