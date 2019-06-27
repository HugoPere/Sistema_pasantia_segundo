<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body style="background-color:#21A97B">


<img src="../img_asset/fondo-transparente-logo-color-con-texto-azul.png" width="100" height="100"alt="" style=" "center>
<br>

<form method="post" action="../api/pagina_inicial_back.php" enctype="multipart/form-data">
          <legend>Porfavor Ingrese</legend>
            <label for="name">Correo</label>
            <br>
            <input type="text" name="correo" id="correo">
            <br>
            <label for="text">Contraseña</label>
            <br>
            <input type="password" name="pass" id="pass">
            <br>
          <input type ="submit" value ="submit">
        </form>
        <br>

</body>

</html>