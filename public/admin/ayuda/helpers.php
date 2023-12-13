

//menu de cabecera 
https://bootsnipp.com/snippets/Kr5yV


<style type="text/css">
		
@page {
            margin-top: 0.3em;
            margin-left: 0.6em;
        }
	</style>

<script type="text/javascript">

	//script para evento click y ajax 
	$('#').click(function(){

		datos=$('#').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"../procesos/",
			success:function(r){

			}
		});
	});
//////////////funcion para validar datos vacios :)
	function validarFormVacio(formulario){
		datos=$('#' + formulario).serialize();
		d=datos.split('&');
		vacios=0;
		for(i=0;i< d.length;i++){
				controles=d[i].split("=");
				if(controles[1]=="A" || controles[1]==""){
					vacios++;
				}
		}
		return vacios;
	}

</script>

<script type="text/javascript">
		$('#').click(function(){
			var formData = new FormData(document.getElementById("frm"));

				$.ajax({
					url: "../procesos/articulos/insertaArchivo.php",
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,

					success:function(data){
						
						if(data == 1){
							$('#frm')[0].reset();
							$('#tablaArticulos').load('articulos/tablaArticulos.php');
							alertify.success("Agregado con exito :D");
						}else{
							alertify.error("Fallo al subir el archivo :(");
						}
					}
				});
		});
</script>

<?php 

class TuClase {

    private $conexion;

    public function __construct() {
        $this->conexion = $this->conectar();
    }

    public function conectar() {
        $conexion = new mysqli("tu_host", "tu_usuario", "tu_contraseña", "tu_base_de_datos");
        
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }

    public function obtenIdImg($idProducto) {
        $sql = "SELECT id_imagen FROM productos WHERE id_producto = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $idProducto);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_row();
        $stmt->close();

        return $row ? $row[0] : null;
    }

    public function obtenRutaImagen($idImg) {
        $sql = "SELECT ruta FROM imagenes WHERE id_imagen = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $idImg);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_row();
        $stmt->close();

        return $row ? $row[0] : null;
    }

    public function creaFolio() {
        $sql = "SELECT MAX(id_venta) FROM ventas";
        $result = $this->conexion->query($sql);
        $row = $result->fetch_row();
        $result->close();

        $id = $row ? $row[0] : 0;

        return $id + 1;
    }

    public function nombreCliente($idCliente) {
        $sql = "SELECT apellido, nombre FROM clientes WHERE id_cliente = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $idCliente);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_row();
        $stmt->close();

        return $row ? $row[0] . " " . $row[1] : null;
    }

    public function obtenerTotal($idVenta) {
        $sql = "SELECT precio FROM ventas WHERE id_venta = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $idVenta);
        $stmt->execute();
        $result = $stmt->get_result();

        $total = 0;

        while ($row = $result->fetch_row()) {
            $total += $row[0];
        }

        $stmt->close();

        return $total;
    }
}
