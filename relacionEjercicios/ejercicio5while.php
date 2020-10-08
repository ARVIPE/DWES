<?php
echo "<table border=1>"; 
$n = 0;
$n1=1;
$n2=1;

while($n1<=7){
    $n1++;
    echo "<tr>";
    while($n2<=5){
       $n2++;
       $n++;
        echo "<td>", $n, "</td>"; 
        
    }while($n2<=5);
    
    $n2 = 1;
 
    echo "</tr>"; 
}

echo "</table>"; 

?>  