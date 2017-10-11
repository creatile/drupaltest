<?php
/**
 * @file
 * Contains \Drupal\article\Plugin\Block\ArticleBlock.
 */

namespace Drupal\fm_donate\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'donate monthly' block.
 *
 * @Block(
 *   id = "donate_monthly_block",
 *   admin_label = @Translation("Donate monthly block"),
 *   category = @Translation("Custom donate monthly block form")
 * )
 */
class DonatemonthBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $form = \Drupal::formBuilder()->getForm('Drupal\fm_donate\Form\DonatemonthForm');

    return $form;
   }
}