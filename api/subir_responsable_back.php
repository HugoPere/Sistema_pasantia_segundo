<?php
	error_reporting(E_ALL);
	echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";

	echo "<br> <a href='subir_responsable_front.php'> VOLVER AL MENU ANTERIOR </a><br>";

	$nombre = filter_input(INPUT_POST, 'nombre');	
	$apellido = filter_input(INPUT_POST, 'apellido');
	$pasantia = filter_input(INPUT_POST, 'pasantia');


//ALTERAR INSERT "TIPO COLEGIO/NOMBRE COLEGIO"

	if(!empty($nombre)){
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
			if(!empty($nombre)){
				// Attempt insert query execution

				$sql = "INSERT INTO responsable_mov(nombre, apellido, id_pasantia) VALUES ('$nombre', '$apellido', '$pasantia')";
				
				if(mysqli_query($conn, $sql)){
				    echo "Responsable ingresado";
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