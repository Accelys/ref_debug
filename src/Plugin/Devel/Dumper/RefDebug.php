<?php

namespace Drupal\ref_debug\Plugin\Devel\Dumper;

use Drupal\devel\DevelDumperBase;

/**
 * Provides a Symfony VarDumper dumper plugin.
 *
 * @DevelDumper(
 *   id = "ref_debug",
 *   label = @Translation("PHP-Ref"),
 *   description = @Translation("Wrapper for <a href='https://github.com/digitalnature/php-ref/'>PHP-ref var-dumper</a> debugging tool."),
 * )
 *
 */
class RefDebug extends DevelDumperBase {

  /**
   * {@inheritdoc}
   */
  public function dump($input, $name = NULL) {
    \Drupal::logger('file')->info(strtoupper(__METHOD__));
    echo (string) $this->export($input, $name);
  }

  /**
   * {@inheritdoc}
   */
  public function export($input, $name = NULL) {
    \Drupal::logger('file')->info(strtoupper(__METHOD__));
    \ref::config('showBacktrace', TRUE);
    \ref::config('maxDepth', 3);
    //\ref::config('shortcutFunc', ['r', 'rt', 'dpm']);
    \ref::config('shortcutFunc', ['dpm']);
    \ref::config('showStringMatches', FALSE);

    ob_start();
    ('cli' === PHP_SAPI) ? rt($input) : r($input);
    $dump = ob_get_contents();
    ob_end_clean();

    $render = [
      'export' => [
        '#markup' => $this->setSafeMarkup(($name ? $name : '') . "\n" . $dump),
        '#attached' => [
          'library' => ['ref_debug/ref_debug']
        ],
      ],
    ];
    return ($render);
    //return drupal_render($render);
  }


  /**
   * {@inheritdoc}
   */
  public function exportAsRenderable($input, $name = NULL) {
    \Drupal::logger('default')->info(strtoupper(__METHOD__));
    return [
      'export' => [
        '#markup' => $this->export($input, $name),
        '#attached' => [
          'library' => ['ref_debug/ref_debug']
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public static function checkRequirements() {
    return class_exists('ref', TRUE);
  }

}
