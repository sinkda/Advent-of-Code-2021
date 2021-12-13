<?php

function winningBoardSumFunction($board = [])
{
    $sum = 0;
    
    // go through each row and column and if the value isn't X, then add it to the sum.
    for($i = 0; $i < 5; $i++)
    {
        for($j = 0; $j < 5; $j++)
        {
            if($board[$i][$j] !== 'X')
                $sum += $board[$i][$j];
        }
    }

    return $sum;
}