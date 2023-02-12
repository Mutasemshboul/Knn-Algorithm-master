<?php
include "DBconn.php";
include "MyKNN.php";

$sql = "select * from laptops";
$res = mysqli_query($connection,$sql);
$sql2 = "select min(Price) as minprice from laptops";
$resminprice = mysqli_query($connection,$sql2);
$MinPrice = $row=mysqli_fetch_array($resminprice)["minprice"];
//print_r($row=mysqli_fetch_array($res));


while($row=mysqli_fetch_array($res)){
    $sample[] = [$row['Manufacturer'],$row['Price'],$row['Model Name'],$row['Category'],$row['Screen Size'],$row['Screen'],$row['CPU'],$row["RAM"],$row['Storage'],$row['GPU'],$row['Weight'],$row['Operating'],$row['ID']];
}

//print_r($sample[0][1]);
$s=ForMin($sample,["Apple",1000,"Inspiron 3567","Ultrabook","13.3","Full HD 1920x1080","Intel Core i3 6006U 2GHz","64GB","128GB SSD","AMD Radeon R5 M430","Windows","2.1kg"],$MinPrice);
//print_r($s);
for($i=0;$i<4;$i++){
    $a = $s[$i][1];
    //print_r($s[$i]);
    $sql = "select * from laptops where ID='$a'";
    $res = mysqli_query($connection,$sql);
    print_r($row=mysqli_fetch_array($res));
    echo"<hr>";
}



?>