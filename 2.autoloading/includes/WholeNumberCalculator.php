<?php

/**
 * Classes can inherit the properties and methods of another class by use of the
 * "extends" keyword.
 *
 * This class has access to everything the Calculator class defines.
 *
 * A class can only extends 1 other class.
 */
class WholeNumberCalculator extends Calculator {

  /**
   * Children classes can override the methods
   * of its parent.
   */
  public function divide($a) {
    // Perform the parent's normal divide() method.
    parent::divide($a);

    $whole_number = round($this->getTotal());
    $this->setTotal($whole_number);
  }

  /**
   * Children can add new properties and
   * methods.
   */
  public function isOdd() {
    return ($this->getTotal() % 2) === 1;
  }
}
