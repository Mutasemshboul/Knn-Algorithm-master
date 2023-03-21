<?php
// Dell 8gb RTX i 7
$ram = "8";
$cpu = "i7";
$manf = "Dell";

$RAM = "RAM";
$CPU = "CPU";
$MANF = "Manufacturer";


//$sql = "select * from labtop where $RAM and $cpu";



$sql="select * from labtop where ";

if($ram){
  $sql.="RAM likes $ram or ";
}
if($cpu){
  $sql.="CPU likes $cpu or ";
}
if($manf){
  $sql.="Manufacturer likes $manf or ";
}

//
// $str= preg_replace('/\W\w+\s(\W)$/', 'and', $sql);
// echo $str;
// $c=strlen($sql)-3;

// $sql2 = "";
// echo $sql;
$s = substr($sql,0,strlen($sql)-4);
echo $s;

// $a = explode(" ",$sql);
// array_pop($a);
// $a1 = implode(" ",$a);
// echo $a1;


?>