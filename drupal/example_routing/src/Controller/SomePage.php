<?php

namespace Drupal\example_routing\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

class SomePage extends ControllerBase {

  /**
   * Arbitrarily named method that is mapped to a route.
   *
   * @return array
   */
  public function myMethod() {
    return [
      'my_element' => [
        '#markup' => '<p>HELLO!!!</p>',
      ]
    ];
  }

  /**
   * Another method mapped to a route. This one expects parameters.
   *
   * @param $some_name
   * @param $some_title
   *
   * @return array
   */
  public function withParameters($some_name, $some_title) {
    return [
      'someone_is_a_title' => [
        '#type' => 'html_tag',
        '#tag' => 'h2',
        '#value' => "{$some_name} is the {$some_title}",
      ]
    ];
  }

  /**
   * Another made up method name that is mapped to a route.
   * This one returns a JsonResponse.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function aMethodThatReturnsJson() {
    $data = [
      'holla' => 'atcha boy',
      'antoher' => 'great example',
    ];
    return new JsonResponse($data);
  }
}
