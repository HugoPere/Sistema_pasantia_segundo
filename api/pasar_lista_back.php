<?php
	error_reporting(E_ALL);
	echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";

	echo "<br> <a href='pasar_lista_front.php'> VOLVER AL MENU ANTERIOR </a><br>";

	$asistencia = filter_input(INPUT_POST, 'asistencia');	
	$profesor = filter_input(INPUT_POST, 'profesor');
	$pasantia = filter_input(INPUT_POST, 'pasantia');


//ALTERAR INSERT "TIPO COLEGIO/NOMBRE COLEGIO"

	if(!empty($asistencia)){
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
			if(!empty($asistencia)){
				// Attempt insert query execution

				$sql = "INSERT INTO clases(asistencia, id_profesor, id_pasantia) VALUES ('$asistencia', '$profesor', '$pasantia')";
				
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
		echo "Error de conexion";
		die;
	}
?>