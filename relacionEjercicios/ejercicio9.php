<?php
$a = 2;
$b = 5;
$c = 3;

if($a > $b && $a > $c){
    echo $a;
    if($b > $c){
    echo $b;
    echo $c;
}
if($c > $b){
    echo $c;
    echo $b;
}
}

if($b > $a && $b > $c){
    echo $b;
    if($a > $c){
    echo $a;
    echo $c;
}
if($c > $a){
    echo $c;
    echo $a;
}
}

if($c > $b && $c > $a){
    echo $c;
    if($b > $a){
    echo $b;
    echo $a;
}
if($a > $b){
    echo $a;
    echo $b;
}
}




?>