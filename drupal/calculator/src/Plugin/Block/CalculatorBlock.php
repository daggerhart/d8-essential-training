<?php

namespace Drupal\calculator\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides the calculator form as a block;.
 *
 * @Block(
 *   id = "calculator_block",
 *   admin_label = @Translation("Calculator")
 * )
 */
class CalculatorBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\calculator\Form\CalculatorForm');
    $config = $this->getConfiguration();

    if (empty($config['show_history'])) {
      $form['operation_history']['#access'] = FALSE;
    }
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $config = $this->getConfiguration();
    $form = parent::blockForm($form, $form_state);
    $form['show_history'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show Operations History'),
      '#default_value' => isset($config['show_history']) ? $config['show_history'] : 1,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['show_history'] = $form_state->getValue('show_history');
  }

}
