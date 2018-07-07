<?php

require_once __DIR__ . "/src/Math/CalculatorInterface.php";
require_once __DIR__ . "/src/Math/Calculator.php";
require_once __DIR__ . "/src/Math/WholeNumberCalculator.php";

$calculator = new \Math\Calculator();
$calculator->add(8);
print $calculator->getTotal();
// 8

$another_calculator = new \Math\Calculator();
$another_calculator->add(10);
$another_calculator->divide(2);
print $another_calculator->getTotal();
// 5

$whole_number_calculator = new \Math\WholeNumberCalculator();
$whole_number_calculator->add(10);
$whole_number_calculator->divide(3);
print $whole_number_calculator->getTotal();
// 3
