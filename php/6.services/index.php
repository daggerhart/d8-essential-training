<?php

require_once __DIR__ . '/src/DateFormatterSingleton.php';
require_once __DIR__ . '/src/ServiceLocator.php';
require_once __DIR__ . '/src/DateFormatterService.php';

/*
 * Using the Singleton multiple times.
 */

$date_formatter_singleton = DateFormatterSingleton::getInstance();
print $date_formatter_singleton->format(1111111111) . '<hr>';
print $date_formatter_singleton->format(1111111111, 'medium') . '<hr>';
print $date_formatter_singleton->format(1111111111, 'long') . '<hr>';

/*
 * Using a service locator to retrieve a named class instance. This is a much
 * better approach to solving the problem because it allows the application to
 * be more loosely couple with the class it needs.
 */

// Sometime during the system bootstrap the service is registered.
$service_locator = new ServiceLocator();
$service_locator->register('date.formatter', new DateFormatterService());

// Theoretically, some other part of the application could replace the service
// with a better implementation.

//$service_locator->register('date.formatter', new BetterDateFormatter());

// Later in our application, we can request the service by name.
$date_formatter_service = $service_locator->get('date.formatter');
print $date_formatter_service->format(1111111111) . '<hr>';
print $date_formatter_service->format(1111111111, 'medium') . '<hr>';
print $date_formatter_service->format(1111111111, 'long') . '<hr>';
