<html>
    <head> 
        <meta charset="utf-8"/>

    </head>
    <body>
        <?php 
            // PEDRO FERNÁNDEZ GARCíA

            $impares=array(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39);
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