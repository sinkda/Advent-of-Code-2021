<?php

include './findWinningBoardFunction.php';
include './winningBoardSumFunction.php';

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// get all of the numbers that were called
$called = explode(",", $input[0]);

// build the boards
$boards = [];
$board = [];
$row = 0;

// start at index 2, since index 0 is the called numbers, then skipping a space
for($i = 2; $i < count($input); $i++)
{
    // if the row is after 5, then skip the next line and reset the board 
    if($row == 5)
    {
        $row = 0; // reset the row count
        $board[] = [0, 0, 0, 0, 0, 0]; // add column counter row
        $boards[] = $board; // add board to boards list
        $board = []; // reset board
        continue;
    }
    
    $current = array_map('intval', preg_split("/\s+/", ltrim($input[$i])));
    $board[] = $current;

    $row++;

}


// draw numbers until we get a winner
$winner = findWinningBoardFunction($called, $boards);
$sum = winningBoardSumFunction($winner[1]);
$solution = $sum * $winner[0];

echo "The Solution is: {$solution}\n";
