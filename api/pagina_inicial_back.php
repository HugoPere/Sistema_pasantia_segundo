<?php
	error_reporting(E_ALL);
	$correo = filter_input(INPUT_POST, 'correo');	
	$pass = filter_input(INPUT_POST, 'pass');

//ALTERAR INSERT "TIPO COLEGIO/NOMBRE COLEGIO"

	if(!empty($correo)){
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
			if(!empty($correo)){
				// Attempt insert query execution

				$sql = "SELECT * from usuarios WHERE user = '$correo'";
				
				if(mysqli_query($conn, $sql)){
					$result = $conn->query($sql);
					while($row = $result->fetch_assoc()){
						if($row['pass'] == $pass){
							echo "Bienvenido";
					    	header ("Location: ../api/pagina_inicial_fron.php");
						}
						else{

				    	echo "CONTRASEÑA INCORRECTA";

				    	echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";
				    }
					}
				    
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