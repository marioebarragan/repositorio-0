<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
$arregloNum = array (1,2,3,4,5,6,7,8,9,10);
foreach ($arregloNum as $valor){
	$valor = $valor * 2;
	echo "$valor <br>";
}
?>
</body>
</html>