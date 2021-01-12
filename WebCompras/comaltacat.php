<html>
    <head><title>Crear Categorias</title><meta charset="utf-8"></head>
    <body>
        <h1 class="text-center"> ALTA CATEGORIAS </h1>

    <div class="container ">
        <!--Aplicacion-->
		<div>
		<div>
		<form id="product-form" name="dpto" method="REQUEST" class="card-body">
						<div class="form-group">
                            ID de categoria <input type="text" name="id" placeholder="ID categoría">
                        </div>
                        <div class="form-group">
                            Nombre de categoria <input type="text" name="nombre" placeholder="Nombre Categoría">
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
                            
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                
                                $sql = "INSERT INTO categoria (id_categoria,nombre) VALUES ('$id','$nombre')";
                                $conn->exec($sql);

                                echo "Categoría añadida con éxito";
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