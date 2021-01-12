<!-- LUCAS FADAVI -->

<HTML>
    <HEAD> 
        <TITLE> Alta de productos </TITLE>
        <meta charset="utf-8">   
        <meta name="author" content="Lucas Fadavi">
    </HEAD>
<BODY>

    <H1> Alta productos </H1>

<?php

    #Lucas Fadavi Solanilla

       include_once 'funcionesWebC.php';
  
    try {

       //Conexion establecida con la base de datos comprasweb
       $conn=connectDBcomprasweb();
    
       
        if (!isset($_POST) || empty($_FILES['fichero'])){ 

             echo "Click en seleccionar archivo para elegir un fichero: ";
?>            
    
        <form name='productos' enctype="multipart/form-data" action='comaltaprofich.php' method='POST'>
        
        <br>
        <input type="file" name="fichero" placeholder="Subir fichero">
        <input type="submit" value="Alta productos">    

        </FORM>
<?php        
        }else{
        
            $path = "./files/";
            $path = $path . basename( $_FILES['fichero']['name']);
        
            if(move_uploaded_file($_FILES['fichero']['tmp_name'], $path)) {
              echo "El fichero ".  basename( $_FILES['fichero']['name']). 
                  
              " se ha subido correctamente <br><br>";
                
            } else{
                
                echo "Se ha producido un error en la subida, por favor intentalo de nuevo!<br><br>";
                
            }    

            $sql = $conn->prepare("INSERT INTO producto (id_producto, nombre, precio, id_categoria) VALUES (:id_producto, :nombre, :precio, :id_categoria)");
            $fichero = fopen($path, "r"); 
            $leido = fgets($fichero); 

               while (!feof($fichero)) { 

                    /* Leemos la Línea */
                    $leido = fgets($fichero); 

                    /* Explode para quitar el caracter delimitador */
                    $data = explode("#", $leido); 

                    $id_producto = $data[0];
                    $nombre = $data[1];
                    $precio = $data[2];
                    $id_categoria = $data[3];
                   
                    $sql->bindParam(':id_producto', $id_producto);
                    $sql->bindParam(':nombre', $nombre);
                    $sql->bindParam(':precio', $precio);
                    $sql->bindParam(':id_categoria', $id_categoria);
                    $sql->execute();
                
                    //echo "Producto dado de alta".$conn-> lastInsertId()."<br>";
                   
                }
                echo "Todos los productos han sido dados de alta <br>";
            
            fclose($fichero);
            }
           
    }catch(PDOException $e)
        {  
         echo "Se ha producido el siguiente Error :  " . $e->getMessage();
        }

        $conn = null;   
?>

</BODY>
</HTML>