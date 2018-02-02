<?php
/**
 * @package Academica
 */

$images = get_children( array(
	'post_parent'    => $post->ID,
	'post_type'      => 'attachment',
	'post_mime_type' => 'image',
	'orderby'        => 'menu_order',
	'order'          => 'ASC',
	'numberposts'    => 999
) );
$show_images = ( $images && ! post_password_required() );

if ( $show_images ) :
	wp_enqueue_script( 'nivo-slider',         get_template_directory_uri() . '/nivo-slider/jquery.nivo.slider.pack.js', array( 'jquery' ),              '3.1',      true );
	wp_enqueue_script( 'academica-slider',    get_template_directory_uri() . '/nivo-slider/nivo.slider.js',             array( 'nivo-slider' ),         '20120927', true );
	wp_enqueue_style(  'nivo-slider-default', get_template_directory_uri() . '/nivo-slider/default.css',                array(),                        '1.3'            );
	wp_enqueue_style(  'nivo-slider',         get_template_directory_uri() . '/nivo-slider/nivo-slider.css',            array( 'nivo-slider-default' ), '3.1'            );

	$images       = array_slice( $images, 0, 10 );
	$total_images = count( $images );
endif;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permanent Link to %s', 'academica' ), the_title_attribute( 'echo=0' ) ) ) . '" rel="bookmark">', '</a></h2>' ); ?>

	<div class="entry-content">
		<?php if ( $show_images ) : ?>

		<div class="gallery-slider theme-default">
				<?php foreach ( $images as $image ) : ?>
				<div class="item">
					<?php echo wp_get_attachment_image( $image->ID, 'academica-gallery' ); ?>
				</div>
				<?php endforeach; ?>
		</div><!-- .gallery-slider -->

		<?php the_excerpt(); ?>

		<p class="gallery-meta">
			<em>
				<?php
				printf(
					_n( 'This gallery contains <strong>%1$s photo</strong>.', 'This gallery contains <strong>%1$s photos</strong>.', $total_images, 'academica' ),
					number_format_i18n( $total_images )
				);
				?>
			</em>
		</p>

		<?php
		else:
			the_content();
		endif; /* if images */ ?>

		<p class="entry-meta">
			<?php
			printf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				esc_url( get_permalink() ),
				esc_attr( sprintf( __( 'Permanent Link to %s', 'academica' ), the_title_attribute( 'echo=0' ) ) ),
				esc_html( get_the_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ) )
			);
			if ( ! post_password_required() && ( comments_open() || 0 != get_comments_number() ) ) :
				echo ' / ';
				comments_popup_link( __( 'Leave a Comment', 'academica' ) );
			endif;

			edit_post_link( __( 'Edit', 'academica' ), '<span class="edit-link"> / ', '</span>' ); ?>
		</p><!-- end .entry-meta -->
	</div><!-- end #entry-content -->
</div><!-- end #post-## -->