<?php 

	class clientes{

		public function agregaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$idusuario=$_SESSION['iduser'];

			$sql="INSERT into clientes (id_usuario,
										contrasena,
										nombre,
										apellido,
										direccion,
										email,
										telefono,
										dni)
							values ('$datos[0]',
									'$datos[1]',
									'$datos[2]',
									'$datos[3]',
									'$datos[4]',
									'$datos[5]',
									'$datos[6]',
									'$datos[7]')";
			return mysqli_query($conexion,$sql);
		}

		public function obtenDatosCliente($idcliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="SELECT id_cliente,
							id_usuario,
							contrasena,
							nombre,
							apellido,
							direccion,
							email,
							telefono,
							dni
				from clientes";
			$result=mysqli_query($conexion,$sql);
			$ver=mysqli_fetch_row($result);

			$datos=array(
					'id_cliente' => $ver[0],
					'id_usuario' => $ver[1],
					'contrasena' => $ver[2],
					'nombre' => $ver[3],
					'apellido' => $ver[4],
					'direccion' => $ver[5],
					'email' => $ver[6],
					'telefono' => $ver[7],
					'dni' => $ver[8]
						);
			return $datos;
		}

		public function actualizaCliente($datos){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="UPDATE clientes set id_usuario='$datos[1]',
										contrasena='$datos[2]',
										nombre='$datos[3]',
										apellido='$datos[4]',
										direccion='$datos[5]',
										email='$datos[6]',
										telefono='$datos[7]',
										dni='$datos[8]'
								where id_cliente='$datos[0]'";
			return mysqli_query($conexion,$sql);
		}

		public function eliminaCliente($idcliente){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="DELETE from clientes where id_cliente='$idcliente'";

			return mysqli_query($conexion,$sql);
		}
	}

 ?>