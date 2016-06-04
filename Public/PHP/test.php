<?php
header("Content-type: text/html; charset=utf-8");  //设置编码字符集
$today[0]  =  date ( "Y" );
$today[1]  =  date ( "m" );
$today[2]  =  date ( "d" );                        
var_dump($today); 

echo "<br>";
$fecha = $today[0].$today[1].$today[2];
echo $fecha."<br>";
echo date('Y-m-d',strtotime("$fecha")).'<br>';
echo strtotime($fecha);