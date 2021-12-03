<?php

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// set the default values for gamma and epsilon
$gamma = '';
$epsilon = '';
$gammaCounter = [];
$epsilonCounter = [];
$digits = strlen($input[0]) - 1;
$lines = count($input);

// initialize the Counterse to 0
// This could be done in-line with 12 0s, but doing it dynamically in the event the input would have a variable amount of binary digits 
for($i = 0; $i < $digits; $i++)
{
    $gammaCounter[] = 0;
    $epsilonCounter[] = 0;
}

// loop through the list and create a list of how many 1s are in each position
for($i = 0; $i < $lines; $i++)
{
    for($j = 0; $j < $digits; $j++)
    {
        if($input[$i][$j] == '1')
            $gammaCounter[$j]++;
        else
            $epsilonCounter[$j]++;
    }
}

// build the binary string for gamma and epsilon
$half = $lines / 2;
for($i = 0; $i < $digits; $i++)
{
    // if this, we are going to assume there is no equal amount of 1s and 0s in a given position, diven the provided instructions not accounting for this case.
    if($gammaCounter[$i] > $half)
    {
        $gamma .= '1';
        $epsilon .= '0';
    }
    else
    {
        $gamma .= '0';
        $epsilon .= '1';
    }

}

$solution = bindec($gamma) * bindec($epsilon);


echo "Power Consumption Solution: {$solution}\n"; 