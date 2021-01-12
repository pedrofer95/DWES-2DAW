<HTML>
    <HEAD> 
        <TITLE> Cantidad disponible del producto </TITLE>
        <meta charset="utf-8">
        <meta name="author" content="Lucas Fadavi">
    </HEAD>
<BODY>
<?php

    #Lucas Fadavi Solanilla

        include_once 'funcionesWebC.php';
  
    try {

       //Conexion establecida con la base de datos comprasweb
       $conn=connectDBcomprasweb();
       $productos = obtenerProductos($conn);  
    
       if (!isset($_POST) || empty($_POST)) { 
           
?>            
    
      <form name='cantidad' action='comconstock.php' method='POST'>

        <!--Deplegable de los productos-->
        <H1> Selecciona el producto </H1>
        Productos:   
        <select name="producto">
            <?php foreach($productos as $producto) : ?>
                <option> <?php echo $producto ?> </option>
            <?php endforeach; ?>
        </select>
        </br>
        <br>
     
        <input type="submit" value="Mostrar stock">

        </FORM>

<?php        
        }else{
    
            $productos = $_POST['producto'];

            //select del codigo de producto
            $sql = $conn->prepare("SELECT id_producto as codigo FROM producto where nombre = :productos ");
            $sql->bindParam(':productos', $productos);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            foreach($sql->fetchAll() as $row) {
            $cod=$row["codigo"];   
             
            }

            //Select multitabla para mostrar la cantidad del producto y los datos oportunos
            $sql1 = $conn->prepare("SELECT almacen.localidad as localidad, almacena.id_producto as codigo, producto.nombre as nombre, almacena.cantidad as cantidad FROM almacena join producto on almacena.id_producto=producto.id_producto join almacen on almacen.num_almacen=almacena.num_almacen where producto.id_producto = :codigo and almacena.id_producto = :codigo ");
            $sql1->bindParam(':codigo', $cod);
            $sql1->execute();
  
            echo "<H1>Cantidad disponible de stock</H1>";

            $result = $sql1->setFetchMode(PDO::FETCH_ASSOC);
            foreach($sql1->fetchAll() as $row) {
               
            /* echo "Disponibilidad en el almacen de : " . $row["localidad"]. " - Codigo: " . $row["codigo"]. " - Nombre: " . $row["nombre"]. " - Cantidad: " . $row["cantidad"]. "<br>";*/
            echo "Producto disponible en nuestros almacenes de " . $row["localidad"]. " - Numero de unidades: " . $row["cantidad"]. "<br>";

                }
           } 
           
    }catch(PDOException $e)
        {  
         echo "Se ha producido el siguiente Error : <br><br>" . $e->getMessage();
        }

        $conn = null;   
         
?>

</BODY>
</HTML>