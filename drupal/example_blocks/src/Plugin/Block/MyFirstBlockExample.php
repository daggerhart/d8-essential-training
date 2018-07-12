<?php

namespace Drupal\example_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a very simple block that displays some text.
 *
 * @Block(
 *   id = "my_first_block_example",
 *   admin_label = @Translation("My First Block Example")
 * )
 */
class MyFirstBlockExample extends BlockBase {

  /**
   * Builds and returns the renderable array for this
   * block plugin.
   *
   * @return array
   *   A renderable array representing the content of the block.
   */
  public function build() {
    return [ '#markup' => 'This is such a great block!' ];
  }
}


