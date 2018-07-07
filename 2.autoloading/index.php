<?php
ini_set('display_errors',1);error_reporting(E_ALL);
// No longer need this. We are autoloading.
//require_once __DIR__ . "/includes/CalculatorInterface.php";
//require_once __DIR__ . "/includes/Calculator.php";
//require_once __DIR__ . "/includes/WholeNumberCalculator.php";

/*
 * Register our custom autoloading function with PHP.
 */
spl_autoload_register("my_custom_autoloader");

/**
 * An "autoloader" takes a given class name and looks for a file with that class
 * name.
 *
 * @param $class_name
 */
function my_custom_autoloader($class_name) {
  $file = __DIR__ . "/includes/" . $class_name . ".php";
  if (file_exists($file)) {
    print "found - ". $class_name . " - " . $file . '<br>';
    require_once $file;
  }
}

// Now our class files are included automatically when we use them.

$calculator = new Calculator();
$calculator->add(8);
print $calculator->getTotal();
// 8

$another_calculator = new Calculator();
$another_calculator->add(10);
$another_calculator->divide(2);
print $another_calculator->getTotal();
// 5

$whole_number_calculator = new WholeNumberCalculator();
$whole_number_calculator->add(10);
$whole_number_calculator->divide(3);
print $whole_number_calculator->getTotal();
// 3
