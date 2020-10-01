<HTML>
<HEAD><TITLE> EJ2-Direccion Red – Broadcast y Rango</TITLE></HEAD>
<BODY>
    <?php
        // PEDRO FERNANDEZ GARCIA

        $ip="192.168.16.100/16";

        //Operaciones
        $posm=strpos($ip,"/",0);    //Posicion 14
        $mascara=substr($ip,$posm+1);   //Saca la mascara (16)
        $subip=substr($ip,0,$posm);

        //Cogemos la IP y la convertimos a binario
        $pos1=strpos($subip,".", 0);  //3
        $pos2=strpos($subip,".",$pos1+1);  //6
        $pos3=strpos($subip,".",$pos2+1);  //9
        $pos4=strpos($subip,"/",0);    //14

        $ip1=substr($subip,0,$pos1);
        $ip2=substr($subip,$pos1+1,$pos2-($pos1+1));
        $ip3=substr($subip,$pos2+1,$pos3-($pos2+1));
        $ip4=substr($subip,$pos3+1,3);


        //Completamos con 0's a la izquierda y creamos el binario entero
        $ip1bin=str_pad(decbin($ip1),8,"0",STR_PAD_LEFT);
        $ip2bin=str_pad(decbin($ip2),8,"0",STR_PAD_LEFT);
        $ip3bin=str_pad(decbin($ip3),8,"0",STR_PAD_LEFT);
        $ip4bin=str_pad(decbin($ip4),8,"0",STR_PAD_LEFT);
        $ipbinario=$ip1bin.$ip2bin.$ip3bin.$ip4bin;

        $ipred=substr($ipbinario,0,$mascara); //IPRED será la parte fija de la direccion red
        
        //HACEMOS LA DIRECCION RED
        $ipredfinalb=str_pad($ipred,32,"0",STR_PAD_RIGHT); //Cogemos la parte fija y rellenamos con 0's a la derecha
        $ipred1=bindec(substr($ipredfinalb,0,8));
        $ipred2=bindec(substr($ipredfinalb,8,8));
        $ipred3=bindec(substr($ipredfinalb,16,8));
        $ipred4=bindec(substr($ipredfinalb,24,8));
        $ipredfinaldec=$ipred1.".".$ipred2.".".$ipred3.".".$ipred4;

        $ipredrango=$ipred1.".".$ipred2.".".$ipred3.".".(bindec(substr($ipredfinalb,24,8))+1);

        //HACEMOS LA DIRECCION BROADCAST
        $ipbroadcastb=str_pad($ipred,32,"1",STR_PAD_RIGHT); //Rellenamos con 1's a la derecha
        $ipbroadcast1=bindec(substr($ipbroadcastb,0,8));
        $ipbroadcast2=bindec(substr($ipbroadcastb,8,8));
        $ipbroadcast3=bindec(substr($ipbroadcastb,16,8));
        $ipbroadcast4=bindec(substr($ipbroadcastb,24,8));
        $ipbroadcastfinal=$ipbroadcast1.".".$ipbroadcast2.".".$ipbroadcast3.".".$ipbroadcast4;
        $ipbroadcastrango=$ipbroadcast1.".".$ipbroadcast2.".".$ipbroadcast3.".".(bindec(substr($ipbroadcastb,24,8))-1);


        //Pruebas
        #echo $ip1."<br>";
        #echo $ip1bin."<br>";
        #echo $ip2bin."<br>";
        #echo $ip3bin."<br>";
        #echo $ip4bin."<br>";
        #echo $ip2."<br>";
        #echo $ip3."<br>";
        #echo $ip4."<br>";
        #echo $posm."<br>";
        #echo $mascara."<br>";
        #echo $ipbinario."<br>";
        #echo $subip."<br>";
        #echo $ipred."<br>";
        #echo $ipredfinalb."<br>";
        #echo $ipred1."<br>";
        #echo $ipred2."<br>";
        #echo $ipred3."<br>";
        #echo $ipred4."<br>";
        #echo $ipredfinaldec;
        

        //Solucion
        echo "Direccion IP: $ip<br>";
        echo "Mascara: $mascara<br>";
        echo "Direccion Red: $ipredfinaldec<br>";
        echo "Direccion Broadcast: $ipbroadcastfinal<br>";
        echo "Rango: $ipredrango a $ipbroadcastrango";
    ?>
</BODY>
</HTML>