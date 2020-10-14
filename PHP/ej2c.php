<HTML>
    <HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD>
    <BODY>
        <?php
            // PEDRO FERNÁNDEZ GARCÍA

            $num="48";
            $num1 = intval($num);
            $base="8";
            $base1 = intval($base);
            $solbase = "";

            while (floor($num1) > 0){
                $solbase .= $num1 % $base1;
                $num1 /= $base1;
            }

            echo strrev($solbase);
        ?>
    </BODY>
</HTML>