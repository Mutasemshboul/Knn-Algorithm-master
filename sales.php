<?php
$data = [
    ['x' => 1, 'y' => 100],
    ['x' => 2, 'y' => 110],
    ['x' => 3, 'y' => 115],
    ['x' => 4, 'y' => 105],
    ['x' => 5, 'y' => 95],
    ['x' => 6, 'y' => 102],
    ['x' => 7, 'y' => 50],
];

$num_data = count($data);

// Calculate the mean of the x and y values
$mean_x = 0;
$mean_y = 0;
foreach ($data as $point) {
    $mean_x += $point['x'];
    $mean_y += $point['y'];
}
$mean_x /= $num_data;
$mean_y /= $num_data;

// Calculate the slope of the line
$sum_xy = 0;
$sum_xx = 0;
foreach ($data as $point) {
    $sum_xy += ($point['x'] - $mean_x) * ($point['y'] - $mean_y);
    $sum_xx += ($point['x'] - $mean_x) ** 2;
}
$slope = $sum_xy / $sum_xx;

// Calculate the y-intercept of the line
$intercept = $mean_y - $slope * $mean_x;

// Predict the value of y for a given x
$x = 8;
$y = $intercept + $slope * $x;

echo "The predicted value of y for x = 8 is: " . $y;
?>
