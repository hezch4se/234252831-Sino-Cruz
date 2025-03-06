<?php
$a = 15;
$b = 7;

echo "Checking number $a Odd/Even: ";
if ($a % 2 == 0) {
    echo "Even\n";
} else {
    echo "Odd\n";
}

echo "Checking number $b Odd/Even: ";
if ($b % 2 == 0) {
    echo "Even\n";
} else {
    echo "Odd\n";
}

echo "Checking number $a: ";
if ($a > 0) {
    echo "Positive\n";
} elseif ($a < 0) {
    echo "Negative\n";
} else {
    echo "Zero\n";
}

echo "Checking number $b: ";
if ($b > 0) {
    echo "Positive\n";
} elseif ($b < 0) {
    echo "Negative\n";
} else {
    echo "Zero\n";
}
?>

