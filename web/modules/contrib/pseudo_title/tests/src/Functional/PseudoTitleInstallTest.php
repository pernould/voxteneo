<?php

namespace Drupal\Tests\pseudo_title\Functional;

use Drupal\FunctionalJavascriptTests\WebDriverTestBase;

/**
 * Test the pseudo_title module install without errors.
 *
 * @group pseudo_title
 */
class PseudoTitleInstallTest extends WebDriverTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'pseudo_title',
    'extra_field',
    'extra_field_plus',
  ];

  /**
   * Assert that the pseudo_title module installed correctly.
   */
  public function testModuleInstalls() {
    // If we get here, then the module was successfully installed during the
    // setUp phase without throwing any Exceptions. Assert that TRUE is true,
    // so at least one assertion runs, and then exit.
    $this->assertTrue(TRUE, 'Module installed correctly.');
  }

}
