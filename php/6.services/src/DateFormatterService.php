<?php

/**
 * Class DateFormatterSingleton.
 *
 * This is an example of a class that will be registered with a
 * "Service Locator"
 */
class DateFormatterService{

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
