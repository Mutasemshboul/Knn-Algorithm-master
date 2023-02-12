<?php
include "DBconn.php";
include "MyKNN.php";

$sql = "select * from product";
$res = mysqli_query($connection,$sql);
$sql2 = "select min(Price) as minprice from product";
$resminprice = mysqli_query($connection,$sql2);
$MinPrice = $row=mysqli_fetch_array($resminprice)["minprice"];
//print_r($row=mysqli_fetch_array($res));


while($row=mysqli_fetch_array($res)){
    $sample[] = [$row['Name'],$row['Price'],$row['ID']];
}


$s=ForMin($sample,["fridge",1000],$MinPrice);
//print_r($s);
for($i=0;$i<count($s);$i++){
    $a = $s[$i][1];
    //echo $s[$i][1]."<br>";
    $sql = "select * from product where ID='$a'";
    $res = mysqli_query($connection,$sql);
    print_r($row=mysqli_fetch_array($res));
    echo"<hr>";
}



?>