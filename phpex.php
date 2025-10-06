<?php
echo "<h3>1. Introduce Yourself</h3>";
$name = "Hared";
$age = 21;
$fav_color = "blue";
echo "Hi, I'm $name, I am $age years old, and my favorite color is $fav_color.<br><br>";

echo "<h3>2. Simple Math</h3>";
$a = 12;
$b = 5;
echo "Sum: " . ($a + $b) . "<br>";
echo "Difference: " . ($a - $b) . "<br>";
echo "Product: " . ($a * $b) . "<br>";
echo "Quotient: " . ($a / $b) . "<br><br>";

echo "<h3>3. Area and Perimeter of a Rectangle</h3>";
$length = 8;
$width = 4;
$area = $length * $width;
$perimeter = 2 * ($length + $width);
echo "Area: $area<br>";
echo "Perimeter: $perimeter<br><br>";

echo "<h3>4. Temperature Converter</h3>";
$celsius = 30;
$fahrenheit = ($celsius * 9/5) + 32;
echo "CELSIUS: $celsius =  FAHRENHEIT: $fahrenheit<br><br>";

echo "<h3>5. Swapping Variables</h3>";
$x = 10;
$y = 20;
echo "Before swap: x = $x, y = $y<br>";
$temp = $x;
$x = $y;
$y = $temp;
echo "After swap: x = $x, y = $y<br><br>";

echo "<h3>6. Salary Calculator</h3>";
$basic_salary = 25000;
$allowance = 7000;
$deduction = 2000;
$net_salary = $basic_salary + $allowance - $deduction;
echo "Net Salary: ₱$net_salary<br><br>";

echo "<h3>7. BMI Calculator</h3>";
$weight = 65;
$height = 1.7;
$bmi = $weight / ($height * $height);
echo "Your BMI is: " . round($bmi, 2) . "<br><br>";

echo "<h3>8. String Manipulation</h3>";
$sentence = "Make Philippines great again";
echo "Number of characters: " . strlen($sentence) . "<br>";
echo "Number of words: " . str_word_count($sentence) . "<br>";
echo "Uppercase: " . strtoupper($sentence) . "<br>";
echo "Lowercase: " . strtolower($sentence) . "<br><br>";

echo "<h3>9. Bank Account Simulation</h3>";
$balance = 1000;
$deposit = 500;
$withdraw = 300;
$balance = $balance + $deposit - $withdraw;
echo "Final Balance: ₱$balance<br><br>";

echo "<h3>10. Simple Grading System</h3>";
$CIT17 = 95;
$CC17 = 85;
$CIT5 = 90;
$average = ($CIT17 + $CC17 + $CIT5) / 3;
if ($average >= 90) {
    $grade = "passed";
} elseif ($average >= 80) {
    $grade = "passed";
} else {
    $grade = "failed";
}
echo "Average: " . round($average, 2) . "<br>";
echo "Grade: $grade<br><br>";

echo "<h3>11. Currency Converter</h3>";
$php_amount = 1000;
$usd_rate = 0.018;
$eur_rate = 0.016;
$jpy_rate = 2.65;
echo "PHP $php_amount in USD: $" . ($php_amount * $usd_rate) . "<br>";
echo "PHP $php_amount in EUR: €" . ($php_amount * $eur_rate) . "<br>";
echo "PHP $php_amount in JPY: ¥" . ($php_amount * $jpy_rate) . "<br><br>";

echo "<h3>12. Travel Cost Estimator</h3>";
$distance = 250;
$fuel_consumption = 12;
$fuel_price = 70;
$fuel_needed = $distance / $fuel_consumption;
$total_cost = $fuel_needed * $fuel_price;
echo "Estimated travel cost: ₱" . round($total_cost, 2) . "<br><br>";
?>
