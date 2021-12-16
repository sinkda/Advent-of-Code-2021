<?php

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode(",", $input);

$min_position = 99999;
$max_position = 0;

// get the min and max value of the crab positions
for($i = 0; $i < count($input); $i++)
{
    $min_position = min($min_position, $input[$i]);
    $max_position = max($max_position, $input[$i]);
}

$answers = [];

// find all the solutions
while($min_position <= $max_position)
{
    $fuel = 0;
    for($i = 0; $i < count($input); $i++)
    {
        if($min_position > $input[$i])
        {
            $distance = ($min_position - $input[$i]);
            $range = array_sum(range(1, $distance));
            $fuel += $range;
        }
        else
        {
            $distance = ($input[$i] - $min_position);
            $range = array_sum(range(1, $distance));
            $fuel += $range;
        }

    }

    $answers[] = [$min_position, $fuel];

    $min_position++;

}

// find the smallest fuel amount
$smallest_fuel_position = 0;
$smallest_fuel_amount = 999999999;
for($i = 0; $i < count($answers); $i++)
{
    if($answers[$i][1] < $smallest_fuel_amount)
    {
        $smallest_fuel_amount = $answers[$i][1];
        $smallest_fuel_position = $answers[$i][0];
    }
}

echo "Smallest Position: {$smallest_fuel_position}\n";
echo "Smallest Fuel Amount: {$smallest_fuel_amount}\n";