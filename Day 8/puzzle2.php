<?php

// get the input from the input.txt file
$input = file_get_contents('input.txt');

// convert input into an array
$input = explode("\n", $input);

// Need to loop through each line to get their output, then add it to the total sum
$totalSum = 0;

foreach($input as $line)
{
    // get all of the values in a temporary array
    // then make each string an array of the letters
    $values = array_map('trim', explode(' ', str_replace(' |', '', $line)));
    $values = array_map('str_split', $values);
    array_walk($values, fn(&$val) => sort($val)); // Sort values since they're not always in order when the same digit
    $signal = array_slice($values, 0, 10);
    $output = array_slice($values, 10, 4);

    // Now test for the unique digit numbers
    // 1 = 2. 4 = 4, 7 = 3, 8 = 7
    $test = [
        1 => array_values(array_filter($signal, fn($v) => count($v) == 2))[0],
        4 => array_values(array_filter($signal, fn($v) => count($v) == 4))[0],
        7 => array_values(array_filter($signal, fn($v) => count($v) == 3))[0],
        8 => array_values(array_filter($signal, fn($v) => count($v) == 7))[0]
    ];

    // Test all of the rest of the numbers, by how many intersecting matches there are with the known tests from above
    while(count($test) < 10)
    {
        foreach($signal as $s)
        {
            switch(count($s))
            {
                case 5:
                    if(count(array_intersect($s, $test[4] ?? [])) == 2)
                        $test[2] = $s;
                    else if(count(array_intersect($s, $test[1] ?? [])) == 2)
                        $test[3] = $s;
                    else    
                        $test[5] = $s;
                    break;
                
                case 6:
                    if(count(array_intersect($s, $test[1] ?? [])) == 1)
                        $test[6] = $s;
                    else if(count(array_intersect($s, $test[3] ?? [])) == 5)
                        $test[9] = $s;
                    else
                        $test[0] = $s;
                    break;
            }
        }
    }

    $test = array_map('implode', $test);
    $output = array_map('implode', $output);
    $test = array_flip($test);
    $output = array_map(fn($i) => $test[$i], $output);
    $totalSum += (int) implode('', $output);
}

echo "Total Output Sum: {$totalSum}\n";