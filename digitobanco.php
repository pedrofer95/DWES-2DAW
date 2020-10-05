<HTML>
    <HEAD>
        <TITLE> DIGITO CUENTA BANCARIA </TITLE>
        <meta charset="UTF-8"/>
    </HEAD>
    <BODY>
        <?php
            //PEDRO FERNÁNDEZ GARCÍA

            $entidad = "0182";
            $sucursal = "4221";
            $dc;
            $cuenta = "2445183901";

            //Cálculo primer digito
            $suma1 = (substr($entidad,0,1)*4) + (substr($entidad,1,1)*8) + (substr($entidad,2,1)*5) + (substr($entidad,3,1)*10);
            $suma2 = (substr($sucursal,0,1)*9) + (substr($sucursal,1,1)*7) + (substr($sucursal,2,1)*3) + (substr($sucursal,3,1)*6);

            $dc1 = 11 - (($suma1 + $suma2) % 11);
            if ($dc1 == 10){
                $dc1 = 1;
            }
            
            //Cálculo segundo dígito
            $suma3 = (substr($cuenta,0,1)*1) + (substr($cuenta,1,1)*2) + (substr($cuenta,2,1)*4) + (substr($cuenta,3,1)*8) + (substr($cuenta,4,1)*5) + (substr($cuenta,5,1)*10) + (substr($cuenta,6,1)*9) + (substr($cuenta,7,1)*7) + (substr($cuenta,8,1)*3) + (substr($cuenta,9,1)*6);
            
            $dc2 = 11 - ($suma3 % 11);
            if ($dc2 == 10){
                $dc2 = 1;
            }

            echo "Entidad $entidad<br>";
            echo "Sucursal $sucursal<br>";
            echo "DC $dc1$dc2<br>";
            echo "Cuenta $cuenta<br><br>";
            
            echo "Cuenta entera: $entidad $sucursal $dc1$dc2 $cuenta";
        ?>
    </BODY>
</HTML>