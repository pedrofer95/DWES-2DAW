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

            $arraybinarios = array_reverse($impares);
            
            for ($r = 0; $r < count($arraybinarios); $r++){
                $arraybinarios[$r] = decbin($arraybinarios[$r]);
            }
            echo "Array invertido y convertido a binario: <br>";
            for ($y = 0; $y < count($arraybinarios); $y++){
                echo $arraybinarios[$y].", ";
            }
        ?>
    </body>
</html>