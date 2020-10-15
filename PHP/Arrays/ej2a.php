<html>
    <head> 
        <meta charset="utf-8"/>

    </head>
    <body>
        <?php 
            // PEDRO FERNÁNDEZ GARCíA

            $impares=array();
            $cont=0;

            for ($z = 1; $z <= 39; $z+=2){
                $impares[$cont] = $z;
                $cont++;
            }
            
            $suma = 0;
            $arrlength = count($impares);
            $sumapares = 0;
            $sumaimpares = 0;
            echo "<table border='1'>
            <tr>
                <th>Indice</th>
                <th>Valor</th>
                <th>Suma</th>
            </tr>";
            for ($x = 0;$x <= $arrlength-1;$x++){
                $suma += $impares[$x]; 
                if ($x%2 == 0){
                    $sumapares += $impares[$x];
                }
                else{
                    $sumaimpares += $impares[$x];
                }
                echo "<tr>
                    <td>$x</td>
                    <td>$impares[$x]</td>
                    <td>$suma</td>
                </tr>";
            }
            $mediapares = $sumapares / ($arrlength/2);
            $mediaimpares = $sumaimpares / ($arrlength/2);
            echo "<tr><th colspan='3'>Media pares: $mediapares</th></tr>";
            echo "<tr><th colspan='3'>Media impares: $mediaimpares</th></tr>";
            echo "</table>";
        ?>
    </body>
</html>