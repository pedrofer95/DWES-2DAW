<!-- PEDRO FERNANDEZ GARCIA -->

<html>
    <head><title>Alta almacenes</title><meta charset="utf-8"></head>
    <body>
        <h1 class="text-center"> ALTA ALMACENES </h1>

    <div class="container ">
        <!--Aplicacion-->
		<div>
		<div>
		<form id="product-form" name="dpto" method="REQUEST" class="card-body">
						<div class="form-group">
                            Localidad <input type="text" name="localidad" placeholder="Localidad">
                        </div>
                        <input type="submit" name="submit" value="Insertar">
                    </form>	
                    <?php
                        if (isset($_REQUEST['submit'])){
                            $servername = "localhost";
                            $username = "root";
                            $password = "rootroot";
                            $dbname = "comprasweb";
                            $localidad = $_REQUEST['localidad'];
                            
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $stmt = $conn->prepare("SELECT max(substr(num_almacen, 1)) from almacen");
                                $stmt->execute();

                                while ($datos = $stmt->fetch()){
                                    $n_almacen = $datos[0];
                                }

                                $alm = str_pad(($n_almacen+10), 11, "0", STR_PAD_LEFT);
                                
                                $sql = "INSERT INTO almacen (num_almacen,localidad) VALUES ('$alm','$localidad')";
                                $conn->exec($sql);

                                echo "Almacen $alm añadido con éxito";
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