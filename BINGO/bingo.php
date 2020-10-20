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
            //var_dump($jugadores);

            // Vamos a hacer el bombo. Para eso tendremos un array vacio que llenaremos con numeros random de 1 a 60 sin repetirse hasta que no haya mas números entre 1 y 60
            $llenarBombo = array();  // Bombo que se va a llenar
            $ganaj1 = array(0,0,0);  // 4 arrays de conteo de números acertados por cartón (de 0 15)
            $ganaj2 = array(0,0,0);
            $ganaj3 = array(0,0,0);
            $ganaj4 = array(0,0,0);
            for ($m = 0; $m < 60; $m++){  // For para sacar las 60 bolas
                do{
                    $numAl = rand(1,60);  // Genera un random del 1 al 60
                } while (in_array($numAl,$llenarBombo));  // Si esta repetido, sige generando hasta que no este repetido
                array_push($llenarBombo,$numAl);  // Meto el numero en el array
                echo "<img src='./bolas/$numAl.PNG'/><br>";  // Imprimo la bola (solo me imprime la última, no se por que)
                for ($n = 1; $n < 5; $n++){  // De 1 a 4 jugadores
                    for ($o = 1; $o < 4; $o++){  // De 1 a 3 cartones
                        for ($p = 0; $p < 15; $p++){  // De 1 a 15 numeros por carton
                            if (in_array($numAl,$jugadores["Jugador".$n]["Carton".$o])){  // Si esta el numero generado en el array...
                                if ($n == 1){  // Si es el jugador 1
                                    $ganaj1[$o-1] = $ganaj1[$o-1] + 1;  // Suma 1 al conteo de aciertos
                                    if ($ganaj1[$o-1] == 15){  // Si esta el carton completo, imprime que ha ganado
                                        echo "Ha ganado el jugador $n con el carton ".$o."<br>";
                                    }
                                }
                                // A partir de aqui, es igual que con el jugador 1, pero con los demas hasta el jugador 4
                                if ($n == 2){
                                    $ganaj2[$o-1] = $ganaj2[$o-1] + 1;
                                    if ($ganaj2[$o-1] == 15){
                                        echo "Ha ganado el jugador $n con el carton ".$o."<br>";
                                    }
                                }
                                if ($n == 3){
                                    $ganaj3[$o-1] = $ganaj3[$o-1] + 1;
                                    if ($ganaj3[$o-1] == 15){
                                        echo "Ha ganado el jugador $n con el carton ".$o."<br>";
                                    }
                                }
                                if ($n == 4){
                                    $ganaj4[$o-1] = $ganaj4[$o-1] + 1;
                                    if ($ganaj4[$o-1] == 15){
                                        echo "Ha ganado el jugador $n con el carton ".$o."<br>";
                                    }
                                }
                                // Si alguno de los cartones ha llegado a 15 (es decir, que esta completo), aumento las variables de los FOR para que se salga de todos
                                if ($ganaj1[$o-1] == 15 || $ganaj2[$o-1] == 15 || $ganaj3[$o-1] == 15 || $ganaj4[$o-1] == 15){
                                    $m = 70;
                                    $n = 70;
                                    $o = 70;
                                    $p = 70;
                                }
                            }
                        }
                    }
                }
            }

            // var_dump($jugadores["Jugador3"]["Carton2"]);

            // var_dump($llenarBombo);
            

        ?>
    </body>
</html>