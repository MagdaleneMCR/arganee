<?php
/**
 * Featured Content Slider.
 *
 * @package Academica
 */

$featured = new WP_Query( array(
	'post_status'   => 'publish',
	'no_found_rows' => true,
	'tax_query'     => array(

// @todo Featured Content support
// 		'relation' => 'OR',
// 		array(
// 			'taxonomy' => 'featured-content',
// 			'field'    => 'slug',
// 			'terms'    => array( 'slider' ),
// 		),

		array(
			'taxonomy' => 'post_tag',
			'field'    => 'slug',
			'terms'    => array( 'slider' ),
		)
	),
	'meta_query'    => array(
		array( 'key' => '_thumbnail_id' )
	)
) );

/* Proceed only if featured posts exist. */
if ( ! $featured->have_posts() ) :
	echo '<hr />';
	return;
endif;

wp_enqueue_script( 'nivo-slider', get_template_directory_uri() . '/nivo-slider/jquery.nivo.slider.pack.js', array( 'jquery' ), '3.1', true );
wp_enqueue_script( 'wpzoom-slider', get_template_directory_uri() . '/nivo-slider/nivo.slider.js', array( 'nivo-slider' ), '20120927', true );
wp_enqueue_style( 'nivo-slider-default', get_template_directory_uri() . '/nivo-slider/default.css', array(), '1.3' );
wp_enqueue_style( 'nivo-slider', get_template_directory_uri() . '/nivo-slider/nivo-slider.css', array( 'nivo-slider-default' ), '3.1' );

?>
<div id="slider-wrap">
	<div id="featured-slider" class="featured-slider theme-default">

		<?php while ( $featured->have_posts() ) : $featured->the_post(); ?>

		<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'wpzoom' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
			<?php the_post_thumbnail( 'wpzoom-featured-thumb' ); ?>
		</a>

		<?php endwhile;  ?>

	</div><!-- end #featured-slider -->
</div><!-- end #slider-wrap -->