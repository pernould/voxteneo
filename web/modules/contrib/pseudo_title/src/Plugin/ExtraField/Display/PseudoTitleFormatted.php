<?php

namespace Drupal\pseudo_title\Plugin\ExtraField\Display;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\extra_field_plus\Plugin\ExtraFieldPlusDisplayFormattedBase;

/**
 * Pseudo Title Extra field with formatted output.
 *
 * @ExtraFieldDisplay(
 *   id = "pseudo_title_formatted",
 *   label = @Translation("Pseudo Title Formatted"),
 *   bundles = {
 *     "node.*",
 *   },
 *   visible = false
 * )
 */
class PseudoTitleFormatted extends ExtraFieldPlusDisplayFormattedBase {

  /**
   * {@inheritdoc}
   */
  public function getLabel() {
    return $this->t('Pseudo Title Formatted');
  }

  /**
   * {@inheritdoc}
   */
  public function getLabelDisplay() {
    return 'hidden';
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(ContentEntityInterface $entity) {
    $settings = $this->getSettings();

    $link_to_entity = $settings['link_to_entity'];
    $wrapper = $settings['wrapper'];
    $label = $entity->label();
    $url = NULL;

    if ($link_to_entity) {
      $url = $entity->toUrl()->setAbsolute();
    }

    if ($url) {
      $link = [
        '#type' => 'link',
        '#title' => $label,
        '#url' => $url,
      ];
      $element = [
        '#type' => 'html_tag',
        '#tag' => $wrapper,
        '#attributes' => [
          'id' => 'page-title',
          'class' => ['title'],
        ],
        '#value' => \Drupal::service('renderer')->render($link),
      ];
    }
    else {
      $element = [
        '#type' => 'html_tag',
        '#tag' => $wrapper,
        '#attributes' => [
          'id' => 'page-title',
          'class' => ['title'],
        ],
        '#value' => $label,
      ];
    }

    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm() {
    $form = parent::settingsForm();

    $form['link_to_entity'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Link to the entity'),
    ];

    $form['wrapper'] = [
      '#type' => 'select',
      '#title' => $this->t('Wrapper'),
      '#options' => [
        'span' => $this->t('Span'),
        'p' => $this->t('P'),
        'h1' => $this->t('H1'),
        'h2' => $this->t('H2'),
        'h3' => $this->t('H3'),
        'h4' => $this->t('H4'),
        'h5' => $this->t('H5'),
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function defaultFormValues() {
    $values = parent::defaultFormValues();
    $values += [
      'link_to_entity' => FALSE,
      'wrapper' => 'h1',
    ];
    return $values;
  }

}
