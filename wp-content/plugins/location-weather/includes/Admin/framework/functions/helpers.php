<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access directly.
/**
 *
 * Array search key & value
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'splwt_array_search' ) ) {
  function splwt_array_search( $array, $key, $value ) {

    $results = array();

    if ( is_array( $array ) ) {
      if ( isset( $array[$key] ) && $array[$key] == $value ) {
        $results[] = $array;
      }

      foreach ( $array as $sub_array ) {
        $results = array_merge( $results, splwt_array_search( $sub_array, $key, $value ) );
      }

    }

    return $results;

  }
}

/**
 *
 * Between Microtime
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'splwt_microtime' ) ) {
  function splwt_timeout( $timenow, $starttime, $timeout = 30 ) {
    return ( ( $timenow - $starttime ) < $timeout ) ? true : false;
  }
}

/**
 *
 * Check for wp editor api
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'splwt_wp_editor_api' ) ) {
  function splwt_wp_editor_api() {
    global $wp_version;
    return version_compare( $wp_version, '4.8', '>=' );
  }
}
