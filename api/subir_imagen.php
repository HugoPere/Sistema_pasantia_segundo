<?php
	error_reporting(E_ALL);
	
	

	if(!empty($id_est)){
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
			echo "entre";
			if(!empty($nombre_est)){
				// Attempt insert query execution
				$id_est = $_REQUEST["id_est"];

				$nombre_est = $_REQUEST["nombre_est"];

				$imagen = $_FILES["imagen"]["name"];

				$ruta = $_FILES["imagen"]["tmp_name"];

				$destino = "fotos/".$imagen;

				copy($ruta,$destino);

				$sql = "INSERT INTO estudiante VALUES ('$id_est', '$nombre_est', '$destino')";
				
				if(mysqli_query($conn, $sql)){
				    echo "Estudiante ingresado";
				} else{
    				echo "ERROR ". mysqli_error($conn);
				}
			}
		}

		$conn->close();
	}
	else{
		echo "Por favor, ponga un id";
		die;
	}
?>