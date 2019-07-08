<?php
	error_reporting(E_ALL);

	echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";

	echo "<br> <a href='subir_alumno_front.php'> VOLVER AL MENU ANTERIOR </a><br>";
	
	$nombre_est = filter_input(INPUT_POST, 'nombre_est');	
	$foto = filter_input(INPUT_POST, 'imagen');
	$colegio = filter_input(INPUT_POST, 'colegio');

	$nombre_foto = filter_input(INPUT_POST, 'imagen');

	//Declaracion imagen
	$directorio_base ="../imagenes";

	$dir_handle = opendir($directorio_base);

	while(($archivo = readdir($dir_handle)) !== false) {
	  $ruta = $directorio_base . '/' . $archivo;
	  //echo $ruta . PHP_EOL;
	  if(is_file($ruta)) {
	      $ext = pathinfo($ruta, PATHINFO_EXTENSION);
	   }
	}
	closedir($dir_handle);

	$rut_est = filter_input(INPUT_POST, 'rut_est');
	$ape_est = filter_input(INPUT_POST, 'ape_est');	
	$nac_est = filter_input(INPUT_POST, 'nac_est');
	$fecha_nac = filter_input(INPUT_POST, 'fecha_nac');
	
	$ciudad = filter_input(INPUT_POST, 'ciudad');
	$direccion = filter_input(INPUT_POST, 'direccion');	
	$region = filter_input(INPUT_POST, 'region');
	$correo_est = filter_input(INPUT_POST, 'correo_est');
	$curso = filter_input(INPUT_POST, 'curso');
	$sexo = filter_input(INPUT_POST, 'sexo');

	$guion = '-';

	$pos = strpos($rut_est, $guion);

	//Declaracion imagen

	$directorio_base ="../img_asset";

	$dir_handle = opendir($directorio_base);

	while(($archivo = readdir($dir_handle)) !== false) {
		 $rutados = $directorio_base . '/flecha_cursando.png';
		  //echo $rutados . PHP_EOL;
		  if(is_file($rutados)) {
		      $ext = pathinfo($rutados, PATHINFO_EXTENSION);
		   }
		}
	closedir($dir_handle);

	
//ALTERAR INSERT "TIPO COLEGIO/NOMBRE COLEGIO"

	if(!empty($nombre_est)){
		$dbhost = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "test";

		//Aqui se crea la conexion

		$conn = mysqli_connect($dbhost ,$dbusername, $dbpassword, $dbname);
		
		if(mysqli_connect_error()){
			die("Connection failed: " . mysqli_connect_error());
		}
		else{
			if($pos == true){
				// Attempt insert query execution

				$sql = "INSERT INTO estudiante(nombre_est,ape_est,rut_est, correo_est, foto_est,nac_est,fecha_nac,ciudad,direccion,region,sexo, id_colegio, id_curso, estado_pas_1, estado_pas_2, estado_pas_3) VALUES ('$nombre_est', '$ape_est','$rut_est', '$correo_est', '$ruta', '$nac_est','$fecha_nac','$ciudad','$direccion','$region','$sexo','$colegio','$curso', '$rutados', '$rutados', '$rutados')";
				
				if(mysqli_query($conn, $sql)){
				    echo "Estudiante ingresado";
				} else{
    				echo "ERROR ". mysqli_error($conn);
				}
			}
			else{
				echo "Datos erroneos";
			}
		}

		$conn->close();
	}
	else{
		echo "No hubo conexion";
		die;
	}
?>