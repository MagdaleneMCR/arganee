<?php
/**
 * @package Academica
 */

get_header(); ?>

<div id="content" class="clearfix">

	<div class="column column-title">

		<?php get_template_part( 'breadcrumb' ); ?>

		<h1 class="title-header"><?php
			if ( is_category() ) {
				printf( __( 'Category Archives: %s', 'academica' ), '<span>' . single_cat_title( '', false ) . '</span>' );

			} elseif ( is_tag() ) {
				printf( __( 'Tag Archives: %s', 'academica' ), '<span>' . single_tag_title( '', false ) . '</span>' );

			} elseif ( is_author() ) {
				$authordata = get_userdata( $author );
				printf( __( 'Author Archives: %s', 'academica' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( $authordata->ID, $authordata->user_nicename ) . '" title="' . esc_attr( $authordata->display_name ) . '" rel="me">' . $authordata->display_name . '</a></span>' );

			} elseif ( is_day() ) {
				printf( __( 'Daily Archives: %s', 'academica' ), '<span>' . get_the_date() . '</span>' );

			} elseif ( is_month() ) {
				printf( __( 'Monthly Archives: %s', 'academica' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

			} elseif ( is_year() ) {
				printf( __( 'Yearly Archives: %s', 'academica' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

			} else {
				_e( 'Archives', 'academica' );

			}
		?></h1>
	</div>

	<div class="column column-narrow">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- end .column-narrow -->

	<div id="column-content" class="column column-content posts">

		<?php
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'content', 'archive' );
			endwhile;
			academica_content_nav();
		else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'academica' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>

	</div><!-- end .column-content -->

	<div class="column column-narrow column-last">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- end .column-narrow -->

</div><!-- end #content -->

<?php get_footer(); ?>
