<?php
echo "<table border=1>"; 
$n = 0;
for ($n1=1; $n1<=7; $n1++){
    echo "<tr>";
    for ($n2=1; $n2<=5; $n2++){
       $n++;
        echo "<td>", $n, "</td>"; 
        
    }
 
    echo "</tr>"; 
}

echo "</table>"; 

?> 