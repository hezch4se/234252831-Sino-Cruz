<?php

echo "FizzBuzz from 1 to 100:\n";
    for ($i = 1; $i <= 100; $i++) {

    if ($i % 3 == 0 && $i % 5 == 0) {
        echo "FizzBuzz\n";
    }

    elseif ($i % 3 == 0) {
        echo "Fizz\n";
    }

    elseif ($i % 5 == 0) {
        echo "Buzz\n";
    }

    else {
        echo $i . "\n";
    }
}


echo "\nFibonacci sequence (even numbers only):\n";
$fib1 = 0;
$fib2 = 1;
$count = 0;


while ($count < 10) {

$fib = $fib1 + $fib2;


$fib1 = $fib2;
$fib2 = $fib;


if ($fib % 2 == 0) {
echo $fib . "\n";
}


$count++;
}
?>