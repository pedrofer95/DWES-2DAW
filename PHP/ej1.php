<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
<?php
//Vamos a hacer una calculadora
//Definimos las variables
$num1 = 6;
$num2 = -3.2;

//Definimos las operaciones
$suma = $num1+$num2;
$resta = $num1-$num2;
$producto = $num1*$num2;
$division = $num1/$num2;

//Imprimimos los números que vamos a utilizar
echo "El primer número sera ".$num1." y su tipo es ".gettype($num1)."<br>";
print "El segundo número sera ".$num2." y su tipo es ".gettype($num2)."<br><br><br>";

//Imprimimos los resultados
echo "La suma de los dos números es ".$suma.", siendo su tipo ".gettype($suma)."<br>";
print "La resta de los dos números es ".$resta.", siendo su tipo ".gettype($resta)."<br>";
echo "El producto de ".$num1." y ".$num2." es ".$producto.", siendo su tipo ".gettype($producto)."<br>";
printf ("La división de %s y de %s es %s, siendo su tipo %s ",$num1,$num2,$division,gettype($division));
?>
</body>
</html>