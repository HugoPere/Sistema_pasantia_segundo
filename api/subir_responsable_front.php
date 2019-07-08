<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #0E0B4D;">

  <a class="navbar-brand" href="https://www.unab.cl/">Seguimiento
    <img src="https://academiadialogo.cl/web/wp-content/themes/academia/img/logo-blanco.svg" width="30" height="30" alt="">
  </a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="pagina_inicial_fron.php">Frente</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="subir_alumno_front.php">Crear un alumno nuevo</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="leer_info_alumno_front.php">Ver un Alumno nuevo</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="subir_pasantia_front.php">Crear una nueva pasantia</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="alumno_pasantia_front.php">Asignar una pasantia a un alumno</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="nota_pasantia_front.php">Subir una nota a un alumno</a>
      </li>
    
    </ul>
  </div>
</nav>

<!--AQUI COMIENZA LA PAGINA -->

  <li>
    <div>
	  <div data-role="header">
	  <h1>Añadir responsable</h1>
	  </div>

	  <div data-role="main" class="ui-content">
	    <form method="post" action="../api/subir_responsable_back.php" enctype="multipart/form-data">
	      <fieldset data-role="collapsible">
	          <label for="name">Nombres:</label>
	          <br>
	          <input type="text" name="nombre" id="nombre">
	          <br>
	          <label for="name">Apellidos:</label>
	          <br>
	          <input type="text" name="apellido" id="apellido">
				<br>
				<br>
			<label for="name">Pasantia:</label>
				<br>
				<select name="pasantia">
  					<?php
					$dbhost = "localhost";
					$dbusername = "root";
					$dbpassword = "";
					$dbname = "test";
					//Aqui se crea la conexio
					$conn = mysqli_connect($dbhost ,$dbusername, $dbpassword, $dbname);
					if(mysqli_connect_error()){
						die("Connection failed: " . mysqli_connect_error());
					}
					else{
						$sql_colegios = "SELECT * FROM pasantia";
						if($conn->query($sql_colegios)){
							$result = $conn->query($sql_colegios);
							if ($result->num_rows > 0) {
    						// output data of each row
    							while($row = $result->fetch_assoc()) {   								
    								echo "<option value=".$row["id_pasantia"]. "> ".$row["nombre_pasantia"]."</option>";
    							}
    							echo "---";

    								//echo  "<option value=".$row["id_colegio"]. "> ".$row["nombre_colegio"]."</option>";    							
    						} 
    						else {
				    	echo "Error";
							}
						}
					else{
					echo "Error"; 
					}
					}
					$conn->close();
				?>
			</select>
	      <input type="submit" value="Submit">
	      </fieldset>
	    </form>
	  </div>
</div>

    </body>
  </li>
</html>
