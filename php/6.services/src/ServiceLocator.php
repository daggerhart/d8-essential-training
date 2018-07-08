<?php

/**
 * Class ServiceLocator.
 *
 * Very simple example of a service locator to illustrate its utility and usage.
 */
class ServiceLocator {

  /**
   * A collection of services keyed by their name.
   *
   * @var array
   */
  private $services = [];

  /**
   * Register a new service instance with the system by name.
   *
   * @param $service_name
   * @param $instance
   */
  public function register($service_name, $instance) {
    $this->services[$service_name] = $instance;
  }

  /**
   * Retrieve a service by name from the collection.
   *
   * @param $service_name
   * @return object|null
   */
  public function get($service_name) {
    if (!empty($this->services[$service_name])) {
      return $this->services[$service_name];
    }

    return null;
  }

}
