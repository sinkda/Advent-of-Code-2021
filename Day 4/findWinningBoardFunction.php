<?php

function findWinningBoardFunction($called = [], $boards = [])
{
    // go through each called number until we find a winner
    for($i = 0; $i < count($called); $i++)
    {
        // go through each of the boards
        for($j = 0; $j < count($boards); $j++)
        {  
            // go through the first 5 rows of a board, since the last row is a count of winners
            for($r = 0; $r < 5; $r++)
            {
                // go through each column in a row, ignoring the last column which is a count of winners
                for($c = 0; $c < 5; $c++)
                {
                    if($boards[$j][$r][$c] == intval($called[$i]))
                    {
                        $boards[$j][$r][$c] = 'X';
                        $boards[$j][$r][5]++;
                        $boards[$j][5][$c]++;
                    }

                    // see if we have a winner
                    if($boards[$j][5][$c] == 5 || $boards[$j][$r][5] == 5)
                        return [$called[$i], $boards[$j], $j];
                }
            }

        }
    }

    return false;
}