<?php

namespace Drupal\ajax_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides an ajax submit form block.
 *
 * @Block(
 *   id = "ajax_form_block",
 *   admin_label = @Translation("Ajax submit form block")
 * )
 */
class AjaxFormBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $config = $this->getConfiguration();

    $form = \Drupal::formBuilder()->getForm('\Drupal\ajax_block\Form\AjaxSubmit');
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $config = $this->getConfiguration();

    $form['value_header'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Header Value'),
      '#description' => $this->t('Enter the header value.'),
      '#default_value' => $config['value_header'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $values = $form_state->getValues();
    $this->configuration['value_header'] = $values['value_header'];
  }
}
