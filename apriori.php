<?php

include 'DBconn.php';


  

class Apriori {
  private $transactions = [];
  private $minSupport = 0;
  private $frequentItemsets = [];
  
  public function __construct(array $transactions, float $minSupport) {
    $this->transactions = $transactions;
    $this->minSupport = $minSupport;
  }
  
  public function mineAssociations() {
    $items = [];
    foreach ($this->transactions as $transaction) {
      foreach ($transaction as $item) {
        if (!in_array($item, $items)) {
          $items[] = $item;
        }
      }
    }
    sort($items);
    
    $frequentItemsets = [];
    for ($i = 1; $i <= count($items); $i++) {
      $candidateItemsets = $this->generateCandidateItemsets($items, $i);
      $frequentItemsets = $this->getFrequentItemsets($candidateItemsets);
      if (empty($frequentItemsets)) {
        break;
      }
      $this->frequentItemsets = array_merge($this->frequentItemsets, $frequentItemsets);
    }
  }
  
  private function generateCandidateItemsets(array $items, int $size) {
    $candidateItemsets = [];
    $combinations = $this->combination($items, $size);
    foreach ($combinations as $combination) {
      sort($combination);
      $candidateItemsets[] = $combination;
    }
    return $candidateItemsets;
  }
  
  private function combination(array $items, int $size) {
    $results = [];
    $this->combinationRecursive($results, [], $items, $size, 0);
    return $results;
  }
  
  private function combinationRecursive(array &$results, array $temp, array $items, int $size, int $start) {
    if (count($temp) == $size) {
      $results[] = $temp;
      return;
    }
    for ($i = $start; $i < count($items); $i++) {
      $temp[] = $items[$i];
      $this->combinationRecursive($results, $temp, $items, $size, $i + 1);
      array_pop($temp);
    }
  }
  
  public function getFrequentItemsets(array $candidateItemsets) {
    $frequentItemsets = [];
    foreach ($candidateItemsets as $candidateItemset) {
      $count = 0;
      foreach ($this->transactions as $transaction) {
        if ($this->contains($transaction, $candidateItemset)) {
          $count++;
        }
      }
      $support = $count / count($this->transactions);
      if ($support >= $this->minSupport) {
        $frequentItemsets[implode(" ", $candidateItemset)] = $support;
      }
    }
    return $frequentItemsets;
  }
  
  private function contains(array $transaction, array $candidateItemset) {
foreach ($candidateItemset as $item) {
if (!in_array($item, $transaction)) {
return false;
}
}
return true;
}


}

// Example usage:
// $transactions = [
// ['1', '2', '3'],
// ['1', '3'],
// ['2', '3'],
// ['1', '2', '3', '4'],
// ['1', '2', '4'],
// ['2', '3', '4']
// ];

// $apriori = new Apriori($transactions, 0.6);
// $apriori->mineAssociations();

// $frequentItemsets = $apriori->getFrequentItemsets($transactions);

// //print_r($frequentItemsets);
// foreach($frequentItemsets as $I=>$v){
//   print_r(explode(" ",$I));
//   echo"<br>";
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

<!DOCTYPE html>
<html>
<body>

<h1>The select element</h1>

<p>The select element is used to create a drop-down list.</p>

<form action="/action_page.php">
  <label for="cars">Choose a car:</label>
  <select name="cars" id="cars">
    <?php
    include 'DBconn.php';
    $S1 = "SELECT  DISTINCT(Manufacturer) as Manufacturer from Laptops";
    $ram=mysqli_query($connection,$S1);
    while($row=mysqli_fetch_array($ram)){
      echo '<option value="'.$row['Manufacturer'].'">'.$row['Manufacturer'].'</option>';
    }
    

    
    ?>
    
  </select>
  <select name="cars" id="cars">
    <?php
    include 'DBconn.php';
    $S1 = "SELECT  DISTINCT(RAM) as RAM from Laptops";
    $ram=mysqli_query($connection,$S1);
    while($row=mysqli_fetch_array($ram)){
      echo '<option value="'.$row['RAM'].'">'.$row['RAM'].'</option>';
    }
    

    
    ?>
    
  </select>
  <select name="cars" id="cars">
    <?php
    include 'DBconn.php';
    $S1 = "SELECT  DISTINCT(Category) as Category from Laptops";
    $ram=mysqli_query($connection,$S1);
    while($row=mysqli_fetch_array($ram)){
      echo '<option value="'.$row['Category'].'">'.$row['Category'].'</option>';
    }
    

    
    ?>
    
  </select>
  <select name="cars" id="cars">
    <?php
    include 'DBconn.php';
    $S1 = "SELECT  DISTINCT(CPU) as CPU from Laptops";
    $ram=mysqli_query($connection,$S1);
    while($row=mysqli_fetch_array($ram)){
      echo '<option value="'.$row['CPU'].'">'.$row['CPU'].'</option>';
    }
    

    
    ?>
    
  </select>

  <select name="cars" id="cars">
    <?php
    include 'DBconn.php';
    $S1 = "SELECT  DISTINCT(GPU) as GPU from Laptops";
    $ram=mysqli_query($connection,$S1);
    while($row=mysqli_fetch_array($ram)){
      echo '<option value="'.$row['GPU'].'">'.$row['GPU'].'</option>';
    }
    

    
    ?>
    
  </select>
  <br><br>
  <input type="submit" value="Submit">
</form>

<p>Click the "Submit" button and the form-data will be sent to a page on the 
server called "action_page.php".</p>

</body>
</html>
