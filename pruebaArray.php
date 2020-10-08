<?php
$coches = array("Volkswagen", "Citroen", "Renault", "Mercedes");

$bar = each($coches);
print_r($bar);

echo"<br>";
echo next($coches);
echo"<br>";
echo prev($coches);
echo"<br>";
echo end($coches);
echo"<br>";
echo reset($coches);

?>