<?php
/**
 * @file
 * Page callback function(s)
 */

/**
 * Display the ref debug.
 */
function ref_debug_load($type, $object, $name = NULL) {
  r($object);
  $previous_page = $_SERVER['HTTP_REFERER'];
  echo l(t('Go back'), $previous_page, array('attributes' => array('accesskey' => 'b')));
}
