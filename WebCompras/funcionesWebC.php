<HTML>
    <HEAD> <TITLE> Funciones </TITLE>
     <meta charset="utf-8">   
    </HEAD>
    <BODY>
<?php

#Lucas Fadavi Solanilla


    function connectDBcomprasweb(){

    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname = "comprasweb";
    
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        return $conn;
    }

    // Obtengo todos los productos para mostrarlos en la lista de valores
function obtenerProductos($conn) {
    $productos = array();
    
    $sql = "SELECT id_producto, nombre FROM producto";

    foreach ($conn->query($sql) as $row) {
            $productos[]=$row['nombre'];   
    
    }
    return $productos;
}  

function obtenerAlmacen($conn) {
    $almacenes = array();
    
    $sql = "SELECT num_almacen, localidad FROM almacen";

    foreach ($conn->query($sql) as $row) {
            $almacenes[]=$row['num_almacen'];   
    
    }
    return $almacenes;
}  

      
?>
</BODY>
</HTML>