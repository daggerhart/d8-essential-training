<?php

/*
 * With our composer.json file, we defined an autoloader that uses the PSR4
 * strategy. After we have composer setup its' autoloading, all we need to do
 * is include the generated autoload.php file.
 */
require_once __DIR__ . "/vendor/autoload.php";

/*
 * With the "use" keyword we can use a namespaced class without typing the whole
 * name space. This "imports" the class into this file.
 */
use Jonathan\Math\WholeNumberCalculator;

$whole_number_calculator = new WholeNumberCalculator();
$whole_number_calculator->add(100);
$whole_number_calculator->divide(3);
print $whole_number_calculator->getTotal();
// 33

// Since we did not "use" this class we must call it using its entire namespace.
$calculator = new \Jonathan\Math\Calculator();
$calculator->add(108);
print $calculator->getTotal();
// 8
