<html>
    <head> 
        <meta charset="utf-8"/>

    </head>
    <body>
        <?php  

            // PEDRO FERNÁNDEZ GARCÍA

            $impares=array(1,3,5,7,9,11,13,15,17,19,21,23,25,27,29,31,33,35,37,39);
            $suma = 0;
            echo "<table border='1'>
            <tr>
                <th>Indice</th>
                <th>Valor</th>
                <th>Suma</th>
            </tr>";
            for ($x = 0;$x <= count($impares)-1;$x++){
                $suma += $impares[$x]; 
                echo "<tr>
                    <td>$x</td>
                    <td>$impares[$x]</td>
                    <td>$suma</td>
                </tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>