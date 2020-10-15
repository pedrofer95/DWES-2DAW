<html>
    <head> 
        <meta charset="utf-8"/>

    </head>
    <body>
        <?php  
            // PEDRO FERNÁNDEZ GARCÍA

            $impares=array();
            $cont=0;

            for ($z = 1; $z <= 19; $z++){
                $impares[$cont] = $z;
                $cont++;
            }

            echo "<table border='1'>
            <tr>
                <th>Indice</th>
                <th>Binario</th>
                <th>Octal</th>
            </tr>";
            for ($x = 0;$x <= count($impares)-1;$x++){
                echo "<tr>
                    <td>$x</td>
                    <td>".decbin($impares[$x])."</td>
                    <td>".decoct($impares[$x])."
                </tr>";
            }
            echo "</table>";
        ?>
    </body>
</html>