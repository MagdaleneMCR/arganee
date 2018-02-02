<?php
/**
 * @package Academica
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class( 'clearfix' ); ?>>

	<p class="entry-meta"><?php
		echo get_post_format_string( 'aside' );
		edit_post_link( __( 'Edit', 'academica' ), '<span class="edit-link"> / ', '</span>' ); ?>
	</p><!-- end .entry-meta -->

	<div class="entry-content clearfix">
		<?php the_content(); ?>
	</div><!-- end .entry-content -->

</div><!-- end #post-## -->