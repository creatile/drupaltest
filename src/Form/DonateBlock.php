<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\ArticleBlock.
 */

namespace Drupal\fm_donate\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'donate' block.
 *
 * @Block(
 *   id = "donate_block",
 *   admin_label = @Translation("Donate block"),
 *   category = @Translation("Custom donate block form")
 * )
 */
class DonateBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $form = \Drupal::formBuilder()->getForm('Drupal\fm_donate\Form\DonateForm');

    return $form;
   }
}