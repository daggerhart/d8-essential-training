<?php

require_once __DIR__ . "/includes/CalculatorInterface.php";
require_once __DIR__ . "/includes/Calculator.php";
require_once __DIR__ . "/includes/WholeNumberCalculator.php";

$calculator = new Calculator();
$calculator->add(8);
$calculator->subtract(2);
$calculator->divide(2);
$calculator->multiply(6);
print $calculator->getTotal();
// 18

$another_calculator = new Calculator();
$another_calculator->add(10);
$another_calculator->subtract(2);
$another_calculator->divide(2);
$another_calculator->multiply(6);
print $another_calculator->getTotal();
// 24

$whole_number_calculator = new WholeNumberCalculator();
$whole_number_calculator->add(10);
$whole_number_calculator->divide(3);
print $whole_number_calculator->getTotal();
// 3
