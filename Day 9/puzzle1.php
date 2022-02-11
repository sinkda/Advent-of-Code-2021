<?php

include './getAdjacentFunction.php';

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// Convert the input into an array format
$input = array_map(fn($line) => str_split(trim($line)), $input);

$riskTotal = 0;

// Loop through all values and find their adjacent numbers and compare
foreach($input as $r => $line)
{
    foreach($line as $c => $num)
    {
        // get all the adjacent values
        $adj = getAdjacent($c, $r, $input);
        
        // find all the adjacent values that are higher than the number
        $higher = array_filter($adj, fn($h) => $h > $num);

        // if not all of them are higher, then it is not the lowest point and continue
        if(count($higher) !== count($adj))
            continue;

        $riskTotal += (1 + $num);
    }
}

echo "Total Risk Factor: {$riskTotal}\n";