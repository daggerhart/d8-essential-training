<?php

/**
 * Class DateFormatterSingleton.
 *
 * This is an example of the singleton (anti)pattern, which is ultimately NOT a
 * good solution to the problem of "making a class reusable without the need to
 * instantiate it".
 */
class DateFormatterSingleton {

  /**
   * DateFormatterSingleton constructor.
   *
   * This class cannot be instantiated by another part of the system because it
   * has a private constructor.
   */
  private function __construct() {}

  /**
   * Get an instance of this class. If the class has never been instantiated, do
   * so and save the instance statically within memory.
   *
   * @return \DateFormatterSingleton
   */
  public static function getInstance() {
    static $instance = null;

    if (is_null($instance)) {
      $instance = new self();
    }

    return $instance;
  }

  /**
   * Approximation of Drupal's DateFormatter::format() method.
   *
   * @param $timestamp
   * @param string $format_name
   * @return string
   */
  public function format($timestamp, $format_name = 'short') {
    $formats = [
      'short' => 'm/d/y - g:ia',
      'medium' => 'M j, Y - g:ia',
      'long' => 'F m, Y - g:ia',
    ];

    if (empty($formats[$format_name])) {
      $format_name = 'short';
    }

    return date($formats[$format_name], $timestamp);
  }

}
