<?php
/**
 * Redirect URLs.
 *
 * @package redirections;
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'template_redirect', 'redirections_redirect_url', 1 );

/**
 * Redirect URLs.
 */
function redirections_redirect_url() {

	if ( ! function_exists( 'get_field' ) ) {
		return;
	}

	$redirections      = get_field( 'redirections', 'options' );
	$redirect_from_url = '';

	if ( isset( $_SERVER['REQUEST_URI'] ) ) {
		$redirect_from_url = trailingslashit( esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) ) );
	}

	if ( ! empty( $redirections ) ) {
		foreach ( $redirections as $redirection ) {
			if ( trailingslashit( $redirection['redirect_from'] ) === $redirect_from_url ) {
				wp_safe_redirect( $redirection['redirect_to'], 301 );
				exit;
			}
		}
	}
}
