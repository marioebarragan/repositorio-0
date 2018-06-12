<?php

function comprobar_email($email) {
return (filter_var($email, FILTER_VALIDATE_EMAIL)) ? 1 : 0;
}

$Nombre = $Apellido = $email = $genero = "";
$NombreErr = $ApellidoErr = $emailErr = "";
$ok = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$patron_texto = "/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙñÑ\s]+$/";
		if (empty($_POST["Nombre"])) {
				$NombreErr = "Complete este campo.";
				$ok = false;
					} else {	 
						 if (preg_match($patron_texto, $_POST["Nombre"])) {
							$Nombre = test_input($_POST["Nombre"]); 
						   } else {
								$NombreErr = "El nombre sólo puede contener letras y espacios";
								$ok = false;	
								  }
							}

		if (empty($_POST["Apellido"])) {
				$ApellidoErr = "Complete este campo.";
				$ok = false;
				} else {
						if (preg_match($patron_texto, $_POST["Apellido"])) {
						$Apellido = test_input($_POST["Apellido"]);
						} else {
							$ApellidoErr = "El apellido sólo puede contener letras y espacios";
							$ok = false;
						}
				}
				
		if (empty($_POST["email"])) {
				$emailErr = "Complete este campo.";
				$ok = false;
				} else {
					if (isset($_POST['email'])) {
						if (!comprobar_email($_POST["email"])) {
							$emailErr = "El email introducido NO es correcto!";	
						} else {
						$email = test_input($_POST["email"]);
								}
						}
				}
				
if ($ok) {
	//echo ("Nombre: ".$Nombre." | Apellido: ".$Apellido);
}
};

function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  $data = str_replace("'", '"', $data);
	  $data = str_replace('&quot', '"',$data);  
	  $data = str_replace(";", '', $data);
	  return $data;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet"> 
	<link type="text/css" rel="stylesheet" href="css/estilo_.css">
	<title>formulario</title>
</head>
<body>
<div class="cuerpo">
	<div id="contenido">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
	<h2><strong>Datos Personales</h2> 
	<p><span class="error">* CAMPOS OBLIGATORIOS</span></p>
  
	  <table class="formulario">
		  <tr><td class="etiqueta">Nombre</td><td> <input type="text" name="Nombre" required value="<?php echo (isset($_POST["Nombre"])) ? $_POST["Nombre"]:"";?>">
		  <span class="error">* <?php echo $NombreErr;?></span>
		  </td></tr>

		  <tr><td class="etiqueta">Apellido</td><td> <input type="text" name="Apellido" required value="<?php echo (isset($_POST["Apellido"])) ? $_POST["Apellido"]:"";?>">
		  <span class="error">* <?php echo $ApellidoErr;?></span>
		  </td></tr>
		  
		  <tr><td class="etiqueta" >E-mail</td><td><input type="mail" name="email" required value="<?php echo (isset($_POST["email"])) ? $_POST["email"]:"";?>">
		  <span class="error">* <?php echo $emailErr;?></span>
		  </td></tr>

		  <tr><td class="etiqueta">Sexo</td><td>
		  <input type="radio" name="Genero" required value="F"> Femenino
		  <input type="radio" name="Genero" required value="M"> Masculino
	      </td></tr>
	
		  <tr><td class="etiqueta"></td><td>
          <input type="submit" name="submit" value="Confirmar">
		  </td></tr>
	  </table>
	</form>
	</div>
</div>
</body>
</html>
