<?php

	/*
	Plugin Name: Get Template Part With Data
	Plugin URI: #
	Description: An extension to the get_template_part() function to allow the template calling the part to pass some data
	Version: 1.0.0
	Author: Richard Tape and #BRITEWEB
	Author URI: http://briteweb.com/
	License: GPLv2 or later
	*/

	/* --------------------------------------------------------------------------------------

		NOTE: This plugin is for theme developers. It doesn't add anything to the dashboard,
		or anything fancy to the front-end of your site by default. It is simply a function
		to enable a theme author to fetch a template part and pass it some data in the process.
		Please don't expect any whizzbangs or doodads.

	-------------------------------------------------------------------------------------- */

	if( !function_exists( 'get_template_part_with_data' ) ) :

		/**
		 * An extension to the get_template_part() WordPress function to allow you to pass
		 * the template part some data.
		 *
		 * Example
		 * -------
		 *
		 * $data = 'Something to pass to the template part';
		 * $more_data = array( 'some' => 'thing', 'foo' => 'bar' );
		 * get_template_part_with_data( 'templates/parts/loop', 'main', array( 'data' => $data, 'more_data' => $more_data ) ); ?>
		 *
		 * Then, in your theme's template/parts/loop-main.php file you use
		 * global $template_data; $data = $template_data['data']; $more_data = $template_data['more_data'];
		 *
		 *
		 * @author Richard Tape <@richardtape>, BRITEWEB <@briteweb>
		 * @package get-template-part-with-data
		 * @since 1.0
		 * @param string $slug The slug name for the generic template.
		 * @param string $name The name of the specialised template.
		 * @param array $data
		 * @uses do_action() Calls 'get_template_part_{$slug}'
		 * @uses get_template_part() to, err, get this template part
		 */

		function get_template_part_with_data( $slug, $name = null, $data = array() )
		{

			// $slug is required
			if( !is_string( $slug ) )
				return new WP_Error( '1', '$slug must be a string - a template part slug' );

			if( $name && !is_string( $name ) )
				return new WP_Error( '2', '$name must be a string - the name of the specialised template' );

			// Run an action a la get_template_part()
			do_action( "get_template_part_{$slug}", $slug, $name, $data );

			// Temporarily globalise this data - immediately unset after the template part is loaded
			global $template_data;

			// Set up and check our data as array (so we can merge)
			if ( !is_array( $template_data['template'] ) )
				$template_data['template'] = array();

			if ( !is_array( $data ) )
				$data = array();

			// Merge
			$template_data = array_merge( $template_data['template'], $data );

			// Load the template part
			get_template_part( $slug, $name );

			// Unset the data
			unset( $template_data['template'] );

		}/* get_template_part_with_data() */

	endif;

?>