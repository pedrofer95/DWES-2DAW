<!-- LUCAS FADAVI -->

<HTML>
   <HEAD> 
      <TITLE> Productos disponibles en el almacen </TITLE>
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
       $almacenes = obtenerAlmacen($conn);  
    
       if (!isset($_POST) || empty($_POST)) { 
       
?>            

      <form name='cuantos' action='comconsalm.php' method='POST'>

        <!--Deplegable de los almacenes-->
        <H1> Selecciona el producto </H1>
        Almacen:   
        <select name="almacen">
            <?php foreach($almacenes as $almacen) : ?>
                <option> <?php echo $almacen ?> </option>
            <?php endforeach; ?>
        </select>
        </br>
        <br>
     
        <input type="submit" name="Selecciona" placeholder="Selecciona" value="Mostrar productos">

        </FORM>

<?php        
        }else{
    
            $almacen = $_POST['almacen'];

            //select del numero de almacen
            $sql = $conn->prepare("SELECT num_almacen as numero FROM almacen where num_almacen = :almacen ");
            $sql->bindParam(':almacen', $almacen);
            $sql->execute();

            $result = $sql->setFetchMode(PDO::FETCH_ASSOC);
            foreach($sql->fetchAll() as $row) {
            $num=$row["numero"];   
             
            }

            //Select multitabla para mostrar los productos disponibles en un determinado almacen
            $sql1 = $conn->prepare("SELECT almacen.num_almacen as num, almacen.localidad as localidad, producto.nombre as nombre, producto.precio as precio, almacena.cantidad as cantidad FROM almacena join producto on almacena.id_producto=producto.id_producto join almacen on almacen.num_almacen=almacena.num_almacen where almacen.num_almacen = :numero ");
            $sql1->bindParam(':numero', $num);
            $sql1->execute();

            
            echo "<H1>Productos disponibles</H1>";

            $result = $sql1->setFetchMode(PDO::FETCH_ASSOC);
            foreach($sql1->fetchAll() as $row) {

            echo  " Denominacion: " . $row["nombre"]." , Precio por unidad: " . $row["precio"]."€"." , Cantidad: " . $row["cantidad"]. "<br>";
               
            /*echo  $row["num"] . " de ".$row["localidad"]. " - Nombre del producto: " . $row["nombre"]. " - Cantidad: " . $row["cantidad"]. "<br>";*/

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