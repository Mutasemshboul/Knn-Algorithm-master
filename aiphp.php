<?php
require_once __DIR__ . '/vendor/autoload.php';
use Phpml\Association\Apriori;

$associator = new Apriori($support = 0.5, $confidence = 0.5);
$samples = [['alpha', 'beta', 'epsilon'], ['alpha', 'beta', 'theta'], ['alpha', 'beta', 'epsilon'], ['alpha', 'beta', 'theta']];
$labels  = [];

//use Phpml\Association\Apriori;

$associator = new Apriori($support = 0.5, $confidence = 0.5);
$associator->train($samples, $labels);
print_r($associator->predict(['alpha','theta']));
print_r($associator->getRules());

?>