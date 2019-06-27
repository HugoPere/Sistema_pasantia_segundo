
<?php
	error_reporting(E_ALL);
	//echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";
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
		if(!empty($alumno)){
			// EDITAR ALUMNO
			$sql = "SELECT * FROM
					 		 estudiante AS e JOIN
					 		 clasepasantia AS cp ON 
					 		 e.id_est = c.id_est 
					 		 JOIN
					 		 pasantia AS p ON
					 		 e.id_pasantia = cp.id_pasantia
					 		 WHERE(e.rut_est = '$aluno')";
			
			if(mysqli_query($conn, $sql)){
			    echo "Nota Actualiza";
			} else{
   				echo "ERROR ". mysqli_error($conn);
			}
			
		}
	}
	$conn->close();	
?>