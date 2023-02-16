<?php

// require_once __DIR__ . '/vendor/autoload.php';

// use Phpml\Classification\KNearestNeighbors;

// $samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
// $labels = ['a', 'a', 'a', 'b', 'b', 'b'];

// $classifier = new KNearestNeighbors();
// $classifier->train($samples, $labels);

// echo $classifier->predict([3, 2]);

// //return "b";


// {
//     'User_1': {'Item_1': 2,
//               'Item_3': 3},

//     'User_2': {'Item_1': 5,
//                 'Item_2': 2},

//     'User_3': {'Item_1': 3,
//                'Item_2': 3,
//                'Item_3': 1},

//     'User_4': {'Item_2': 2,
//                'Item_3': 3}
//               }


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


$json = json_encode($arr_users);

$fp = fopen('data.json', 'w');
fwrite($fp, $json);
fclose($fp);


// echo "<pre>";
//     echo json_encode($arr_users,JSON_PRETTY_PRINT);
//     echo "<pre>";
//     echo "<hr>";


?>
