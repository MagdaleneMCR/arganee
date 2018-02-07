<?php get_header(); ?>

<div class="inner">
	<header>
		<h1><a d="logo"><?php single_post_title(); ?></a></h1>
	</header>
</div>

</div>

<div class="wrapper style1">

	<div id="content" class="container">
		<article id="main" class="special">



					<?php while ( have_posts() ) : the_post(); ?>

					<!--?php if ( 'column-full' != $post_layout ) : ?-->

						<!--?php dynamic_sidebar( 'sidebar-1' ); ?-->

					<!--?php endif; ?-->


					<section>

						<?php get_template_part( 'content', 'single' ); ?>


							<?php previous_post_link( '<span class="alignleft">%link</span>', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'academica' ) . '</span> %title' ); ?>
							<?php next_post_link( '<span class="alignright">%link</span>', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'academica' ) . '</span>' ); ?>
						<!-- end .navigation -->
					</section>
					<section>

						<?php comments_template(); ?>
					</section>


					<!--?php if ( 'column-full' != $post_layout && 'column-right' != $post_layout ) : ?-->

						<!--?php dynamic_sidebar( 'sidebar-2' ); ?-->

					<!--?php endif; ?-->

					<?php endwhile; ?>


		</article>

	</div><!-- end #content -->
</div>

<?php get_footer(); ?>
