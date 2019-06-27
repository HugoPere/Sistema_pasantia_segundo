<?php
	error_reporting(E_ALL);
	echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";
	$nombre = filter_input(INPUT_POST, 'nombre');	
	$carrera = filter_input(INPUT_POST, 'Carrera/Doctrina');
	$universidad = filter_input(INPUT_POST, 'Universidad');	
	$cupo = filter_input(INPUT_POST, 'Cupo');	
	$curso_min = filter_input(INPUT_POST, 'curso_min');	
	$curso_max = filter_input(INPUT_POST, 'curso_max');	
	$direccion = filter_input(INPUT_POST, 'Direccion');	
	$sala = filter_input(INPUT_POST, 'Sala');		
	$duracion = filter_input(INPUT_POST, 'Duracion');	
	$horario = filter_input(INPUT_POST, 'Horario');	

	
	$hola = 1;
	
	
	if(!empty($hola)){
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
			if(!empty($hola)){
				// Attempt insert query execution

				$sql = "INSERT INTO pasantia(nombre_pasantia, universidad, carrera, cupo, curso_min, curso_max, direccion, sala, duracion, horario) 
					VALUES('$nombre', '$universidad', '$carrera', '$cupo', '$curso_min', '$curso_max', '$direccion', '$sala', '$duracion', '$horario')";

				if(mysqli_query($conn, $sql)){
				    echo "Pasantia ingresada";
				} else{
    				echo "ERROR ". mysqli_error($conn);
				}
			}
		}

		$conn->close();
	}
	else{
		
		die;
	}
?>