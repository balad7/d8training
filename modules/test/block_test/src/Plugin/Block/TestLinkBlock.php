<?php

namespace Drupal\block_test\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\core\url;
use Drupal\Core\Link;

/**
 * Provides a ' test block' block.
 *
 * @Block(
 *   id = "block_empty",
 *   admin_label = @Translation(" test block")
 * )
 */
class TestLinkBlock extends BlockBase {


  /**
   * {@inheritdoc}
   */

  public function build() {
    // We return an empty array on purpose. The block will thus not be rendered
    // on the site. See BlockExampleTest::testBlockExampleBasic().
    $url = Url::fromRoute('entity.node.canonical', array('node' => 2));
    $url1 = Url::fromRoute('entity.node.canonical', array('node' => 3));
    $url2 = Url::fromRoute('entity.node.canonical', array('node' => 4));
    $url3 = Url::fromRoute('entity.node.canonical', array('node' => 5));
    $url4 = Url::fromRoute('entity.node.canonical', array('node' => 7));
    return [
      $link = [
        '#type' => 'link',
        '#url' => $url,
        '#title' => t('(spoken english)'),
    ],
      $link1 = [
      '#type' => 'link',
      '#url' => $url1,
      '#title' => t('    (Namalwar)'),
    ],
      $link2 = [
     '#type' => 'link',
     '#url' => $url2,
     '#title' => t('     (Flipkart)'),
   ],
     $link3 = [
     '#type' => 'link',
     '#url' => $url3,
     '#title' => t('     (Amazon)'),
   ],
     $link4 = [
     '#type' => 'link',
     '#url' => $url4,
     '#title' => t('     (Serial number)'),
   ],
    ];

  }

}
