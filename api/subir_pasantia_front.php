<!Doctype html>
<html>
<head>
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

	<h3>AGREGAR UNA NUEVA PASANTIA</h3>
		<form action="../api/subir_pasantia_back.php" method="post" >

				Nombre Pasantia
				<br>
				<input type="text" name="nombre">
				
				<br>
				Carrera/Doctrina
				<br>
	            <select name="Carrera/Doctrina">
	            	<option value="..">-- Elija --</option>
  					<option value="Ingenieria">Ingenieria</option>
  					<option value="Pedagogia">Pedagogia</option>
  					<option value="Derecho">Derecho</option>
  					<option value="Medicina">Medicina</option>
				</select> 	
				<br>
				Universidad
				<br>
				<select name="Universidad">
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
						$sql_colegios = "SELECT * FROM universidades";
						if($conn->query($sql_colegios)){
							$result = $conn->query($sql_colegios);
							if ($result->num_rows > 0) {
    						// output data of each row
    							while($row = $result->fetch_assoc()) {   								
    								echo "<option value=".$row["sigla"]. "> ".$row["nombre"]."</option>";
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
				
				<br>
				Cupo (Num. Máximo de alumnos)
				<br>
				<input type="text" name="Cupo">
				<br>
				Curso Minimo
				<br>
				<select name="curso_min">
	            	<option value="..">-- Elija --</option>
  					<option value="1º Basico">1º Basico</option>
  					<option value="2º Basico">2º Basico</option>
  					<option value="3º Basico">3º Basico</option>
  					<option value="4º Basico">4º Basico</option>
  					<option value="5º Basico">5º Basico</option>
  					<option value="6º Basico">6º Basico</option>
  					<option value="7º Basico">7º Basico</option>
  					<option value="8º Basico">8º Medio</option>
  					<option value="Iº Medio">Iº Medio</option>
  					<option value="IIº Medio">IIº Medio</option>
  					<option value="IIIº Medio">IIIº Medio</option>
  					<option value="IVº Medio">IVº Medio</option>
				</select>
				<br>
				Curso Maximo
				<br>
				<select name="curso_max">
	            	<option value="..">-- Elija --</option>
  					<option value="1º Basico">1º Basico</option>
  					<option value="2º Basico">2º Basico</option>
  					<option value="3º Basico">3º Basico</option>
  					<option value="4º Basico">4º Basico</option>
  					<option value="5º Basico">5º Basico</option>
  					<option value="6º Basico">6º Basico</option>
  					<option value="7º Basico">7º Basico</option>
  					<option value="8º Basico">8º Medio</option>
  					<option value="Iº Medio">Iº Medio</option>
  					<option value="IIº Medio">IIº Medio</option>
  					<option value="IIIº Medio">IIIº Medio</option>
  					<option value="IVº Medio">IVº Medio</option>
				</select>
				<br>
				Direccion:
				<br>
				<input type="text" name="Direccion">
				<br>
				Sala:
				<br>
				<input type="text" name="Sala">
				<br>
				Duracion:
				<br>
				<input type="text" name="Duracion">
				<br>
				Horario:
				<br>
				<input type="text" name="Horario">
				<br>





	      <input type="submit" value="submit">
	  </form>
	</body>

	    
	    
</html>