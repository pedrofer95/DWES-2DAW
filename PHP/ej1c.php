<HTML>
    <HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
    <BODY>
        <?php
            // PEDRO FERNÁNDEZ GARCÍA

            $num = "168";
            $num1 = intval($num);
            $binario = "";

            while (floor($num1) > 0){
                $binario .= $num1%2;
                $num1 /= 2;
            }
            echo strrev($binario);
        ?>
    </BODY>
</HTML>