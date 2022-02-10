<?php

namespace Drupal\node_json_data\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ApiKey.
 */
class ApiKey extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'node_json_data.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'api_key';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('node_json_data.settings');
    // $node = \Drupal::routeMatch()->getParameter('node');
    // $nid = $node->nid->value;
    $form['api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Your API Key'),
      '#description' => $this->t('Enter Your API Key'),
      '#maxlength' => 16,
      '#size' => 16,
      '#default_value' => $config->get('api_key'),
    ];
    // $form['nid'] = [
    //   '#type' => 'hidden',
    //   '#value' => $nid,
    // ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('node_json_data.settings')
      ->set('api_key', $form_state->getValue('api_key'))
      ->save();
  }

}
