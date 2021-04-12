<?php

namespace Drupal\ajax_block\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

/**
 * Implementing a ajax form.
 */
class AjaxSubmit extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ajax_submit';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['actions'] = [
      '#type' => 'button',
      '#value' => $this->t('Click Me'),
      '#ajax' => [
        'callback' => '::setMessage',
      ],

      $form['message'] = [
        '#type' => 'markup',
        '#markup' => '<div class="result_message"></div>',
      ]
    ];

    return $form;
  }

  /**
   * Setting the message in our form.
   */
  public function setMessage(array $form, FormStateInterface $form_state) {

    $testvar = $this->t('Test message');

    $response = new AjaxResponse();
    $response->addCommand(
      new HtmlCommand('.result_message', $testvar)
    );
    return $response;
  }

  /**
   * Submitting the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

}
