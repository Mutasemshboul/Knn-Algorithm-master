<?php




  

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

?>