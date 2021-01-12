<!-- PEDRO FERNANDEZ GARCIA -->

<html>
    <head><title>Comsulta compras</title><meta charset="utf-8"></head>
    <body>
        <h1 class="text-center"> CONSULTA COMRPAS </h1>

    <div class="container ">
        <!--Aplicacion-->
		<div>
		<div>
		<form id="product-form" name="dpto" method="REQUEST" class="card-body">
						<div class="form-group">
                            DNI cliente
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
                                    
                                            $stmt = $conn->prepare("SELECT nif from cliente");
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
                            <br>Introduce las fechas de inicio y final del periodo de compras a consultar <br>
                            Fecha inicio <input type="text" name="finicio" placeholder="AAAA-MM-DD">
                        </div>
                        <div class="form-group">
                            Fecha final <input type="text" name="ffinal" placeholder="AAAA-MM-DD">
                        </div>
                        <input type="submit" name="submit" value="Insertar">
                    </form>	
                    <?php
                        if (isset($_REQUEST['submit'])){
                            $servername = "localhost";
                            $username = "root";
                            $password = "rootroot";
                            $dbname = "comprasweb";
                            $dni = $_REQUEST['select'];
                            $finicio = $_REQUEST['finicio'];
                            $ffinal = $_REQUEST['ffinal'];
                            
                            try {
                                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                                // set the PDO error mode to exception
                                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                $stmt = $conn->prepare("SELECT producto.id_producto, producto.nombre, producto.precio, compra.unidades from producto INNER JOIN compra ON compra.id_producto = producto.id_producto where compra.nif like '$dni' and compra.fecha_compra BETWEEN '$finicio' AND '$ffinal'");
                                $stmt->execute();

                                echo "<table border='1'>";
                                echo "<tr><th>ID</th><th>NOMBRE</th><th>PRECIO</th><th>UNIDADES</th></tr>";
                                foreach ($stmt as $res){
                                    echo "<tr>";
                                    echo "<td>$res[0]</td>";
                                    echo "<td>$res[1]</td>";
                                    echo "<td>$res[2]€</td>";
                                    echo "<td>$res[3]</td>";
                                    echo "</tr>";
                                }
                                echo "</table>";
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