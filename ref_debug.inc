<?php
/**
 * @file
 * Page callback function(s)
 */

/**
 * Display the ref debug.
 */
function ref_debug_load($type, $object, $name = NULL) {
  $output = r($object);
  $previous_page = $_SERVER['HTTP_REFERER'];
  $output .= t('Results above');
  return $output;
}
