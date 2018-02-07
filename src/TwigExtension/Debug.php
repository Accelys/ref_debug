<?php

namespace Drupal\ref_debug\TwigExtension;

class Debug extends \Twig_Extension {

  /**
   * In this function we can declare the extension function
   */
  public function getFunctions() {
    return array(
      new \Twig_SimpleFunction('r',
        array($this, 'r'),
        array('is_safe' => array('html'))
      )
    );
  }

  /**
   * Gets a unique identifier for this Twig extension.
   */
  public function getName() {
    return 'r';
  }

  /**
   * Replaces all numbers from the string.
   */
  public static function r($value) {
    return @r($value);
  }

}