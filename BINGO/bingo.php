<html>
    <head> <meta chatset="utf-8"/> </head>
    <body>
        <?php
            // PEDRO FERNÁNDEZ GARCÍA
            
            $jugadores = array();

            for ($x = 1; $x < 5; $x++){ // Creamos los 4 jugadores y los metemos en $jugadores
                $jugadores["Jugador".$x] = array(); // Metemos un array en cada jugador (donde irán los cartones)

                for ($y = 1; $y < 4; $y++){ //Crear 3 cartones
                    $jugadores["Jugador".$x]["Carton".$y] = array(); // Se meten en cada jugador 3 cartones (arrays)

                    for ($z = 0; $z < 15; $z++){ //Generamos 15 números
                        do{
                            $num = rand(1,60);  //Número aleatorio del 1 al 60
                        } while(in_array($num,$jugadores["Jugador".$x]["Carton".$y]));  //Generará aleatorios mientras no este repetido
                        $jugadores["Jugador".$x]["Carton".$y][$z] = $num."  ";  //Insertamos el número (previamente comprobado que no esta repetido) en el cartón
                    }
                } 
            }
            var_dump($jugadores);
        ?>
    </body>
</html>