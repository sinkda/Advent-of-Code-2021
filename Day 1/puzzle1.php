<?php

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// Solution is the number of times there is an increment in the input between current and previous
$solution = 0;

for($i = 1; $i < count($input); $i++)
{
    // Is the current index increased from the index before it.
    // also convert the values to integers to properly compare instead of their current string type
    if(intval($input[$i]) > intval($input[$i-1]))
        $solution++;
}

echo "The Number of Increments (Soltuion) Is: {$solution}\n"; 