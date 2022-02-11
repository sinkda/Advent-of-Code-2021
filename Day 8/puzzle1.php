<?php

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// For Puzzle 1, we only need the digits after the |
$input = array_map(fn($i) => trim(explode('|', $i)[1]), $input);

// Number of Unique Digits
// 1 = 2. 4 = 4, 7 = 3, 8 = 7
$unique = [2,4,3,7];

// Count the number of times the numbers 1, 4, 7, and 8 appear in the output digits
$numberUnique = 0;
foreach($input as $line)
{
    $values = explode(' ', $line);
    foreach($values as $val)
    {
        if(in_array(strlen($val), $unique))
            $numberUnique++;
    }
}

echo "The Number of Unique Digits: {$numberUnique}\n";