<!DOCTYPE html>
<html>
<head>
    <title>Añadir Productos a un Almacén</title>
    <meta charset="utf-8" />
    <meta name="author" value="Marco Santiago" />
</head>
<body>
    <h1>Añadir Productos a un Almacén</h1>
    <p><a href="index.html">Volver al Menú</a></p><br><br>

    <?php  
    try {
        $servername = "localhost";
        $username = "root";
        $password = "rootroot";
        $dbname = "comprasweb";
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $productos = $conn->prepare("SELECT * FROM producto");
        $productos->execute();
        $productos->fetchAll(PDO::FETCH_ASSOC);
        $almacenes = $conn->prepare("SELECT * FROM almacen");
        $almacenes->execute();
        $almacenes->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $ex) {
        echo "<p>Ha ocurrido un error al devolver los datos de los Productos: <span style='color: red; font-weight: bold;'>". $ex->getMessage()."</span></p></br>";
        return null;
    
    }
    ?>
	<form action='<?php echo htmlentities($_SERVER["PHP_SELF"]);?>' method='post'>
        <label for="almacen">Almacen</label>
        <select name="almacen" required>
            <option disabled selected>Selecciona un Almacén</option>
            <?php
                foreach($almacenes as $almacen) {
                    echo "<option value='". $almacen["NUM_ALMACEN"] ."'>[". $almacen["NUM_ALMACEN"] ."]: ". $almacen["LOCALIDAD"] ."</option>";
                }
            ?>
        </select><br />

        <label for="producto">Producto</label>
        <select name="producto" required>
            <option disabled selected>Selecciona un Producto</option>
            <?php
                foreach($productos as $producto) {
                    echo "<option value='". $producto["ID_PRODUCTO"] ."'>[". $producto["ID_PRODUCTO"] ."]: ". $producto["NOMBRE"] ."</option>";
                }
            ?>
        </select><br />

        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" required /> <br />

        <input type="submit" name="enviar" id="enviar" value="Enviar">
    </form>  
    

    <?php
        if (isset($_POST) && !empty($_POST)) {

            $almacen = $_POST["almacen"];
            $producto = $_POST["producto"];
            $cantidad = $_POST["cantidad"];

            if ( agregarProductosAlmacen($almacen, $producto, $cantidad) ) {
                echo "<p>Se ha añadido un total de ". $cantidad ." unidad(es) del producto al almacén.</p>";
            } // Si la función devuelve FALSE, es la propia función quien muestra el mensaje de error
        }
    ?>
  
</body>