<?php

$number_of_days = 256;

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode(",", $input);

// setup the initial school size
$school = [0, 0, 0, 0, 0, 0, 0, 0, 0];

for($i = 0; $i < count($input); $i++)
{
    $school[$input[$i]]++;
}

// live life for $number_of_days
for($day = 0; $day < $number_of_days; $day++)
{
    $having_kids = array_shift($school); // fish having kids
    $school[] = $having_kids; // those kids are born
    $school[6] += $having_kids; // the parents are "reborn"
}

// find the number of fish in the school
$solution = 0;
for($i = 0; $i < count($school); $i++)
{
    $solution += $school[$i];
}

echo "The number of Fish after {$number_of_days} is : {$solution}\n";