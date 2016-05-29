<?php
$pizza   =  "piece1 piece2 piece3 piece4 piece5 piece6" ;
$pieces  =  explode ( "piece2" ,  $pizza )[0];
echo  $pieces;  // piece1
//echo  $pieces [ 1 ];  // piece2