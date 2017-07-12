<?php

/**
 * @author Edson B S Monteiro <bruno.monteirodg@gmail.com>
 * 
 * Resposta para questao FizzBuzz
 * 
 * LAUS DEO
 */
function fizzBuzz($counter = 100)
{

    for ($i = 1; $i <= $counter; $i++) {

        // verifica se eh múltiplo de 3
        $fizz = $i % 3 == 0 ? 'Fizz' : null;
        // verifica se eh múltiplo de 5
        $buzz = $i % 5 == 0 ? 'Buzz' : null;
        // verifica se houve algum múltiplo detectado
        $output = $fizz || $buzz ? $fizz . $buzz : $i;

        echo $output . "<br />";
    }
}

fizzBuzz();