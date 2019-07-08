<?php
			error_reporting(E_ALL);
			$id_est = filter_input(INPUT_POST, 'id_est');

			echo "<br> <a href='pagina_inicial_fron.php'> VOLVER AL MENU PRINCIPAL </a><br>";

			echo "<br> <a href='leer_info_alumno_front.php'> VOLVER AL MENU ANTERIOR </a><br>";
			
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
					
					$sql = "SELECT * FROM
					 		 estudiante AS e JOIN
					 		 colegios AS c ON 
					 		 e.id_colegio = c.id_colegio 
					 		 JOIN
					 		 clasepasantia AS cp ON
					 		 e.id_est = cp.id_est
					 		 WHERE(e.id_est = '$id_est')";

					if($conn->query($sql)){
						$result = $conn->query($sql);
				
						if ($result->num_rows > 0) {
    						// output data of each row

    						while($row = $result->fetch_assoc()) {

    							echo "<img src= ".$row['foto_est']."> <br>";

    							echo "<table style='width:50%' border='1'>";

    							echo "<tr>";

    							echo "<th>Datos Personales</th>";

    							echo "<th>Datos Academicos</th>";

    							echo "<th>Datos Pasantia</th>";

    							echo "<tr>";

    							echo "<tr>";       						

        						echo "<td>Nombre: " . $row["nombre_est"]. " <br> Apellido: " . $row["ape_est"]. " <br> ";

        						echo "Region: " . $row["region"]. " <br> Direccion: " . $row["direccion"]. " </td>";

        						echo "<td>Colegio: ".$row["nombre_colegio"]. "<br>";

        						echo "Tipo Colegio: ".$row["tipo_colegio"]. "</td>";

        						//echo "<td> Carrera Pasantia: ".$row["carrera"]. "<br><br> </td>";

        						echo "</tr>";

        						echo "</table>";

        						echo "<br>";

        						echo "<img src= ".$row['estado_pas_1'].">" ;

        						echo "<img src= ".$row['estado_pas_2'].">" ;

        						echo "<img src= ".$row['estado_pas_3'].">" ;

        						echo "<img src= ../img_asset/copa.png>" ;

	    					}
						} else {
				    	echo "0 results";
						}
					}

					else{
					echo "Error de SQL"; 
					}
				}

				$conn->close();
			}
			else{
				echo "No hay ID";
				die;
			}
		?>