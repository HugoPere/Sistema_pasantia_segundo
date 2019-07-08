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
	  
	  </div>
	  

	  <div data-role="main" class="ui-content">
	    <form method="post" action="../api/subir_alumno_back.php" enctype="multipart/form-data">
	    	<table>
	    		<tr>
	    			<th>Personal</th>

	    			<th>Dirección</th>
	    			
	    			<th>Académico</th>
	    		</tr>

	    		<tr>
	    		<td>
	       
		          <label for="name">Rut:</label>
		          <br>
		          <input type="text" name="rut_est" id="rut_est" default="Sin digito verificador">
		          <br>
		          <label for="name">Nombres:</label>
		          <br>
		          <input type="text" name="nombre_est" id="id_est">
		          <br>
		          <label for="name">Apellidos:</label>
		          <br> 
		          <input type="text" name="ape_est" id="ape_est">
		          <br>
		          <label for="name">Correo Electrónico:</label>
		          <br>
		          <input type="text" name="correo_est" id="correo_est">
		          <br>
		          <label for="name">Nacionalidad:</label>
		          <br>
		          <input type="text" name="nac_est" id="nac_est">
		          <br>
		          <label for="img">Foto Alumno:</label>
		          <br>
		          <input type="file" name="imagen" id="imagen">

		          <br>
		          <label for="date">Fecha de Nacimiento: <br> (FORMATO MES/DIA/AÑO)</label>
		          <br>
		          <input type="date" name="fecha_nac" id="fecha_nac">
		          <br>
		          <label for="name">Sexo Biologico</label>
		            <br>
		            <select name="sexo">
		            	<option value="..">-- Elija --</option>
	  					<option value="Masculino">Masculino</option>
	  					<option value="Femenino">Femenino</option>
					</select>
					<br>

	      	  </td>

	      	 <td> 

		          <label for="name">Ciudad:</label>
		          <br>
		          <input type="text" name="ciudad" id="ciudad">
		          <br>
		          <label for="name">Direccion:</label>
		          <br>
		          <input type="text" name="direccion" id="dir">
		          <br>
		          <label for="name">Region</label>
		           <br> 
		           <select name="region">
		            	<option value="..">-- Elija --</option>
	  					<option value="I">I</option>
	  					<option value="II">II</option>
	  					<option value="III">III</option>
	  					<option value="IV">IV</option>
	  					<option value="IV">IV</option>
	  					<option value="V">V</option>
	  					<option value="VI">VI</option>
	  					<option value="VII">VII</option>
	  					<option value="VIII">VIII</option>
	  					<option value="IX">IX</option>
	  					<option value="X">X</option>
	  					<option value="XI">XI</option>
	  					<option value="XII">XII</option>
	  					<option value="XIII">XIII</option>
	  					<option value="XIV">XIV</option>
					</select>
					<br>
				
				</td>
				<td>
					
				<label for="name"> Colegio</label>
	            <br>
	            <select name="colegio">

	            	<option value="..">-- Elija --</option>				
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
						$sql_colegios = "SELECT * FROM colegios";

						if($conn->query($sql_colegios)){
							$result = $conn->query($sql_colegios);

							if ($result->num_rows > 0) {
    						// output data of each row
    							while($row = $result->fetch_assoc()) {
    								
    								echo "<option value=".$row["id_colegio"]. "> ".$row["nombre_colegio"]."</option>";
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
				<br>
				<label for="name">Curso</label>
	            <br>
	            <select name="curso">
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
						$sql_colegios = "SELECT * FROM cursos";

						if($conn->query($sql_colegios)){
							$result = $conn->query($sql_colegios);

							if ($result->num_rows > 0) {
    						// output data of each row
    							while($row = $result->fetch_assoc()) {
    								
    								echo "<option value=".$row["id_cursos"]. "> ".$row["nombre"]."</option>";
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
				<br>
			   
	      <input type="submit" value="Subir datos">
	      </td>
	  </tr>
	  
	      </table>
	    </form>
	  </div>
	
</div>

    </body>
  </li>
</html>
