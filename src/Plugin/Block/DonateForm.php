<?php
/**
 * @file
 * Contains \Drupal\resume\Form\ResumeForm.
 */
namespace Drupal\fm_donate\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class DonateForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'donate_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    
    
    $form['donor_options'] = array(
      '#type' => 'fieldgroup',
      '#attributes' => array('class' => array('donor-options')),
    );
    $form['donor_options']['donor_amount'] = array (
      '#type' => 'radios',
      '#title' => "",
      '#attributes' => array('class' => array('donor-button', 'amount-button')),
      '#prefix' => '<div class="label">'.t('Select your amount').'</div>',
      '#options' => array(
        '40' =>t('40 €'),
        '50' =>t('50 €'),
        '100' =>t('100 €')
      ),
      '#default_value' => 40,
    );
    $form['donor_options']['donor_free_amount'] = array(
      '#type' => 'textfield',
      '#title' => t('Or other amount'),
      '#attributes' => array('class' => array('free-amount')),
    );
    $form['donor_options']['donor_situation'] = array (
      '#type' => 'radios',
      '#title' => '',
      '#attributes' => array('class' => array('donor-situation')),
      '#prefix' => '<div class="form-item">'.t('<span>I donate during charitable diner</span>').'</div>',
      '#options' => array(
        'yes' =>t('Yes'),
        'no' =>t('No')
      ),
      '#default_value' => 'yes',
    );
    $form['donor_informations'] = array(
      '#type' => 'fieldgroup',
      '#attributes' => array('class' => array('fiscal-infos')),
    );
    $form['donor_informations']['donor_fiscal_informations'] = array(
      '#markup'=> t('<p class="h2">Fiscal advantages</p><p class="content">Thanks to a 66% tax deductions, your donation of <span class="donation-value"></span> will cost only <span class="donation-cost"></span></p>').t('<p class="more-link"><span class="btn-arrow" data-toggle="modal" data-target="#myModal">Read more</span></p>'),
      );
    $form['donor_contact'] = array(
      '#type' => 'fieldgroup',
      '#title' => '',
      '#attributes' => array('class' => array('contact-infos')),
    );
    $form['donor_contact']['donor_company'] = array(
      '#type' => 'textfield',
      '#prefix' => '<h2>'.t('Contact informations').'</h2>',
      '#title' => t('Company'),
      '#required' => TRUE,
    );
    $form['donor_contact']['donor_gender'] = array (
      '#type' => 'select',
      '#title' => t('Gender'),
      '#options' => array(
        'mr' => t('Mr'),
        'mrs' => t('Mrs'),
      ),
    );
    $form['donor_contact']['donor_first_name'] = array(
      '#type' => 'textfield',
      '#title' => t('First name'),
      '#required' => TRUE,
    );
    $form['donor_contact']['donor_last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last name'),
      '#required' => TRUE,
    );
    $form['donor_contact']['donor_address'] = array(
      '#type' => 'textfield',
      '#title' => t('Address'),
      '#required' => TRUE,
    );
    $form['donor_contact']['donor_postal_code'] = array(
      '#type' => 'textfield',
      '#title' => t('Postal code'),
      '#required' => TRUE,
    );
    $form['donor_contact']['donor_city'] = array(
      '#type' => 'textfield',
      '#title' => t('City'),
      '#required' => TRUE,
    );
    $form['donor_contact']['donor_country'] = array(
      '#type' => 'textfield',
      '#title' => t('Country'),
      '#required' => TRUE,
    );

    $form['donor_contact']['donor_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email'),
      '#required' => TRUE,
    );
    $form['donor_contact']['donor_preference'] = array (
      '#type' => 'select',
      '#title' => t('I prefer to receive my fiscal receipt by'),
      '#attributes' => array('class' => array('donor-preference')),
      '#required' => TRUE,
      '#options' => array(
        'postal' =>t('Postal route'),
        'email' =>t('Email')
      ),
      '#suffix' => '<div class="form-item">'.t('<p class="required-text">* Required fields</p>').'</div>',
    );

    $form['donor_payment'] = array(
      '#type' => 'fieldgroup',
      '#title' => '',
      '#attributes' => array('class' => array('payment-details')),
    );
    $form['donor_payment']['donor_payment_method'] = array (
      '#type' => 'select',
      '#prefix' => '<h2>'.t('Your payment').'</h2>',
      '#title' => t('Choose your payment method'),
      '#required' => TRUE,
      '#options' => array(
        'card' => t('Card'),
        'transfer' => t('Bank transfer'),
        'cheque' => t('Cheque'),
      ),
    );
    
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit my donation'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
    public function validateForm(array &$form, FormStateInterface $form_state) {

      if (strlen($form_state->getValue('candidate_number')) < 10) {
        $form_state->setErrorByName('candidate_number', $this->t('Mobile number is too short.'));
      }

    }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

   // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));

    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

   }
}
