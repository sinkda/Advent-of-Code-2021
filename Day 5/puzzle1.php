<?php

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// get all of the coordinates
$coordinates = [];
for($i = 0; $i < count($input); $i++)
{
    $temp = explode(" -> ", $input[$i]);
    [$x1, $y1] = explode(",", $temp[0]);
    [$x2, $y2] = explode(",", $temp[1]);
    $coordinates[] = array_map('intval', [$x1, $y1, $x2, $y2]);
}

// make our 1000 x 1000 grid (we know this based on the numbers in the input, it's not given to us)
$grid = [];
for($i = 0; $i <= 1000; $i++)
{
    $row = [];
    for($j = 0; $j <= 1000; $j++)
    {
        $row[$j] = 0;
    }
    $grid[$i] = $row;
}

// map all of the lines on to the grid
foreach($coordinates as $line)
{
    // x1 y1 x2 y2

    // horizontal lines (Xs match)
    if($line[0] == $line[2])
    {
        $yPosStart = ($line[1] > $line[3]) ? $line[3] : $line[1];
        $yPosEnd = ($line[1] > $line[3]) ? $line[1] : $line[3];

        while($yPosStart <= $yPosEnd)
        {
            $grid[$line[0]][$yPosStart]++;
            $yPosStart++;
        }
    }

    // Vertical Line (Ys match)
    if($line[1] == $line[3])
    {
        $xPosStart = ($line[0] > $line[2]) ? $line[2] : $line[0];
        $xPosEnd = ($line[0] > $line[2]) ? $line[0] : $line[2];

        while($xPosStart <= $xPosEnd)
        {
            $grid[$xPosStart][$line[1]]++;
            $xPosStart++;
        }
    }
}

// find the number of grid elements where the value is 2 or more
$sum = 0;
for($i = 0; $i <= 1000; $i++)
{
    for($j = 0; $j <= 1000; $j++)
    {
        if($grid[$i][$j] >= 2)
            $sum++;
    }
}

echo "The Sum of overlapping lines is {$sum}\n";

