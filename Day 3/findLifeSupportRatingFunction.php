<?php

/**
 * Take in the input array and filter it based on the provided type.
 *
 * @param array $input
 * @param string $type
 * @return string
 */
function findLifeSupportRating($input, $type)
{
    $filteredArray = $input;
    $digits = strlen($input[0]) - 1;

    // iterate through each bit
    for($i = 0; $i < $digits; $i++)
    {
        $numberOfZeros = 0;
        $numberOfOnes = 0;

        // find how many 1s and 0s are in the bit at $j
        for($j = 0; $j < count($filteredArray); $j++)
        {
            if($filteredArray[$j][$i] == '1')
                $numberOfOnes++;
            else
                $numberOfZeros++;
        }
    
        // if $type == oxygen, we want the most common value. Otherwise we want the least common value.
        if($numberOfOnes >= $numberOfZeros)
           $filteredArray = array_filter($filteredArray, function($value) use ($i, $type) {
                return $value[$i] == (($type == 'oxygen') ? '1' : '0');
            });
        else
            $filteredArray = array_filter($filteredArray, function($value) use ($i, $type) {
                return $value[$i] == (($type == 'oxygen') ? '0' : '1');
            });

        // reset the keys in the array to be sequential
        $filteredArray = array_values($filteredArray);

        if(count($filteredArray) == 1)
            break;
    }

    // return the last element in the array as a string
    return $filteredArray[0];
}