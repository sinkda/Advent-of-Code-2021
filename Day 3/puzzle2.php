<?php

// include helper function
include('findLifeSupportRatingFunction.php');

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// set the default values for CO2 and Oxygen Ratings
$co2 = findLifeSupportRating($input, 'co2');
$oxygen = findLifeSupportRating($input, 'oxygen');

$solution = bindec($co2) * bindec($oxygen);

echo "Life Support Rating Solution: {$solution}\n"; 