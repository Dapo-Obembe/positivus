<?php
/**
 * These functions handle the fetching of country data
 *
 * NOTE: This is for testing sake. You can figure out a way to make the
 * separation of concerns
 */

// Enqueue the AJAX assets.
if ( ! function_exists( 'psv_enqueue_mycountry_assets' ) ) {
	function psv_enqueue_mycountry_assets() {
		if ( has_block( 'acf/country' ) ) {
			// Pass PHP variables to our JavaScript file.
			wp_localize_script(
				'country-script',
				'mycountry_ajax_obj',
				array(
					'ajax_url' => admin_url( 'admin-ajax.php' ),
					'nonce'    => wp_create_nonce( 'mycountry-nonce' ),
				)
			);
		}
	}
}
add_action( 'acf/enqueue_scripts', 'psv_enqueue_mycountry_assets' );

// This function will run when our JavaScript sends a request.
if ( ! function_exists( 'psv_fetch_country_data_handler' ) ) {
	function psv_fetch_country_data_handler() {
		// Security Check: Verify the nonce.
		if ( ! check_ajax_referer( 'mycountry-nonce', 'nonce', false ) ) {
			wp_send_json_error( array( 'message' => 'Invalid security token.' ), 403 );
			wp_die();
		}

		// Get and sanitize the country name from the JS request.
		$country_name = isset( $_POST['country'] ) ? sanitize_text_field( $_POST['country'] ) : '';
		if ( empty( $country_name ) ) {
			wp_send_json_error( array( 'message' => 'Country name cannot be empty.' ), 400 );
			wp_die();
		}

		// Call the external API using WordPress function.
		$url      = "https://restcountries.com/v3.1/name/{$country_name}?fullText=true";
		$response = wp_remote_get( $url );

		// Handle API errors.
		if ( is_wp_error( $response ) ) {
			wp_send_json_error( array( 'message' => 'Failed to contact the API.' ), 500 );
			wp_die();
		}

		$response_code = wp_remote_retrieve_response_code( $response );
		$body          = wp_remote_retrieve_body( $response );
		$data          = json_decode( $body, true );

		if ( $response_code !== 200 || empty( $data ) ) {
			wp_send_json_error( array( 'message' => 'Country not found.' ), 404 );
			wp_die();
		}

		// Format the data and send a success response.
		$country_data = $data[0];
		$currency_key = array_key_first( $country_data['currencies'] );

		$formatted_data = array(
			'flag'           => esc_url( $country_data['flags']['svg'] ),
			'officialName'   => esc_html( $country_data['name']['official'] ),
			'commonName'     => esc_html( $country_data['name']['common'] ),
			'capital'        => isset( $country_data['capital'][0] ) ? esc_html( $country_data['capital'][0] ) : 'N/A',
			'continent'      => isset( $country_data['continents'][0] ) ? esc_html( $country_data['continents'][0] ) : 'N/A',
			'population'     => number_format( $country_data['population'] ),
			'currencyName'   => esc_html( $country_data['currencies'][ $currency_key ]['name'] ),
			'currencySymbol' => esc_html( $country_data['currencies'][ $currency_key ]['symbol'] ),
			'languages'      => esc_html( implode( ', ', $country_data['languages'] ) ),
			'timezone'       => esc_html( $country_data['timezones'][0] ),
			'weekStarts'     => esc_html( ucfirst( $country_data['startOfWeek'] ) ),
		);

		wp_send_json_success( $formatted_data );

		wp_die(); // This is required to terminate immediately and return a proper response.
	}
}

// Hook our handler function to WordPress's AJAX actions.
add_action( 'wp_ajax_fetch_country_data', 'psv_fetch_country_data_handler' ); // For logged-in users.
add_action( 'wp_ajax_nopriv_fetch_country_data', 'psv_fetch_country_data_handler' ); // For logged-out users.
