<?php 
	
	require 'conection.php';

		$nombre_equipoError = null;
		$nombreError = null; 
		$apellidoError = null;
		$nombre2Error = null;
		$apellido2Error = null;
		$nombre3Error = null;
		$apellido3Error = null;

	if ( !empty($_POST)) {		
		$nombre_equipo = $_POST['nombre_equipo'];
		$nombre = $_POST['nombre'];			
		$apellido = $_POST['apellido'];		
		$nombre2 = $_POST['nombre2'];			
		$apellido2 = $_POST['apellido2']; 
		$nombre3 = $_POST['nombre3']; 
		$apellido3 = $_POST['apellido3']; 
		

		$valid = true;
		if (empty($nombre_equipo)){
			$nombre_equipoError = 'Por favor escriba su matricula (sin A0, Ej: 1730000)';
			$valid = false;
		}
		if (empty($nombre)){
			$nombreError = 'Por favor elija la nombre ';
			$valid = false;
		}

		if (empty($nombre2)){
			$apellidoError = 'Por favor escriba su nombre2';
			$valid = false;
		}	
		if (empty($apellido2)){
			$nombre2Error = 'Por favor elija su apellido2';
			$valid = false;
		}		
		if (empty($nombre3)){
			$apellido2Error= 'Por favor elija a su nombre3 de apellido2';
			$valid = false;
		}	
		if (empty($apellido3)){
			$nombre3Error= 'Por favor elija a su apellido3';
			$valid = false;
		}	
		if (empty($apellido)){
			$apellido3Error= 'Por favor elija a su apellido';
			$valid = false;
		}
								
		
		if ($valid) {
			
			$pdo = Database::connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO datos (Nombre_equipo,Nombre,Apellido,Nombre2,Apellido2,Nombre3,Apellido3) values(?, ?, ?, ?, ?, ?, ? )";
			$q = $pdo->prepare($sql);

			$q->execute(array($nombre_equipo,$nombre,$apellido,$nombre2,$apellido2,$nombre3,$apellido3));
			Database::disconnect();
			header("Location: salida.html");
		}
	}

?>