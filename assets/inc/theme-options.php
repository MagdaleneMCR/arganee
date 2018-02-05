<?php
/**
 * Academica Theme Options
 *
 * @package Academica
 * @since Academica 1.2.2-wpcom
 */

/**
 * Register the form setting for our academica_options array.
 *
 * This function is attached to the admin_init action hook.
 *
 * This call to register_setting() registers a validation callback, academica_theme_options_validate(),
 * which is used when the option is saved, to ensure that our option values are properly
 * formatted, and safe.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_theme_options_init() {
	register_setting(
		'academica_options', // Options group, see settings_fields() call in academica_theme_options_render_page()
		'academica_theme_options', // Database option, see academica_get_theme_options()
		'academica_theme_options_validate' // The sanitization callback, see academica_theme_options_validate()
	);

	// Register our settings field group
	add_settings_section(
		'social', // Unique identifier for the settings section
		__( 'Social Profiles', 'academica' ), // Section title
		'academica_settings_section_social', // Section callback
		'theme_options' // Menu slug, used to uniquely identify the page; see academica_theme_options_add_page()
	);

	// Register our individual settings fields
	add_settings_field( 'twitter',  __( 'Twitter URL',  'academica' ), 'academica_settings_field_twitter',  'theme_options', 'social', array( 'label_for' => 'twitter'  ) );
	add_settings_field( 'flickr',   __( 'Flickr URL',   'academica' ), 'academica_settings_field_flickr',   'theme_options', 'social', array( 'label_for' => 'flickr'   ) );
	add_settings_field( 'facebook', __( 'Facebook URL', 'academica' ), 'academica_settings_field_facebook', 'theme_options', 'social', array( 'label_for' => 'facebook' ) );
	add_settings_field( 'linkedin', __( 'LinkedIn URL', 'academica' ), 'academica_settings_field_linkedin', 'theme_options', 'social', array( 'label_for' => 'linkedin' ) );
	add_settings_field( 'youtube',  __( 'YouTube URL',  'academica' ), 'academica_settings_field_youtube',  'theme_options', 'social', array( 'label_for' => 'youtube'  ) );
}
add_action( 'admin_init', 'academica_theme_options_init' );

/**
 * Change the capability required to save the 'academica_options' options group.
 *
 * @see academica_theme_options_init() First parameter to register_setting() is the name of the options group.
 * @see academica_theme_options_add_page() The edit_theme_options capability is used for viewing the page.
 *
 * @param string $capability The capability used for the page, which is manage_options by default.
 * @return string The capability to actually use.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_option_page_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_academica_options', 'academica_option_page_capability' );

/**
 * Add our theme options page to the admin menu.
 *
 * This function is attached to the admin_menu action hook.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_theme_options_add_page() {
	$theme_page = add_theme_page(
		__( 'Theme Options', 'academica' ), // Name of page
		__( 'Theme Options', 'academica' ), // Label in menu
		'edit_theme_options', // Capability required
		'theme_options', // Menu slug, used to uniquely identify the page
		'academica_theme_options_render_page' // Function that renders the options page
	);
}
add_action( 'admin_menu', 'academica_theme_options_add_page' );

/**
 * Returns the options object for Academica.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_get_theme_options() {
	return (object) wp_parse_args(
		get_option( 'academica_theme_options', array() ),
		academica_default_theme_options()
	);
}

/**
 * Returns the default options array for Academica.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_default_theme_options() {
	$defaults = array(
		'twitter'  => '',
		'flickr'   => '',
		'facebook' => '',
		'linkedin' => '',
		'youtube'  => '',
	);

	return apply_filters( 'academica_default_theme_options', $defaults );
}

/**
 * Echoes the description for the Social settings section.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_settings_section_social() {
	_e( 'Add social networking icons to the top of the theme by entering the URLs to your profiles.', 'academica' );
}

/**
 * Renders the Twitter URL setting field.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_settings_field_twitter() {
	$options = academica_get_theme_options();
	?>
	<input type="text" class="regular-text code" name="academica_theme_options[twitter]" id="twitter" value="<?php echo esc_url( $options->twitter ); ?>" />
	<?php
}

/**
 * Renders the Flickr URL setting field.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_settings_field_flickr() {
	$options = academica_get_theme_options();
	?>
	<input type="text" class="regular-text code" name="academica_theme_options[flickr]" id="flickr" value="<?php echo esc_url( $options->flickr ); ?>" />
	<?php
}

/**
 * Renders the Facebook URL setting field.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_settings_field_facebook() {
	$options = academica_get_theme_options();
	?>
	<input type="text" class="regular-text code" name="academica_theme_options[facebook]" id="facebook" value="<?php echo esc_url( $options->facebook ); ?>" />
	<?php
}

/**
 * Renders the LinkedIn URL setting field.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_settings_field_linkedin() {
	$options = academica_get_theme_options();
	?>
	<input type="text" class="regular-text code" name="academica_theme_options[linkedin]" id="linkedin" value="<?php echo esc_url( $options->linkedin ); ?>" />
	<?php
}

/**
 * Renders the YouTube URL setting field.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_settings_field_youtube() {
	$options = academica_get_theme_options();
	?>
	<input type="text" class="regular-text code" name="academica_theme_options[youtube]" id="youtube" value="<?php echo esc_url( $options->youtube ); ?>" />
	<?php
}

/**
 * Renders the Theme Options administration screen.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_theme_options_render_page() {
	?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', 'academica' ), wp_get_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php
				settings_fields( 'academica_options' );
				do_settings_sections( 'theme_options' );
				submit_button();
			?>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate form input. Accepts an array, return a sanitized array.
 *
 * @see academica_theme_options_init()
 *
 * @param array $input Unknown values.
 * @return array Sanitized theme options ready to be stored in the database.
 *
 * @since Academica 1.2.2-wpcom
 */
function academica_theme_options_validate( $input ) {
	$output = $defaults = academica_default_theme_options();

	// URLs must be a safe for database usage
	if ( isset( $input['twitter'] ) && ! empty( $input['twitter'] ) )
		$output['twitter'] = esc_url_raw( $input['twitter'] );

	if ( isset( $input['flickr'] ) && ! empty( $input['flickr'] ) )
		$output['flickr'] = esc_url_raw( $input['flickr'] );

	if ( isset( $input['facebook'] ) && ! empty( $input['facebook'] ) )
		$output['facebook'] = esc_url_raw( $input['facebook'] );

	if ( isset( $input['linkedin'] ) && ! empty( $input['linkedin'] ) )
		$output['linkedin'] = esc_url_raw( $input['linkedin'] );

	if ( isset( $input['youtube'] ) && ! empty( $input['youtube'] ) )
		$output['youtube'] = esc_url_raw( $input['youtube'] );

	return apply_filters( 'academica_theme_options_validate', $output, $input, $defaults );
}

/**
 * Adds social icons settings to the Theme Customizer.
 *
 * @since Academica 1.2.2-wpcom
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function academica_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'academica_social_icons', array(
		'title'    => __( 'Header Social Icons', 'academica' ),
		'priority' => 61, // right after Header Image
	) );

	// Add settings
	foreach ( array_keys( academica_default_theme_options() ) as $setting ) {
		$wp_customize->add_setting( "academica_theme_options[{$setting}]", array(
			'default'           => academica_get_theme_options()->$setting,
			'type'              => 'option',
			'sanitize_callback' => 'esc_url'
		) );
	}

	$wp_customize->add_control( 'academica_social_icon_twitter', array(
		'label'    => __( 'Twitter URL', 'academica' ),
		'section'  => 'academica_social_icons',
		'settings' => 'academica_theme_options[twitter]',
		'type'     => 'text',
	) );

	$wp_customize->add_control( 'academica_social_icon_flickr', array(
		'label'    => __( 'Flickr URL', 'academica' ),
		'section'  => 'academica_social_icons',
		'settings' => 'academica_theme_options[flickr]',
		'type'     => 'text',
	) );

	$wp_customize->add_control( 'academica_social_icon_facebook', array(
		'label'    => __( 'Facebook URL', 'academica' ),
		'section'  => 'academica_social_icons',
		'settings' => 'academica_theme_options[facebook]',
		'type'     => 'text',
	) );

	$wp_customize->add_control( 'academica_social_icon_linkedin', array(
		'label'    => __( 'LinkedIn URL', 'academica' ),
		'section'  => 'academica_social_icons',
		'settings' => 'academica_theme_options[linkedin]',
		'type'     => 'text',
	) );

	$wp_customize->add_control( 'academica_social_icon_youtube', array(
		'label'    => __( 'YouTube URL', 'academica' ),
		'section'  => 'academica_social_icons',
		'settings' => 'academica_theme_options[youtube]',
		'type'     => 'text',
	) );
}
add_action( 'customize_register', 'academica_customize_register' );