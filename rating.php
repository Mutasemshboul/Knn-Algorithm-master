<?php
require_once __DIR__ . '/vendor/autoload.php';
$dataset = new \Phpml\Dataset\CsvDataset('ratings.csv', 3, true);
$randomSplit = new \Phpml\CrossValidation\RandomSplit($dataset, 0.3);
$trainingSet = $randomSplit->getTrainSamples();
$testSet = $randomSplit->getTestSamples();
$recommender = new \Phpml\Recommender\CollaborativeFiltering();
$recommender->setSimilarityCoefficient(new \Phpml\Math\Distance\Euclidean());
$recommender->setNearestNeighbors(5);
$recommender->train($trainingSet, $dataset->getTargets());

















?>