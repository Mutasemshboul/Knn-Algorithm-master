<?php
include "DBconn.php";
include "MyKNN.php";
include "apriori.php";
$sql = "select * from laptops";
$res = mysqli_query($connection,$sql);
$sql2 = "select min(Price) as minprice from laptops";
$resminprice = mysqli_query($connection,$sql2);
$MinPrice = $row=mysqli_fetch_array($resminprice)["minprice"];
//print_r($row=mysqli_fetch_array($res));


while($row=mysqli_fetch_array($res)){
    $sample[] = [$row['Manufacturer'],$row['Price'],$row['Category'],$row["RAM"],$row['CPU'],$row['GPU'],$row['Storage'],$row['ID']];
}

//print_r($sample[0][1]);
//$s=ForMin($sample,["Dell",1000,"Gaming","8GB","Intel Core i7 8550U 1.8GHz","Nvidia GeForce GTX 1050","512GB SSD + 1TB HDD"],$MinPrice);
//print_r($s);
// for($i=0;$i<100;$i++){
//     $a = $s[$i][1];
//     //print_r($s[$i]);
//     $sql = "select * from laptops where ID='$a'";
//     $res = mysqli_query($connection,$sql);
//     print_r($row=mysqli_fetch_array($res));
//     echo"<hr>";
// }


$S1 = "SELECT  DISTINCT(UserID) as UserID from Orders";

$user=mysqli_query($connection,$S1);


$arr_users = array();



while($Row = mysqli_fetch_array($user))
{
    array_push($arr_users,$Row["UserID"]);
}


$arr=[];
for($i=0;$i<count($arr_users);$i++){
    $S2=  "select ProductID from Orders where UserID='.$arr_users[$i].'";
    $res = mysqli_query($connection,$S2);
    while($row=mysqli_fetch_array($res)){
        $arr[$i][]=$row[0];
        //echo"<br>";

}

}

$apriori = new Apriori($arr, 0.5);
$apriori->mineAssociations();

$frequentItemsets = $apriori->getFrequentItemsets($arr);

//print_r($frequentItemsets);
foreach($frequentItemsets as $I=>$v){
  print_r(explode(" ",$I));
  break;
  echo"<br>";
}
//print_r($arr);




?>