<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
    <?php
        $ip="192.18.16.204";

        $pos1=strpos($ip,".", 0);  //3
        $pos2=strpos($ip,".",$pos1+1);  //6
        $pos3=strpos($ip,".",$pos2+1);  //9

        $ip1=substr($ip,0,$pos1);
        $ip2=substr($ip,$pos1+1,$pos2-($pos1+1));
        $ip3=substr($ip,$pos2+1,$pos3-($pos2+1));
        $ip4=substr($ip,$pos3+1);

        echo "Vamos a convertir $ip a una direccion IP en binario <br><br>";
        printf ("%b.%b.%b.%b",$ip1,$ip2,$ip3,$ip4);
    ?>
</BODY>
</HTML>