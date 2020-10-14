<HTML>
    <HEAD><TITLE> EJ3B – Conversor Decimal a base 16</TITLE></HEAD>
    <BODY>
        <?php
            // PEDRO FERNÁNDEZ GARCÍA

            $num="48";
            $num1 = intval($num);
            $base="16";
            $base1 = intval($base);
            $hexa = "";
            $a;
            $c;

            $valido = true;

            while (valido){
                $c = $num1 / 16;
                $a = $num1 - ($c*16);
                $num1 = $c;

                switch ($a){
                    case 0: $hexa .= "0"; break;
                    case 1: $hexa .= "1"; break;
                    case 2: $hexa .= "2"; break;
                    case 3: $hexa .= "3"; break;
                    case 4: $hexa .= "4"; break;
                    case 5: $hexa .= "5"; break;
                    case 6: $hexa .= "6"; break;
                    case 7: $hexa .= "7"; break;
                    case 8: $hexa .= "8"; break;
                    case 9: $hexa .= "9"; break;
                    case 10: $hexa .= "A"; break;
                    case 11: $hexa .= "B"; break;
                    case 12: $hexa .= "C"; break;
                    case 13: $hexa .= "D"; break;
                    case 14: $hexa .= "E"; break;
                    case 15: $hexa .= "F"; break;
                }
                if ($num1 < 16){
                    $valido = false;
                }
            }
            echo $hexa;
        ?>
    </BODY>
</HTML>