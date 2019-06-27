<?php
	error_reporting(E_ALL);
	echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";

	$alumno = filter_input(INPUT_POST, 'rut_est');

	//$directorio_base ="../img_asset";

	//$dir_handle = opendir($directorio_base);

	//while(($archivo = readdir($dir_handle)) !== false) {
	//	 $ruta = $directorio_base . '/flecha_cursando.png';
	//	  echo $ruta . PHP_EOL;
	//	  if(is_file($ruta)) {
	//	      $ext = pathinfo($ruta, PATHINFO_EXTENSION);
	//	   }
	//	}

//	closedir($dir_handle);

	$directorio_base ="../img_asset";

	$dir_handle = opendir($directorio_base);

	while(($archivo = readdir($dir_handle)) !== false) {
		 $rutados = $directorio_base . '/flecha_aprobado.png';
		  echo $rutados . PHP_EOL;
		  if(is_file($rutados)) {
		      $ext = pathinfo($rutados, PATHINFO_EXTENSION);
		   }
		}
	closedir($dir_handle);



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
		if(!empty($alumno)){
			// EDITAR ALUMNO

			$sql_select = "SELECT * FROM estudiante WHERE (id_est = '$alumno'); ";

			if($conn->query($sql_select)){
				$result = $conn->query($sql_select);
				if ($result->num_rows > 0) {
    						// output data of each row

    				while($row = $result->fetch_assoc()) {
    					if($row['estado_pas_1'] !== $rutados){
    						$sql = "UPDATE estudiante SET estado_pas_1 = '$rutados' WHERE (id_est = $alumno) ";
			
							if(mysqli_query($conn, $sql)){
			    				echo "Nota Actualiza";
							} else{
   								echo "ERROR ". mysqli_error($conn);
							}
    					}
    					elseif($row['estado_pas_2'] !== $rutados){
    						$sql = "UPDATE estudiante SET estado_pas_2 = '$rutados' WHERE (id_est = $alumno) ";
			
							if(mysqli_query($conn, $sql)){
			    				echo "Nota Actualiza";
							} else{
   								echo "ERROR ". mysqli_error($conn);
							}
    					}
    					elseif($row['estado_pas_3'] !== '../img_asset/flecha_cursando.png'){
    						$sql = "UPDATE estudiante SET estado_pas_3 = '$rutados' WHERE (id_est = $alumno) ";
			
							if(mysqli_query($conn, $sql)){
			    				echo "Nota Actualiza";
							} else{
   								echo "ERROR ". mysqli_error($conn);
							}
    					}
    					else{
    						echo "El estudiante ". $row['nombre_est']." " . $row['ape_est']. "ya ha aprobado sus 3 pasantias";
    					}
	   				}
				} else {
			    	echo "0 results";
				}
			}
			
			
		}
	}
	$conn->close();	
?>