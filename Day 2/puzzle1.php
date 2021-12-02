<?php

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// Initial Depth and Horizontal Position Values
$depth = 0;
$horizontal = 0;

for($i = 0; $i < count($input); $i++)
{
    [$direction, $value] = explode(" ", $input[$i]);
    $value = intval($value);

    switch($direction)
    {
        case "forward":
            $horizontal += $value;
            break;

        case "up":
            $depth -= $value;
            break;

        case "down":
            $depth += $value;
            break;
    }
}

$solution = $depth * $horizontal;

echo "Your Depth is: {$depth}\n";
echo "Your Horizontal Position is: {$horizontal}\n";
echo "Your Solution Position is: {$solution}\n"; 