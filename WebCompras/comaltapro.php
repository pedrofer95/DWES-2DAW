<!-- PEDRO FERNANDEZ GARCIA -->

<html>
    <head><title>Alta productos</title><meta charset="utf-8"></head>
    <body>
        <h1 class="text-center"> ALTA PRODUCTOS </h1>

    <div class="container ">
        <!--Aplicacion-->
		<div>
		<div>
		<form id="product-form" name="dpto" method="REQUEST" class="card-body">
						<div class="form-group">
                            ID de producto <input type="text" name="id" placeholder="ID producto">
                        </div>
                        <div class="form-group">
                            Nombre de producto <input type="text" name="nombre" placeholder="Nombre producto">
                        </div>
                        <div class="form-group">
                            Precio de producto <input type="text" name="precio" placeholder="Precio producto">
                        </div>
                        <div class="form-group">
                            Categoría
                            <select name=select>
                                <?php
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "rootroot";
                                    $dbname = "comprasweb";
                                
                                    try {
                                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                        // set the PDO error mode to exception
                                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                        $stmt = $conn->prepare("SELECT nombre from categoria");
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
                        <input type="submit" name="submit" value="Insertar">
                    </form>	
                    <?php
                        if (isset($_REQUEST['submit'])){
                            $servername = "localhost";
                            $username = "root";
                            $password = "rootroot";
                            $dbname = "comprasweb";
                            $id = $_REQUEST['id'];
                            $nombre = $_REQUEST['nombre'];
                            $precio = $_REQUEST['precio'];
                            $categoria = $_REQUEST['select'];
                            
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                //Con esto conseguimos el código de la categoría a partir del nombre
                                $stmt = $conn->prepare("SELECT id_categoria from categoria WHERE nombre='$categoria'");
                                $stmt->execute();
                                while ($dato = $stmt->fetch()){
                                    $cat = $dato[0];
                                }
                                
                                $sql = "INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES ('$id','$nombre','$precio','$cat')";
                                $conn->exec($sql);

                                echo "Producto añadido en $categoria con éxito";
                            }
                            catch (PDOException $e)
                            {
                                echo $sql . "<br>" . $e->getMessage();
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