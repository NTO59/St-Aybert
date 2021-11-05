<?php if ( ! defined( 'ABSPATH' ) ) {
	die; } // Cannot access directly.
/**
 *
 * Sanitize
 * Replace letter a to letter b
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'splwt_sanitize_replace_a_to_b' ) ) {
	function splwt_sanitize_replace_a_to_b( $value ) {
		return str_replace( 'a', 'b', $value );
	}
}

/**
 *
 * Sanitize title
 *
 * @since 1.0.0
 * @version 1.0.0
 */
if ( ! function_exists( 'splwt_sanitize_title' ) ) {
	function splwt_sanitize_title( $value ) {
		return sanitize_title( $value );
	}
}

/**
 * Text sanitize.
 *
 * @param [type] $value
 * @return void
 */
function lw_sanitize_text( $value ) {

	$safe_text = filter_var( $value, FILTER_SANITIZE_STRING );
	return $safe_text;

}
