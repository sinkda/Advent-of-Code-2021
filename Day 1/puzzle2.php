<?php

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// Grouped Array
$grouped = [];

// Group new content into sums
for($i = 2; $i < count($input); $i++)
    $grouped[] = intval($input[$i]) + intval($input[$i-1]) + intval($input[$i-2]);

// Solution is the number of times there is an increment in the new grouped input between current and previous
$solution = 0;

// now run the same algorithm from puzzle 1 to get the new increase value.
for($i = 1; $i < count($grouped); $i++)
{
    // Is the current index increased from the index before it.
    // also convert the values to integers to properly compare instead of their current string type
    if($grouped[$i] > $grouped[$i-1])
        $solution++;
}

echo "The Number of Increments (Soltuion) Is: {$solution}\n"; 