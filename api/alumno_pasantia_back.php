<?php
	error_reporting(E_ALL);
	echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";
	
	$pasantia = filter_input(INPUT_POST, 'id_pasantia');
	
	$alumno = filter_input(INPUT_POST, 'rut_est');

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
		if(!empty($pasantia)){

			$sql = "INSERT INTO clasepasantia(id_colegio, id_est, rut_est)
			SELECT id_colegio, id_est, rut_est 
			FROM estudiante WHERE rut_est = '$alumno';";

			if(mysqli_query($conn, $sql)){
				//$last_id = $conn->insert_id;
			    echo "Pasantia ingresada";
			} else{
   				echo "ERROR ". mysqli_error($conn);
			}

			$sql_two = "UPDATE clasepasantia cp, pasantia p
						SET cp.id_pasantia = p.id_pasantia 
						WHERE (cp.rut_est = '$alumno') AND (p.id_pasantia = '$pasantia');";

			if(mysqli_query($conn, $sql_two)){
				
			    echo "Pasantia ingresada";
			} else{
   				echo "ERROR ". mysqli_error($conn);
			}


		}
	}
	$conn->close();	
?>