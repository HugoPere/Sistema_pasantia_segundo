<?php
	error_reporting(E_ALL);
	echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";

	echo "<br> <a href='asignar_profesor_pasantia_front.php'> VOLVER AL MENU ANTERIOR </a><br>";
	$pasantia = filter_input(INPUT_POST, 'pasantia');	
	$profesor = filter_input(INPUT_POST, 'Profesor');
	$ayudante1 = filter_input(INPUT_POST, 'ayudante1');	
	$ayudante2 = filter_input(INPUT_POST, 'ayudante2');	
	
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
			//Profesor
			if(!empty($hola)){
				// Attempt insert query execution

				$sql = "UPDATE pasantia p, 
								profesores pr
				SET p.profeso_nombre = pr.nombre_apellido, p.num_profesor = pr.num_profesor, p.correo_profesor = pr.correo_profesor

				WHERE (p.id_pasantia = '$pasantia') AND (pr.id = '$profesor') ";

				if(mysqli_query($conn, $sql)){
				    echo "Pasantia ingresada";

				} else{
    				echo "ERROR ". mysqli_error($conn);
				}
			}
			//Ayudante1
			if(!empty($hola)){
				// Attempt insert query execution

				$sql = "UPDATE pasantia p, 
								profesores pr
				SET p.ayudante_1 = pr.nombre_apellido, p.num_ay_1 = pr.num_profesor, p.correo_ay_1 = pr.correo_profesor

				WHERE (p.id_pasantia = '$pasantia') AND (pr.id = '$ayudante1') ";

				if(mysqli_query($conn, $sql)){
				    echo "Pasantia ingresada";
				    
				} else{
    				echo "ERROR ". mysqli_error($conn);
				}
			}
			//Ayudante 2
			if(!empty($hola)){
				// Attempt insert query execution

				$sql = "UPDATE pasantia p, 
								profesores pr
				SET p.ayudante_2 = pr.nombre_apellido, p.num_ay_2 = pr.num_profesor, p.correo_ay_2 = pr.correo_profesor

				WHERE (p.id_pasantia = '$pasantia') AND (pr.id = '$ayudante2') ";

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
		echo "Error de conexión";
		die;
	}
?>