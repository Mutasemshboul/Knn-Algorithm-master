<?php

require('src/Knn.php');

$csvFileName = 'file3.csv'; //name of csv file, must containt .csv {required}
$predict = ["Mutasem",10]; //predict {required}
$key = 3; //key {optional: default is 3}
$inputToCsv = false; //true, so the result will be inputed to csv file as the new sample. {optional: default is false}

$data = new KnnCsv($csvFileName, $predict, $key, $inputToCsv);
echo $data->result;



echo getHostByName(getHostName());

// Check if the "mobile" word exists in User-Agent 
$isMob = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "mobile")); 
  
// Check if the "tablet" word exists in User-Agent 
$isTab = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "tablet")); 
 
// Platform check  
$isWin = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "windows")); 
$isAndroid = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "android")); 
$isIPhone = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "iphone")); 
$isIPad = is_numeric(strpos(strtolower($_SERVER["HTTP_USER_AGENT"]), "ipad")); 
$isIOS = $isIPhone || $isIPad; 
 
if($isMob){ 
    if($isTab){ 
        echo 'Using Tablet Device...'; 
    }else{ 
        echo 'Using Mobile Device...'; 
    } 
}else{ 
    echo 'Using Desktop...'; 
} 
 
if($isIOS){ 
    echo 'iOS'; 
}elseif($isAndroid){ 
    echo 'ANDROID'; 
}elseif($isWin){ 
    echo 'WINDOWS'; 
}