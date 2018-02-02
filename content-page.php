<?php
/**
 * @package Academica
*/
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content clearfix">
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<p class="pages"><strong>' . __( 'Pages:', 'academica' ) . '</strong>',
			'after' => '</p>',
			'next_or_number' => 'number'
		) ); ?>
	</div><!-- end .entry-content -->

	<div class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'academica' ), '<span class="edit-link">', '</span>' ); ?>
	</div><!-- end .entry-meta -->

</div><!-- end #post-## -->
