<?php

namespace Drupal\example_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a block that has some simple configuration.
 *
 * @Block(
 *   id = "my_configurable_example",
 *   admin_label = @Translation("My Configurable Example")
 * )
 */
class MyConfigurableExample extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);
    $config = $this->getConfiguration();

    $form['say_hello'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Say Hello?'),
      '#default_value' => isset($config['say_hello']) ? $config['say_hello'] : 0,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['say_hello'] = $form_state->getValue('say_hello');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    $sentence = 'World.';
    if (!empty($config['say_hello'])) {
      $sentence = 'Hello ' . $sentence;
    }

    return [ '#markup' => $sentence ];
  }
}


