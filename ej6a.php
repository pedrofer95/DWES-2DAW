<html>
    <head> 
        <meta charset="utf-8"/>

    </head>
    <body>
        <?php  
            // PEDRO FERNÁNDEZ GARCÍA

            $array1 = array("Bases Datos","Entornos Desarrollo","Programación");
            $array2 = array("Sistemas Informáticos","FOL","Mecanizado");
            $array3 = array("Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés");
            echo "<br>";

            // COJO EL ARRAY CREADO CON ARRAY_MERGE PORQUE ES LA MANERA QUE MAS ME HA GUSTADO
            $mergedarray = array_merge($array1,$array2,$array3);

            $mergedarray[array_search("Mecanizado",$mergedarray)] = "";

            $alreves = array_reverse($mergedarray);

            for ($x = 0; $x < count($alreves); $x++){
                echo $alreves[$x]."<br>";
            }
            echo "<br><br>";
        ?>
    </body>
</html>