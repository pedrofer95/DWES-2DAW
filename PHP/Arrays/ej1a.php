<html>
    <head> 
        <meta charset="utf-8"/>

    </head>
    <body>
        <?php  

            // PEDRO FERNÁNDEZ GARCÍA

            $impares=array();
            $cont=0;

            for ($z = 1; $z <= 39; $z+=2){
                $impares[$cont] = $z;
                $cont++;
            }

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