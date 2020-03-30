<?php
	
/* PARAMETROS DE LA BASE DE DATOS*/
function ConBD(){
	$usuario = "prueba"; //usuario BD
	$contrasena = "prueba123"; //contraseña BD
	$servidor = "localhost"; // server de BD
	$basededatos = "eipe"; //Nombre de BD

	//Conexión al server de BD
	$conexion = mysqli_connect( $servidor, $usuario, $contrasena) or die ("No se ha podido conectar al servidor de Base de datos");

	//De todas las que hay, seleccionamos la que queremos
	$db = mysqli_select_db( $conexion, $basededatos);

	return $conexion;
}

function getAlumno($NIU){
	$conexion = conBD();
	//Generamos la consulta
	$consulta = "SELECT * FROM usuario WHERE NIU = $NIU";
	// Añadimos que la los datos extraídos sean en UTF-8
	$conexion->set_charset('utf8');
	//Realizamos la consulta
	$resultado = mysqli_query( $conexion, $consulta);
	$data = array();
	while ($row =$resultado->fetch_assoc()) {
	    $data[] = $row;
	}
	return $data;	//return mysqli_fetch_array($resultado);
}
function getSeguimientoAlumno($NIU){
	$conexion = conBD();
	$consulta = "SELECT Porcentaje
				 FROM Etapas
				 WHERE id_etapa =
				 (SELECT MAX(id_etapa) id_etapa
				 FROM seguimiento_estadas 
				 WHERE id_estancia = (SELECT id_estancia FROM estancia WHERE Estudiante = $NIU)) ";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	return mysqli_fetch_array($resultado);
}
function getEstancia($NIU)
{
	$conexion = conBD(); 
	$consulta = "SELECT * FROM estancia WHERE Estudiante = $NIU";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	return mysqli_fetch_array($resultado);	
}
function getNumEstancias()
{
	$conexion = conBD(); 
	$consulta = "SELECT COUNT(id_estancia) as total FROM estancia WHERE nota_final is NULL";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	$data = mysqli_fetch_assoc($resultado);
	return($data['total']);
	//return mysqli_fetch_assoc($resultado);	
}

function calcDates($id_estancia, $dateIni, $dateFin, $cursoActual)
{
	//$dateF = new date($dateFin);
	//$dateI = new date($dateIni);
	function calcFechaFinal($porcentaje, $dateI, $dateF){
		//var_dump($dateI);
		$dataFTS = strtotime($dateF); 
		$dataITS = strtotime($dateI);
		$restafechas = $dataFTS - $dataITS;
		//print_r($restafechas);
		if($porcentaje != '100'){
			$fecha = $restafechas*($porcentaje/100) + $dataITS;
		//print_r($fecha);
			return date('Y-m-d',$fecha); 
		}
		else{

			$fecha = $dateF;
			return $fecha;
		}
		//print_r($fecha);
		//return $dateI;
		
	}
	
	$conexion = conBD(); 
	//SACAR TIMESTAMP
	//$consulta = "SELECT UNIX_TIMESTAMP(fecha_inicio) as fecha_ini, UNIX_TIMESTAMP(fecha_fin) as fecha_fin FROM estancia";
	//$consulta = "SELECT fecha_inicio as fecha_ini, UNIX_TIMESTAMP(fecha_fin) as fecha_fin FROM estancia";
	//PORCENTAJES

	$curso_prueba = $cursoActual;
	
	//$curso_prueba = "'" . '%' . '2019/20' . '%' . "'";
	print_r("ES CURSO: " . $curso_prueba);
	//print_r($curso_prueba);
	$pasosToInsert = getEtapas($curso_prueba);
	$pasos = getPasos($cursoActual);
	//print_r($pasos);
	$id_estancia = getIdEstancia(NULL);
	//foreach($pasosToInsert as $etapa){
		//$done = false; 
		foreach($pasos as $paso){

		//CALCULAR FECHA FINAL
			//print_r($paso['porcentaje']);
			$fecha = calcFechafinal($paso['porcentaje'], $dateIni, $dateFin);
			$fechaToInsert = '\'' . $fecha . '\'';
			//print_r($fecha);
			//print_r("FECHA TO INSERT");
			$id_paso = $paso['id_paso'];
			//for($i = 0; $i < $etapa['pasos']; $i++){

				//$porcentaje = $pasos[]
				//$fecha = calcFechafinal(,$dateIni, $dateFin);
				$consulta = "INSERT INTO seguimiento_pasos(id_paso,fecha_final, id_estancia) values($id_paso,$fechaToInsert,$id_estancia)";
				$conexion->set_charset('utf8');
				$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos - calcDates");	
		//calcFechafinal(,$dateIni, $dateFin);
				//break;
		}
		//$done = true; 
	//}//
	
	//print_r($date['porcentaje'] . $date['pasos']);
		//$consulta = "INSERT INTO pasos FROM etapas WHERE curso_etapa like $curso_prueba";
		//INSERT INTO seguimiento_pasos`(`id_paso`, `finalizado`, `fecha_final`, `fecha_real`, `id_estancia`, `id`, `fecha_pas1`, `fecha_pas2`, `fecha_pas3`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8],[value-9])
	/*$restaFechas = $data['fecha_fin'] - $data['fecha_ini'];
	//5%
	//$restaFechas*(5/100)) + $data['fecha_ini']);
	//30%
	//print_r(($restaFechas*(30/100)) + $data['fecha_ini']);
	//50%
	//print_r(($restaFechas*(50/100)) + $data['fecha_ini']);
	//60%
	//print_r(($restaFechas*(60/100)) + $data['fecha_ini']);
	//90%
	print_r(($restaFechas*(90/100)) + $data['fecha_ini']);
	//100%
	print_r($data['fecha_fin']);
	//return($data['']);
	//return mysqli_fetch_assoc($resultado);	*/
}

function newEstancia($nombre, $apellidos, $alumno, $profesor, $fechaIni, $fechaFin, $horas, $curso, $grado){

	print_r($grado);
	$conexion = conBD(); 
	$fechaIFormat = date("Y-m-d", strtotime($fechaIni));
	$fechaI = '\'' . date("Y-m-d", strtotime($fechaIni)) . '\'';
	$fechaF = '\'' . date("Y-m-d", strtotime($fechaFin)) . '\'';
	$curso = '\'' . $curso . '\'';
	//print_r($fechaI);
	//print_r($alumno)
	$OK = newAlumno($alumno, $nombre, $apellidos, getIdEstancia(NULL),$grado);
	//SI ALUMNO NUEVO HA FUNCIONAD CORRECTAMENTE;
	if($OK){
		//print_r("OK");
		$consulta = "INSERT INTO estancia(NIU_alumno, NIU_profesor, curso, fecha_inicio, fecha_fin, id_tutorempresa, id_empresa, nota_final, horas) VALUES($alumno, $profesor,$curso, $fechaI, $fechaF, NULL, NULL, NULL, $horas)";
		$conexion->set_charset('utf8');
		//$consulta = "SELECT fecha_inicio as fecha_ini, UNIX_TIMESTAMP(fecha_fin) as fecha_fin FROM estancia";
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos - estancia");
		//$data = mysqli_fetch_assoc($resultado);
		CalcDates(getIdEstancia(NULL),$fechaIni,$fechaFin,$curso);
		//header("Refresh:0; url=index.php?id=2");

	}

	//echo "<meta http-equiv='refresh' content='0'>";

}
function getIdEstancia($idEstancia){
	$conexion = conBD();
	$consulta = "SELECT MAX(id_estancia) as id_est FROM estancia";
	$conexion->set_charset('utf8');
	//$consulta = "SELECT fecha_inicio as fecha_ini, UNIX_TIMESTAMP(fecha_fin) as fecha_fin FROM estancia";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos - idEstancia");
	$data = mysqli_fetch_assoc($resultado);
	if(is_null($data['id_est'])){
		return 1;
	}//{print_r($data['id_est']);
	return $data['id_est'];
}

function newEtapa(){

}
function newPasos(){

}
function getPasos($curso){

	$conexion = conBD();
	$curso_prueba = $curso;
	$etapasToConsult = getEtapas($curso_prueba);

	foreach($etapasToConsult as $et){
		$dataFinal = "";
		$idEtapa = $et['id_etapa'];
		$consulta = "SELECT * FROM pasos WHERE id_etapa = $idEtapa";
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos - pasos");
		while ($row =$resultado->fetch_assoc()) {
	  
	   	 $data[] = $row;
	   	 	//print_r($data['porcentaje']);

		}
		$dataFinal = $data;
		
	}

	return $dataFinal; 
	/*foreach($dataFinal as $DF){
		print_r($DF['id_etapa'] . ' ' . $DF['porcentaje'] . ' ');
	}*/
	
		/*
	$consulta = "SELECT * FROM etapas WHERE curso_etapa like $curso AND  ";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	while ($row =$resultado->fetch_assoc()) {
	  
	    $data[] = $row;

	}
	print_r($data);*/
}
function getEtapas($curso){

	$conexion = conBD();
	print_r(strlen($curso));
	
	if(strlen($curso) == 7){
		print_r("OK good");
		$curso = '\'' . $curso . '\'';
	}

	
	

	//$curso_prueba = "'" . '%' . '2019/20' . '%' . "'";
	//print_r($curso_prueba);
	

	$consulta = "SELECT id_etapa, pasos, nombre_etapa FROM etapas WHERE curso_etapa like $curso ";
	$conexion->set_charset('utf8');
	//$consulta = "SELECT fecha_inicio as fecha_ini, UNIX_TIMESTAMP(fecha_fin) as fecha_fin FROM estancia";
	$resultado = mysqli_query( $conexion, $consulta );
	print_r(mysqli_error($conexion));
	// or die ( "Algo ha ido mal en la consulta a la base de datos - etapas");
	//$data = mysqli_fetch_assoc($resultado);
	//print_r($data);
	$data = array();
	while ($row =$resultado->fetch_assoc()) {
	  
	    $data[] = $row;

	}
	//print_r($data);

	foreach($data as $date){

		//print_r($date['id_etapa'] .' ' . $date['pasos'] . '<br>');
		
	}
	return $data;
	//print_r($data['id_etapa'] . '  '.  $data['pasos'] );

}

function tableEstanciasIDS($type, $curso)
{
	$data = array();
	$conexion = conBD();
	$curso = '\'' . $curso . '\'';
	//print_r($type);
	switch ($type) {
		case '1': // finalizadas
			$consulta = "SELECT DISTINCT id_estancia FROM estancia WHERE finalizada = 1  and curso = $curso";
			break;
		case '0': // en curso
			$consulta = "SELECT DISTINCT id_estancia FROM estancia WHERE finalizada = 0 ";
			break;
		case '4' : // NIGUNA
			$consulta = "SELECT id_estancia FROM id_estancia WHERE finalizada = 2"; 
		default: // todas
			$consulta = "SELECT DISTINCT id_estancia FROM estancia";
			break;
	}
	//$consulta = "SELECT DISTINCT id_estancia FROM estancia";
	$conexion->set_charset('utf8');	
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos - estanciasIds");
	while ($row =$resultado->fetch_assoc()) {
	  
	  $data[] = $row;
	  //print_r($data);

	}
	//$dataFinal = $data;
	//print_r($data);
	return $data;	
	/*foreach( $data as $dt){
		print_r($dt['id_estancia']);
		$dtId= $dt['id_estancia'];
		$consulta = "SELECT fecha_final FROM seguimiento_pasos WHERE id_estancia = $dtId";
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
			}*/
}
function tableEstanciasNombres($type, $grado, $curso){
	$dataTable = tableEstanciasIDS($type, $curso);
	$fechasFinales = array();
	//print_r($curso);
	//$grado = '\'' . $grado . '\'';	
	function estanciaFromYear($idEst, $curso){
		$conexion = conBD();
		$consulta = "SELECT curso FROM estancia WHERE id_estancia = $idEst";
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos - estaancias Nombres");
		$data = mysqli_fetch_assoc($resultado);
	//print_r($data['grado_departamento']);
	//print_r($grado);
	//print_r($data);
		if($data['curso'] == $curso){
			//print_r("OK");
			return true; 
		}
	//print_r('KO');
		return false;
	}
	function tableEstanciasFechas($idEst, $curso){
		//$data = array();
		$conexion = conBD();
		$consulta = "SELECT fecha_final, id_estancia, id_paso, id FROM seguimiento_pasos WHERE id_estancia = $idEst";
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos - estancais fechas");
		while ($row =$resultado->fetch_assoc()) {
	  		if(estanciaFromYear($idEst,$curso)){
	  				$data[] = $row;
	  		}
	 	
	  	//print_r("HE ENTRADO");

		}
		if(!empty($data)){
		$dataFinal = $data;
		return $dataFinal;
		}

	}
	//print_r($dataTable);
	foreach($dataTable as $data){
		$conexion = conBD();
		$idEst = $data['id_estancia'];
		$consulta = "SELECT Nombre, Apellidos FROM Usuario WHERE NIU = (SELECT NIU_alumno FROM  alumno WHERE grado = $grado AND NIU_alumno =(SELECT NIU_alumno FROM estancia WHERE id_estancia = $idEst) ) ";
		//print_r($consulta);
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos estancias fechas 2");
		$dt = mysqli_fetch_assoc($resultado);
		if(!empty($dt)){
		$fechasEstancia = tableEstanciasFechas($idEst, $curso);
		//print_r($dt);
		$NombreApellidos = $dt['Nombre'] . ' '. $dt['Apellidos'];
			if(!is_null($fechasEstancia)){
				
				array_unshift($fechasEstancia,$NombreApellidos);
				array_push($fechasFinales, $fechasEstancia);

			}
			
		}
		
		//print_r($fechasEstancia);

		
	}

	//print_r($fechasFinales);
	return $fechasFinales;
}

function colorCasilla($fecha, $id_estancia, $paso, $id){
	//FUNCTION CURRENT TIMESTAMP: time();
	
	$date = strtotime($fecha);
	$dateActual = strtotime('2020-04-22');
	//	print_r($dateActual . '<br>');
	if($dateActual < $date){
		$dateActual = strtotime('+5 days', $dateActual);
		$fechaComparacion = strtotime('+4 days', $date); 
		$fechaComparacion2 = strtotime('-5 days', $fechaComparacion);
		//print_r($fechaComparacion);
		//print_r()
		if($dateActual <= $fechaComparacion && $fechaComparacion2 < $dateActual ){
			return '\'' . 'table-warning' .'\'' ;
		}
		else{

			return '\'' . 'table-light' .'\'' ;
		}
	}
	else{
		//CONSULTA DEL FECHA FINAL REAL
		$conexion = conBD();
		$consulta = "SELECT fecha_real FROM seguimiento_pasos WHERE id_estancia = $id_estancia and id_paso = $paso and id = $id";
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos color casilla");
		$dt = mysqli_fetch_assoc($resultado);
		//var_dump($dt);
		if($dt['fecha_real'] == NULL){
			//estanciasARevisar($id_estancia, $paso, $fecha);
		return '\'' . 'table-danger' .'\'' ;
		}
		else{
			return '\'' . 'table-success' .'\'' ;
		}
	}

	//$date = strtotime($fecha);
	//print_r(time());
}

function estanciasARevisar()
{
		/*$array = array();
		$conexion = conBD();
		$consulta = "SELECT Nombre, Apellidos, NIU FROM Usuario WHERE NIU = (SELECT NIU_alumno FROM estancia WHERE id_estancia = $id_estancia)";
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
		$dt = mysqli_fetch_assoc($resultado);
		$NIU = $dt['NIU'];
		$array[$NIU] = [$id_estancia, $fechaFinal, $paso]; 
		array_push($array,$array[$NIU]);
		//array_push()
		//array_push($array, $dt, $id_estancia, $paso, $fechaFinal);
		return $array;*/
		
		$arrayFinal = array();
		$conexion = conBD();
		
		
		$consulta = "SELECT id_estancia, GROUP_CONCAT( id_paso, ' ', fecha_final ORDER BY id_paso SEPARATOR'/' ) AS estancias
		FROM seguimiento_pasos
		WHERE fecha_real is NULL and fecha_final < '2020-04-22'
		GROUP BY id_estancia";
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos a revisar");
		//$dt = mysqli_fetch_assoc($resultado);
		//print_r($dt);
		$data = array();
		while ($row =$resultado->fetch_assoc()) {
		    $data[] = $row;
		}
		//print_r($data);
		foreach($data as $dt){
			$array = array();
			$id_est = $dt['id_estancia'];
			//print_r($id_est);
			$consulta = "SELECT Nombre, Apellidos, NIU FROM Usuario WHERE NIU = (SELECT NIU_Alumno FROM estancia WHERE id_estancia = $id_est)";
			$conexion->set_charset('utf8');	
			$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos  a revisar 2");
			$dt1 = mysqli_fetch_assoc($resultado);
			$NIU = $dt1['NIU'];
			//print_r($dt1);
			$InfoAlumno = getAlumno($NIU);
		
			//$hola = extract($);
			//print_r($InfoAlumno);
			$NombreAlumno  = $InfoAlumno[0]['Nombre'] . ' ' . $InfoAlumno[0]['Apellidos'];
			//print_r($NombreAlumno);
			$array['NIU'] = $NIU;
			$array['Nombre'] = $NombreAlumno;
			$arrayFuncion = dividirArrayRevision($dt['estancias']);
			//print_r($arrayFuncion);
				foreach($arrayFuncion as $a){
					//print_r('<br>');
					//print_r($a);
					array_push($array, $a);
					
				}//print_r($array);
							//array_push($array, $arrayFuncion);
			array_push($arrayFinal, $array);
			//print_r($arrayFinal);
			
			//break;//array_push($array, dividirArrayRevision($dt['estancias']));
			
		
		}
			
		//print_r($arrayFinal);
		return $arrayFinal;
}
function dividirArrayRevision($array){

	
	$array_prueba = $array;//"1 2020-02-19/2.1 2020-03-12/2.2 2020-03-30/2.3 2020-04-07/3.1 2020-05-04/3.2 2020-05-13";
	$pos = 0;
	$array = array();
    $max = substr_count($array_prueba,'/');
	for($i = 0; $i < $max; $i++){
		$rest1 = stripos($array_prueba, '/');

		//print_r("POSICION  " . $rest1 . '<br>');
		$rest = substr($array_prueba,$pos,$rest1);
		//print_r($rest);
		//print_r("ARRAY " . $rest .'<br>');
		//Buscamos espacio en array prueba
		$espacio =  stripos($array_prueba, ' ');
		//extraemos información entre $pos[0] y el espacio
		$infoToArray = substr($rest,$pos,$espacio);
		//Metemos la info en array [id paso]
		array_push($array, $infoToArray); 
		//metemos info restante [fecha]
		array_push($array,substr($rest, $espacio+1));
		//print_r($array);
		//Quitamos la información metida del array [ + 1 por la /]
		$array_prueba = substr($array_prueba, $rest1+1);
		//print_r("    " . $array_prueba . '<br>');
		//break;
	}
	$espacio =  stripos($array_prueba, ' ');
	$infoToArray = substr($array_prueba,$pos,$espacio);
	array_push($array, $infoToArray); 
	array_push($array,substr($array_prueba, $espacio+1));
	//print_r($array);
	//print_r($array_prueba);	
	//print_r($array);
	return $array;		
}

function printPasosARevisar($param){
	print_r("Se deben consultar los siguientes pasos de la estancia: <b> <br>");
	$conexion = conBD();
	////sprint_r($dt1);
	for($i= 0; $i < sizeof($param) - 2; $i = $i + 2){
		$id_paso = $param[$i];
		$consulta = "SELECT nombre FROM pasos WHERE id_paso = $id_paso";
		$conexion->set_charset('utf8');	
		$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos print a revisar");
		$data = mysqli_fetch_assoc($resultado);
		//print_r($data['nombre']);
		//print_r($data);
		print_r( "<u>". $data['nombre'] . "</u><br>		Fecha esperada de finalización: ". $param[$i+1] . '<br>');
		//break;
	}
	print_r('</b>');
}

function getPasos23($year){

	$conexion = conBD();
	$consulta = "SELECT nombre FROM pasos WHERE id_paso";
	$conexion->set_charset('utf8');	
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	$data = mysqli_fetch_assoc($resultado);
	//print_r($data);
}

function getProfesores($departamento){
	$conexion = conBD();
	$consulta = "SELECT Nombre, Apellidos, NIU FROM usuario WHERE TipoUsuario = 'profesor'";
	$conexion->set_charset('utf8');	
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos - profesores get");
	//$data = mysqli_fetch_assoc($resultado);
	switch ($departamento) {
		case 'Todos':
			$data = array();
			
			while ($row = $resultado->fetch_assoc()) {
				if(isset($_POST['grado'])){
						//print_r('GRADO');
						$variable = getDepartamentosProfesor($row['NIU']);
						//print_r($variable);
						//print_r(isFromGrado($variable['Departamento'], $_POST['grado']));
						if(isFromGrado($variable['Departamento'], $_POST['grado'])){
							$data[] = $row;
						}

					}else{
						$data[] = $row;
					}
	  			
				}
			break;
		
		default:
			//print_r($departamento);
			$data = array();
			while ($row = $resultado->fetch_assoc()) {
					//var_dump($row['NIU']);
					$variable = getDepartamentosProfesor($row['NIU']);
					if(isset($_POST['grado'])){
						print_r($_POST['grado']);
						isFromGrado($variable, $_POST['grado']);

					}
					//	print_r($variable);
	  			 	if($variable['Departamento'] === $departamento) $data[] = $row; 	
	  			 	//break;
				}
			break;
	}
	/*$data = array();
	while ($row = $resultado->fetch_assoc()) {
	    $data[] = $row;
	}*/

	//print_r($data);
	return $data;
}

function newAlumno($NIU, $Nombre, $Apellidos, $idEst, $grado){

	$conexion = conBD();
	$NombreToInsert = '\'' . $Nombre . '\'';
	$ApellidosToInsert = '\'' . $Apellidos . '\'';
	//print_r($NombreToInsert);
	//print_r("NIU: " .$NIU . "NOMBRE: " . $Nombre . "Aelldios: " . $Apellidos . "estac: " . $idEst );
	$consulta = "INSERT INTO usuario(NIU,Nombre,Apellidos, TipoUsuario) values($NIU, $NombreToInsert, $ApellidosToInsert, 'alumno')";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ) ;
	//print_r($idEst);
	$conexion = conBD();
	$consulta = "INSERT INTO alumno(NIU_alumno, id_estancia, grado) values($NIU, $idEst, $grado)";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); //or die ( "Algo ha ido mal en la consulta a la base de datos newAlumno2");
	print_r($consulta);
	if($resultado === false){
		echo'<div class="alert alert-danger alert-dismissible" role="alert">
 				 <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
 				 <strong>ERROR:</strong> El alumno ya dispone de una estancia.
				</div>';
		return false;

	}
	return true; 
}
function getCursos(){

	$conexion = conBD();
	$consulta = "SELECT DISTINCT(curso_etapa) FROM etapas ORDER BY curso_etapa DESC";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); 
	$data = array();
	while ($row = $resultado->fetch_assoc()) {
	    $data[] = $row;
	}
	//print_r($data);
	return $data;
}

function ajaxTableEstancias($grado, $all, $curso)
{
	//print_r("HE ENTRADO A TABLE ESTANCIAS");	
	if($all == 5){
		$tableEstancias = '';
	}
	switch ($grado) {
		case '0':
			
			print_r('SOY UN 0');
			$tableEstancias = tableEstanciasNombres('', 123, $curso); // por defecto al cargar página del responsable
			break;
		
		default:
			print_r('SOY DEFAULT');
			$tableEstancias = tableEstanciasNombres($all, $grado, $curso);
			
			break;
	}
	if($all == 5){ // EN CASO DE QUE OS DOS ESTEN UNCHECKED
		$tableEstancias = array();
	}
	/*if($grado != NULL){
		
	}
	if(isset($_POST['name1'])){
            //print_r("OK");
            $variable = $_POST['name1'];
            //print_r($variable);
           // print_r($variable);
            $tableEstancias = tableEstanciasNombres($variable, $grado);
            //print_r($tableEstancias);
    }
    else{
    		print_r("ELSE");

            $tableEstancias = tableEstanciasNombres('', 123);
    }*/
     $gradoNewEstancia  = $grado;
     print_r($gradoNewEstancia);
    return $tableEstancias; 
}

function ajaxTableProfesores()
{
	if(isset($_POST['dep'])){
            //print_r("OK");
            $variable = $_POST['dep'];
           // print_r($variable);
           // print_r($variable);
           $profesoresNuevaEstancia = getProfesores($variable);
            //print_r($tableEstancias);
    }
    else{

             $profesoresNuevaEstancia = getProfesores('Todos');
    }

    return $profesoresNuevaEstancia; 
}
function getDepartamentos(){
	$conexion = conBD();
	$consulta = "SELECT nombre_departamento, acronimo FROM departamentos";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); 
	$data = array();
	while ($row = $resultado->fetch_assoc()) {
	    $data[] = $row;
	}
	return $data;


}
function getDepartamentosProfesor($NIU_Profesor){

	$conexion = conBD();
	$consulta = "SELECT Departamento FROM profesor WHERE NIU_Profesor = $NIU_Profesor ";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); 
	//$data = array();
	$data = mysqli_fetch_assoc($resultado);
	return $data;


}

function setDepartamentosProfesor($NIU_Profesor, $Departamento){

	$conexion = conBD();
	$consulta = "INSERT INTO profesor values($NIU_Profesor, $Departamento) ";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); 
	//$data = array();
	//$data = mysqli_fetch_assoc($resultado);
	//return $data;


}

function getAlumnosAsignadosProfesor($NIU_Profesor){

	$conexion = conBD();
	$consulta = "SELECT COUNT(NIU_profesor) as numAlumnos FROM estancia WHERE NIU_profesor = $NIU_Profesor  AND curso = '2019/20'";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); 
	$data = mysqli_fetch_assoc($resultado);
	//print_r($data);
	return $data;
}

function newProfesor($NIU, $Nombre, $Apellidos, $Sexo, $Email, $Telefono, $Departamento, $cursoActual){

	$NombreToInsert = '\'' . $Nombre . '\'';
	$ApellidosToInsert = '\'' . $Apellidos . '\'';
	$SexoToInsert = '\'' . $Sexo . '\'';
	$EmailToInsert = '\'' . $Email . '\'';
	$DepartamentoToInsert = '\'' . $Departamento . '\'';
	///$TelefonoToInsert ='\'' $Telefono . '\''; 
	print_r("SOY CURSO ACTUAL " . $cursoActual);
	$conexion = conBD();
	$consulta = "INSERT INTO usuario(NIU, Nombre, Apellidos,Sexo, Email, Telefono, TipoUsuario ) values($NIU, $NombreToInsert, $ApellidosToInsert, $SexoToInsert, $EmailToInsert, $Telefono, 'profesor')";
	//print_r($consulta);
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta );
	if($resultado === false){
		//print_r(mysqli_error($conexion));
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
 				 <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
 				 <strong>ERROR:</strong> El profesor que ha intentado añadir ya existe en el sistema.
				</div>';
		/*echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  ¡ERROR CREANDO ESTANCIA!: El profesor ya dispone de una estancia
			</div>';*/
		return false;

	}
	else{
		newCursoProfesor($NIU, $cursoActual);
		echo '<div class="alert alert-success alert-dismissible" role="alert">
 				 <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
 				 Se ha añadido el nuevo profesor de manera correcta.
				</div>';
	}
	//print_r("HOLA");
	setDepartamentosProfesor($NIU, $DepartamentoToInsert);
	return true; 

}
function newCursoProfesor($NIU_profesor, $cursoActual){
	$curso = $cursoActual;
	print_r("SOY CURSO ACTUAL EN CURSO PROFESOR" . $curso);
	$curso = '\'' . $curso . '\'';
	$conexion = conBD();
	$consulta = "INSERT INTO cursoprofesor(NIU_profesor, curso) values($NIU_profesor, $curso)";
	//print_r($consulta);
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta );

}

function getGrados(){

	$conexion = conBD();
	$consulta = "SELECT nombre, codigo_grado FROM grados";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); 
	//$data = mysqli_fetch_assoc($resultado);
	$data = array();
	$i = 0; 
	while ($row = $resultado->fetch_assoc()) {
	    $data[] = $row;
	}
	//print_r($data);
	return $data;

}
function newDepartamento($Nombre, $Acronimo, $GradoDep, $idDep){

	$conexion = conBD();
	$NombreToInsert = '\'' . $Nombre . '\'';
	$GradoToInsert = '\'' . $GradoDep . '\'';
	$AcronimoToInsert = '\'' . $Acronimo . '\'';
	$consulta = "INSERT INTO departamentos(codi_departamento, nombre_departamento, grado_departamento,acronimo) values($idDep, $NombreToInsert, $GradoToInsert, $AcronimoToInsert)";
	//print_r($consulta);
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta );
	if($resultado === false){
		print_r(mysqli_error($conexion));
		echo '<div class="alert alert-danger alert-dismissible" role="alert">
 				 <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
 				 <strong>ERROR:</strong> El grado que ha intentado añadir ya existe en el sistema.
				</div>';
		/*echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
			  ¡ERROR CREANDO ESTANCIA!: El profesor ya dispone de una estancia
			</div>';*/
		return false;

	}
	else{
		echo '<div class="alert alert-success alert-dismissible" role="alert">
 				 <span type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
 				  Se ha añadido el nuevo departamento de manera correcta.
				</div>';
	}

}
function isFromGrado($departamento, $grado){
	//print_r($departamento);
	$Departamento = '\'' . $departamento . '\'';
    $conexion = conBD();
	$consulta = "SELECT grado_departamento FROM departamentos where acronimo = $Departamento";
	//print_r($consulta);
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); 
	$data = mysqli_fetch_assoc($resultado);
	//print_r($data['grado_departamento']);
	//print_r($grado);
	//print_r($data);
	if($data['grado_departamento'] == $grado || $grado == 'Todos'){
		//print_r("OK");
		return true; 
	}
	//print_r('KO');
	return false;

}
function getCursoActual($curso_actual, $curso_set){

	//print_r(getdate());

	/*
	$mes = 8;
	$dia = 9;
	$year = 2020;

*/
	function cursoActual(){

		$fecha = getdate();
		$mes = $fecha['mon'];
		$dia = $fecha['mday'];
		$year = $fecha['year'];
		switch ($mes) {
			case '9':
				$curso = $curso = $year . '/' . ($year + 1);
				if($dia <= 8){

					$curso = ($year - 1) . '/' . $year;

				}
				break;
			
			default:
				if($mes < 9){

					$curso = ($year - 1) . '/' . $year;
				}
				else{


					$curso = $year . '/' . ($year + 1);
				}
						# code...
				break;
		}
		return $curso;
	}
	function curso_siguiente($year){
		$year1 = stripos($year, '/');
		$year = substr($year,0,$year1);
		$curso = ($year+1) . '/' . ($year + 2);
		return $curso; 
	}
	function curso_anterior($year){
		 $year1 = stripos($year, '/');
		 $year = substr($year,0,$year1);
		 //print_r($year);
		 $curso = ($year - 1) . '/' . ($year);
		 return $curso; 
	}
	
	/*$curso = cursoActual();
	if($curso_actual = cursoActual()){
		
	}*/
	//$curso =0; 
	if($curso_actual == NULL) $curso_actual = cursoActual();
	switch ($curso_set) {
		case '1':
			$curso = curso_siguiente($curso_actual);
			break;
		case '-1':
			$curso = curso_anterior($curso_actual);
			break;
		case '0' : 
			return $curso_actual; 
		default:
			$curso = cursoActual();
			break;
	}
	// PARA ELIMINAR EL "20 o lo que seal del año."
	$curso_actual = substr($curso, 0, 5) . substr($curso,7); 
	return $curso_actual;
	//print_r($curso);
     /*$fecha_inicio = strtotime($fecha_inicio);
     $fecha_fin = strtotime($fecha_fin);
     $fecha = strtotime($fecha);

     if(($fecha >= $fecha_inicio) && ($fecha <= $fecha_fin)) {

         return true;

     } else {

         return false;

     }
 */

}
//$gradoReturn = $grado; 

function getGradoToEstancia(){


	return $GLOBALS["gradoReturn"];

}

function getMaxEstProfesor($NIU){

	$conexion = conBD();
	$consulta = "SELECT num_max_alum FROM cursoprofesor where NIU_profesor = $NIU";
	$conexion->set_charset('utf8');
	$resultado = mysqli_query( $conexion, $consulta ); 
	//$data = mysqli_fetch_assoc($resultado);
	//$data = array();
	$data = mysqli_fetch_assoc($resultado);
	//print_r($data);
	return $data;
}
/*
NO IMPLEMENTADO
function getProfesor($profesor){

	//$rest1 = stripos($array_prueba, ' ');
	$conexion = conBD();
	$consulta = "SELECT NIU FROM usuario WHERE Nombre = ";
	$conexion->set_charset('utf8');	
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	//$data = mysqli_fetch_assoc($resultado);
	$data = array();
	while ($row = $resultado->fetch_assoc()) {
	    $data[] = $row;
	}
	return $data;

}*/
?>
<script>
function hola(){
	$(document).ready(function() {
  $('ul.navbar-nav > li').click(function(e) {
    //e.preventDefault();
    $('ul.navbar-nav > li').removeClass('active');
    $(this).addClass('active');

  });
  //window.history.pushState({}, document.title, "/" + "index.php");
});}
	
function doneDate(){
$('.changeBox input[type=checkbox]').change(function() { // while you're at it listen for change rather than click, this is in case something else modifies the checkbox
  var id = $(this).attr('id');
  var idF =" #"+ id + "Fecha";
if($(this).is(":checked")) {
     var f= new Date();
     $(idF).html("Realizado correctamente a fecha: " + f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear() + prueba());
     prueba();
   }
   else{
    $(idF).html("");
    prueba();
   }

});
  


  var prueba = function(){
   return '<i class = "fa fa-book"></i>'
  }

}
</script>