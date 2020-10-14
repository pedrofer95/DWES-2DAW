<html>
    <head> 
        <meta charset="utf-8"/>

    </head>
    <body>
        <?php  
            // PEDRO FERNÁNDEZ GARCÍA

            $arrayasociativo = array ("Pedro"=>"25","Carlos"=>"20","Alex"=>"27","Marco"=>"23","Rubén"=>"22");

            // APARTADO A
            foreach ($arrayasociativo as $indice => $valor){
                echo "Indice: ".$indice.", Valor: ".$valor."<br>";
            }

            // APARTADO B
            /* Al ser un array asociativo, no se puede situar el puntero en la segunda posición del array a no ser que sepamos el indice. En este caso sabemos que la segunda posición es Carlos => 20. Pero no podemos situar el punter sin saber el nombre del índice*/
            echo "<br>";
            echo $arrayasociativo["Carlos"];

            // APARTADO C
            /* Al no haber el hecho el apartado B, no podemos hacer éste punto. Además, para avanzar la posición, al ser un array asociativo, seguimos necesitando saber el nombre del índice */
            echo "<br>";
            echo $arrayasociativo["Alex"];

            // APARTADO D
            /* Estamos en las mismas, al no ser un array indexado, no podemos colocarlo en le 'ultima' posición sin saber el nombre del índice */
            echo "<br>";
            echo $arrayasociativo["Rubén"]."<br><br>";

            // APARTADO E
            asort($arrayasociativo);
            foreach ($arrayasociativo as $indice => $valor){
                echo "Indice: ".$indice.", Valor: ".$valor."<br>";
            }
            ?>
    </body>
</html>