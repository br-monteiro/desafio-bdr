<?php

/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * @param int $length - The length of array result
 * @return array
 */
function fizzBuzz($length = 100)
{
    $result = [];
    for ($i = 1; $i <= $length; $i++) {
        $fizz = $i % 3 == 0 ? 'Fizz' : null;
        $buzz = $i % 5 == 0 ? 'Buzz' : null;
        $result[] = $fizz || $buzz ? $fizz . $buzz : $i;
    }
    return $result;
}

echo implode("<br>\n", fizzBuzz());
