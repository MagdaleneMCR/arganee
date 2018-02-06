<?php
/**
 * @package Academica
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<?php if ( '' != get_the_post_thumbnail() ) : ?>
	<div class="thumb">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr( printf( __( 'Permanent Link to %s', 'academica' ), the_title_attribute( 'echo=0' ) ) ); ?>">
			<?php the_post_thumbnail(); ?>
		</a>
	</div>
	<?php endif;

	the_title( '<h2 align="centered"><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permanent Link to %s', 'academica' ), the_title_attribute( 'echo=0' ) ) ) . '" rel="bookmark">', '</a></h2>' ); ?>

	<p class="entry-meta">
		<?php
		if ( 'post' == get_post_type() && ! is_sticky() ) :
			printf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				esc_url( get_permalink() ),
				esc_attr( sprintf( __( 'Permanent Link to %s', 'academica' ), the_title_attribute( 'echo=0' ) ) ),
				esc_html( get_the_date( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ) )
			);
			if ( ! post_password_required() && ( comments_open() || 0 != get_comments_number() ) ) :
				echo ' / ';
				comments_popup_link( __( 'Leave a Comment', 'academica' ) );
			endif;
		endif;
		edit_post_link( __( 'Edit', 'academica' ), '<span class="edit-link"><span class="sep"> / </span>', '</span>' ); ?>
	</p><!-- end .entry-meta -->
	<div class="entry-summary"><?php the_content(); ?></div>

</div><!-- end #post-## -->
