<?php
namespace Drupal\capitalize\Plugin\Filter;

use Drupal\Core\Form\FormStateInterface;
use Drupal\filter\FilterProcessResult;
use Drupal\filter\Plugin\FilterBase;

/**
 * Class FilterCapitalize
 *
 * @Filter(
 *   id = "filter_capitalize",
 *   title = @Translation("Capitalize Filter"),
 *   description = @Translation("Capitelizes first letters of selected words!"),
 *   type = Drupal\filter\Plugin\FilterInterface::TYPE_TRANSFORM_IRREVERSIBLE,
 * )
 * @package Drupal\capitalize\Plugin\Filter
 */

class FilterCapitalize extends FilterBase {

  public function process($text, $langcode) {
    $wordsParts = explode(',', $this->settings['words']);
    foreach ($wordsParts as $part) {
      $part = ucfirst(trim($part));
      $text = preg_replace('/'.$part.'/i', $part, $text);
    }
    return new FilterProcessResult($text);
  }
  public function settingsForm(array $form, FormStateInterface $form_state) {
    if (!isset($this->settings['words'])) {
      $this->settings['words'] = '';
    }
    $form['words'] = array(
      '#type' => 'textarea',
      '#title' => $this->t('Words to capitalize'),
      '#default_value' => $this->settings['words'],
      '#description' => $this->t('Enter a list of words in small case which should be capitalized. <br/>Separate multiple words with comma (,)<br/><br/>Example: drupal, wordpress,joomla'),
    );
    return $form;
  }
}
