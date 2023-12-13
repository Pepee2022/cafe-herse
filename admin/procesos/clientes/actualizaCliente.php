<?php 

session_start();
	require_once "../../clases/Conexion.php";
	require_once "../../clases/Clientes.php";

	$obj= new clientes();


	$datos=array(
			$_POST['idclienteU'],
			$_POST['idusuarioU'],
			$_POST['contrasenaU'],
			$_POST['nombreU'],
			$_POST['apellidosU'],
			$_POST['direccionU'],
			$_POST['emailU'],
			$_POST['telefonoU'],
			$_POST['dniU']
				);

	echo $obj->actualizaCliente($datos);

	
	
 ?>