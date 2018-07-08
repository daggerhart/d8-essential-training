<?php

namespace Drupal\calculator\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CalculatorForm.
 */
class CalculatorForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'calculator';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $history = $form_state->get('operation_history') ? $form_state->get('operation_history') : [];

    $form['total'] = [
      '#type' => 'number',
      '#title' => $this->t('Total'),
      '#default_value' => $form_state->get('calculated_total') ? $form_state->get('calculated_total') : 0,
      '#attributes' => [
        'disabled' => 'disabled',
      ]
    ];
    $form['operation'] = [
      '#type' => 'select',
      '#title' => $this->t('Operation'),
      '#options' => [
        'add' => $this->t('+ Add'),
        'subtract' => $this->t('- Subtract'),
        'divide' => $this->t('/ Divide'),
        'multiply' => $this->t('* Multiply'),
      ],
    ];
    $form['operation_value'] = [
      '#type' => 'number',
      '#title' => $this->t('Operation Value'),
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#default_value' => $this->t('Submit'),
    ];
    $form['clear'] = [
      '#type' => 'submit',
      '#default_value' => $this->t('Clear'),
    ];
    $form['operation_history'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Operation History'),
      'history' => [
        '#markup' => implode("<br>", $history),
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    if ($form_state->getTriggeringElement()['#id'] == 'edit-clear') {
      $form_state->setRebuild(FALSE);
      return;
    }

    $form_state->setRebuild(true);
    $total = $form_state->getValue('total');
    $operation = $form_state->getValue('operation');
    $operation_value = $form_state->getValue('operation_value');

    // Calculate the new value.
    $calculator = \Drupal::service('calculator');
    $calculator->setTotal($total);

    if (method_exists($calculator, $operation)) {
      call_user_func([$calculator, $operation], $operation_value);
    }

    $form_state->set('calculated_total', $calculator->getTotal());

    // Track the history of operations.
    $history = $form_state->get('operation_history') ? $form_state->get('operation_history') : [];
    $history[] = "{$total} {$operation} {$operation_value} = {$calculator->getTotal()}";
    $form_state->set('operation_history', $history);
  }

}
