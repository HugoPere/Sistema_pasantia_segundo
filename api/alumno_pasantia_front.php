<!Doctype html>
<html>
<nav>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body style="background-color:#21A97B">
<nav class="navbar navbar-expand-lg navbar-light bg-dark">

  <a class="navbar-brand" href="https://www.unab.cl/">Seguimiento
    <img src="../img_asset/fondo-transparente-logo-color-con-texto-azul.png" width="30" height="30" alt="">
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

	<h3>Poner Alumno en pasantia</h3>
		<form action="../api/alumno_pasantia_back.php" method="post" >

				<label for="name">Rut Alumno:</label>
        <br>
	          	<input type="text" name="rut_est" id="rut_est" default="Sin digito verificador">
              <br>
	          	<label for="name">Pasantia a añadir</label>
              <br>
	            <select name="id_pasantia">
	            	<?php
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
						$sql_colegios = "SELECT * FROM pasantia";
						if($conn->query($sql_colegios)){
							$result = $conn->query($sql_colegios);
							if ($result->num_rows > 0) {
    						// output data of each row
    							while($row = $result->fetch_assoc()) {   								
    								echo "<option value=".$row["id_pasantia"]. "> ".$row["nombre_pasantia"]."</option>";
    							}
    							echo "---";							
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
	      <input type="submit" value="submit">
	  </form>
	</body>
</html>