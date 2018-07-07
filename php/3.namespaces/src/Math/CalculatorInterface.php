<?php

namespace Math;

/**
 * Interface CalculatorInterface.
 *
 * Interfaces describe strict method specifications.
 */
interface CalculatorInterface {

  /**
   * Number calculated.
   *
   * @return int|float
   */
  function getTotal();

  /**
   * Set the total value.
   *
   * @param int $a
   *   Any number.
   */
  function setTotal($a);

  /**
   * Add a number to the total.
   *
   * @param int $a
   *   Any number.
   */
  function add($a);

  /**
   * Subtract a number to the total.
   *
   * @param int $a
   *   Any number.
   */
  function subtract($a);

  /**
   * Divide the total by a number.
   *
   * @param int $a
   *   Any number.
   */
  function divide($a);

  /**
   * Multiply the total by a number.
   *
   * @param int $a
   *   Any number.
   */
  function multiply($a);
}
