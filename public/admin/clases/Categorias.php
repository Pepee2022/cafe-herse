<?php 
	class categorias{
		public function agregaCategoria($datos) {
        $c = new conectar();
        $conexion = $c->conexion();
        // Verificar si ya existe una categoría con el mismo nombre
        $nombreCategoria = mysqli_real_escape_string($conexion, $datos[1]); // Para prevenir SQL injection
        $sqlVerifica = "SELECT id_categoria FROM categorias WHERE nombreCategoria = '$nombreCategoria'";
        $resultadoVerifica = mysqli_query($conexion, $sqlVerifica);
        if (mysqli_num_rows($resultadoVerifica) > 0) {
            // La categoría ya existe, devolver un código de error o mensaje
            return false;
        }
        // La categoría no existe, realizar la inserción
        $sql = "INSERT INTO categorias(id_usuario, nombreCategoria, fechaCaptura)
                VALUES ('$datos[0]', '$nombreCategoria', '$datos[2]')";
        return mysqli_query($conexion, $sql);
    }

		public function actualizaCategoria($datos){
			$c= new conectar();
			$conexion=$c->conexion();

			$sql="UPDATE categorias set nombreCategoria='$datos[1]'
								where id_categoria='$datos[0]'";
			echo mysqli_query($conexion,$sql);
		}

		public function eliminaCategoria($idcategoria){
			$c= new conectar();
			$conexion=$c->conexion();
			$sql="DELETE from categorias 
					where id_categoria='$idcategoria'";
			return mysqli_query($conexion,$sql);
		}

	}

?>