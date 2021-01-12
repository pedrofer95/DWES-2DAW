<!-- PEDRO FERNANDEZ GARCIA -->

<html>
    <head><title>Compra productos</title><meta charset="utf-8"></head>
    <body>
        <h1 class="text-center"> COMPRA PRODUCTOS </h1>

    <div class="container ">
        <!--Aplicacion-->
		<div>
		<div>
		<form id="product-form" name="dpto" method="REQUEST" class="card-body">
						<div class="form-group">
                            DNI de cliente <input type="text" name="dni" placeholder="DNI cliente">
                        </div>
                        <div class="form-group">
                            Producto a comprar
                            <select name=select>
                                <option></option>
                                <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "rootroot";
                                    $dbname = "comprasweb";
                                
                                    try {
                                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                        // set the PDO error mode to exception
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                        $stmt = $conn->prepare("SELECT nombre from producto");
                                        $stmt->execute();
                                
                                        while ($datos = $stmt->fetch()){
                                            echo "<option>$datos[0]</option>";
                                        }
                                        }
                                    catch (PDOException $e)
                                        {
                                        echo $sql . "<br>" . $e->getMessage();
                                        }
                                    
                                    $conn = null;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            Cantidad de producto <input type="text" name="cantidad" placeholder="Cantidad Producto">
                        </div>
                        <input type="submit" name="submit" value="Comprar">
                    </form>	
                    <?php
                        if (isset($_REQUEST['submit'])){
                            $servername = "localhost";
                            $username = "root";
                            $password = "rootroot";
                            $dbname = "comprasweb";
                            $dni = $_REQUEST['dni'];
                            $cantidad = $_REQUEST['cantidad'];
                            $nombre = $_REQUEST['select'];
                            $fecha = getdate()['year']."-".getdate()['mon']."-".getdate()['mday']." ".getDate()['hours'].":".getDate()['minutes'].":".getDate()['seconds'];
                            $idprod = "";
                            $cantidadstock = "";
                            
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                // Con estas dos sentencias conseguimos la cantidad disponible del producto a comprar
                                $stmt = $conn->prepare("SELECT id_producto from producto where nombre like :nombre");
                                $stmt->execute(array("nombre" => $nombre));
                                $resultado = $stmt->fetchAll();
                                foreach ($resultado as $res){
                                    $idprod = $res[0];
                                }
                                
                                $stmt = $conn->prepare("SELECT cantidad from almacena where id_producto='$idprod'"); 
                                $stmt->execute();
                                $resultado = $stmt->fetchAll();
                                foreach ($resultado as $res){
                                    $cantidadstock = $res[0];
                                }

                                // Añadimos la compra a la tabla compra
                                if ($cantidadstock >= $cantidad){
                                    $sql3 = "INSERT into compra(nif,id_producto,fecha_compra,unidades) VALUES ('$dni','$idprod','$fecha','$cantidad')";
                                    $conn->exec($sql3);
                                    // Tambien tendremos que actualizar el stock en los almacenes
                                    $sql4 = "UPDATE almacena set cantidad=($cantidadstock-$cantidad) where id_producto='$idprod'";
                                    $conn->exec($sql4);
                                    echo "Compra realizada con éxito";
                                }
                                else{
                                    echo "No hay stock suficiente del producto en los almacenes";
                                }
                            }
                            catch (PDOException $e)
                            {
                                echo $e->getMessage();
                            }
                            
                            $conn = null;
                        }
                    ?>
	</div>
        </div>
        <br>
    </div>
    </body>
</html>