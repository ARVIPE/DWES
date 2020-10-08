<?php
define('TAM',10); //definimos la constante para el tamaño
echo "<table border=1>"; //creamos la tabla
$n=1;
for ($n1=1; $n1<=TAM; $n1++)
{
 for ($n2=1; $n2<=TAM; $n2++)
 {
 echo "<td>", $n, "</td>"; //creamos una celda y mostramos el número
 $n=$n+1; //sumamos 1 al número mostrado para la siguiente vuelta del bucle
 }
 echo "</tr>"; //cerramos la fila
}
echo "</table>"; //cerramos la tabla
?>