<html>
    <head> 
        <meta charset="utf-8"/>

    </head>
    <body>
        <?php  
            // PEDRO FERNÁNDEZ GARCÍA

            $arrayasociativo = array ("Pedro"=>"9","Carlos"=>"7","Alex"=>"7","Marco"=>"6","Rubén"=>"8");

            // APARTADO A
            echo "Máximo: ".max($arrayasociativo)."<br>";
            
            // APARTADO B
            echo "Minimo: ".min($arrayasociativo)."<br>";
            
            // APARTADO C
            echo "Media: ".array_sum($arrayasociativo) / count($arrayasociativo)."<br>";
            ?>
    </body>
</html>