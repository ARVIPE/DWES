<?php
echo "<table border=1>"; 
$n = 0;
$n1=1;
$n2=1;

do {
    $n1++;
    echo "<tr>";
    do {
       $n2++;
       $n++;
        echo "<td>", $n, "</td>"; 
        
    }while($n2<=5);
    
    $n2 = 1;
 
    echo "</tr>"; 
}while($n1<=7);

echo "</table>"; 

?> 