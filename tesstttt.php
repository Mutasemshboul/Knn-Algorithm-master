<?php
#shell_exec("python fast2.py");
//include 'testosama.php';
//include 'runpy.php';
include 'DBconn.php';
$connection = new mysqli('localhost','root','','gd_project');
if(!$connection){
    die(mysqli_error($connection));
}




$arr_users=array();

$S1 = "SELECT DISTINCT(user_id) from user_ratings;";

$user=mysqli_query($connection,$S1);

while($row = mysqli_fetch_assoc($user))
{
    $arr_users[$row['user_id']]=array();
}




$arr_item=array();
foreach($arr_users as $key=>$val)
{
    $S2 = "SELECT item_id, rating FROM user_ratings WHERE user_id = $key";

    $item=mysqli_query($connection,$S2);

    $arr_item=array();
    while($row=mysqli_fetch_assoc($item))
    {
        
        $item_id = $row['item_id'];
        $rating = (int)$row['rating'];

        $arr_item[$item_id] = $rating;

     
    }
   
    // echo "<hr>";
    $arr_users[$key] = $arr_item;

    

    
}


$json = Json_encode($arr_users,JSON_PRETTY_PRINT);



$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://127.0.0.1:8000/get-item/1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>"$json",
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$j = json_decode($response, true);
print_r("Recommendation Using Item based Collaborative Filtering: ". $j[0]['Item']);

