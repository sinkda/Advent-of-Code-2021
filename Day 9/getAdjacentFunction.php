<?php

function getAdjacent($x, $y, $grid)
{
    $adj = [[0, -1], [-1, 0], [0, 1], [1, 0]];
    $values = [];

    foreach($adj as [$dx, $dy])
    {
        // account for edges
        if($y + $dy < 0 || $y + $dy >= count($grid))
            continue;

        if($x + $dx < 0 || $x + $dx >= count($grid[$y]))
            continue;

        $values[] = $grid[$y + $dy][$x + $dx];
    }   
    
    return $values;
}