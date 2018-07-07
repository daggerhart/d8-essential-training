<?php

namespace Math;

/**
 * Class Calculator.
 */
class Calculator implements \Math\CalculatorInterface {

  /**
   * Where we are storing the total number calculated.
   *
   * @var int
   */
  private $total = 0;

  /**
   * Calculator constructor.
   * This method is executed automatically when a class is instantiated.
   *
   * @param int $starting_total
   */
  function __construct($starting_total = 0) {
    $this->setTotal($starting_total);
  }

  /**
   * Get the total calculated so far.
   *
   * @return int
   */
  function getTotal() {
    return $this->total;
  }

  /**
   * Set the total value.
   *
   * @param int $a
   *   Any number.
   */
  function setTotal($a) {
    $this->total = $a;
  }

  /**
   * Add a number to the total.
   *
   * @param int $a
   *   Any number.
   */
  function add($a) {
    $this->total += $a;
  }

  /**
   * Subtract a number to the total.
   *
   * @param int $a
   *   Any number.
   */
  function subtract($a) {
    $this->total -= $a;
  }

  /**
   * Divide the total by a number.
   *
   * @param int $a
   *   Any number.
   */
  function divide($a) {
    $this->total = $this->total / $a;
  }

  /**
   * Multiply the total by a number.
   *
   * @param int $a
   *   Any number.
   */
  function multiply($a) {
    $this->total = $this->total * $a;
  }

}
