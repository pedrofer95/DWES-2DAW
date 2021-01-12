<!DOCTYPE html>
<html>
<head>
	<title>Alta Cliente</title>
</head>
<body>
		<?php

if (!isset($_POST) || empty($_POST)) { //Lanzamos codigo si no se ha pulsado "enviar" con el cual escribiremos el formulario
	echo '<form action="" method="post"><label for="nif">Nif: </label><input type="text" name="nif"></br>';
	echo '<form action="" method="post"><label for="nombre">Nombre: </label><input type="text" name="nombre"></br>';
	echo '<form action="" method="post"><label for="apellidos">Apellidos: </label><input type="text" name="apellidos"></br>';
	echo '<form action="" method="post"><label for="cp">Codigo Postal: </label><input type="text" name="cp"></br>';
	echo '<form action="" method="post"><label for="dir">Direccion: </label><input type="text" name="dir"></br>';
	echo '<form action="" method="post"><label for="ciudad">Ciudad: </label><input type="text" name="ciudad"></br>';
	echo '<input type="submit" value="enviar"></form>';
} else {
			
	$servername='localhost';
	$username='root';
	$password='rootroot';
	$exp='/[0-9]{8}[a-zA-Z]{1}/';//Regexp para chekiar el dni
	$dnirepe=false;//Boolean para chekiar el dni
	if (preg_match($exp, $_POST['nif'])) {//Comprobamos con el regexp
		try {
		$conn = new PDO("mysql:host=$servername;dbname=comprasweb", $username, $password);//Conectamos a la BBDD
		// set the PDO error mode to exception
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
		echo "Conexion Realizada";
		//Comprobamos si el cliente ya existe
		$sql='SELECT nif FROM cliente'; 
	 		foreach ($conn->query($sql) as $row) {
	 			if ($row['nif']==$_POST['nif']) {
	 				$dnirepe=true;
	 			}
	 		}
	 	if ($dnirepe) {
	 		echo "El empleado con Nif ".$_POST['nif']." ya esta dado de alta";
	 	} else {
	 		//Insertamos nuevo cliente
	 		$sql=$conn->prepare('INSERT INTO cliente (nif, nombre, apellido, cp, direccion, ciudad) VALUES (:nif, :nombre, :apellido, :cp, :direccion, :ciudad)');
	 		$sql->bindparam(':nif',$_POST['nif']);
	 		$sql->bindparam(':nombre',$_POST['nombre']);
	 		$sql->bindparam(':apellido',$_POST['apellidos']);
	 		$sql->bindparam(':cp',$_POST['cp']);
	 		$sql->bindparam(':direccion',$_POST['dir']);
	 		$sql->bindparam(':ciudad',$_POST['ciudad']);
	 		$sql->execute();
	 		echo "Registro a&ntildeadido";
	 		$conn=null;



	 	}
			}
			catch(PDOException $e)
			{
			echo "Connection failed: " . $e->getMessage();
			}
	} else {
		echo "Nif introducido incorrecto";
	}
}
	?>
</body>
</html>