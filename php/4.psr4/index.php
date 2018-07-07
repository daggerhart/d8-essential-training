<?php

// No longer need this. We are autoloading.
//require_once __DIR__ . "/src/Math/CalculatorInterface.php";
//require_once __DIR__ . "/src/Math/Calculator.php";
//require_once __DIR__ . "/src/Math/WholeNumberCalculator.php";

/*
 * Register our custom autoloading function with PHP.
 */
spl_autoload_register("my_psr4_autoloader");

/**
 * An "autoloader" takes a given class name and looks for a file with that class
 * name.
 *
 * @param $class
 */
function my_psr4_autoloader($class) {
  // base directory for the namespace prefix
  $base_dir = __DIR__ . '/src/';

  // replace the namespace prefix with the base directory, replace namespace
  // separators with directory separators in the relative class name, append
  // with .php
  $file = $base_dir . str_replace('\\', '/', $class) . '.php';

  // if the file exists, require it
  if (file_exists($file)) {
    require $file;
  }
}

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

