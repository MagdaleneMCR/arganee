<?php get_header(); ?>

<div class="inner">
	<header>
		<h1><a d="logo"><?php single_post_title(); ?></a></h1>
	</header>
</div>

</div> <!--ends headers-->



<div class="wrapper style1">

	<div class="container">
		<article id="main" class="special">
			<?php
					if ( is_page() ) :

						if ( have_posts() )
							the_post();
							get_template_part( 'content', 'page' );

						dynamic_sidebar( 'sidebar-8' );

					elseif ( have_posts() ) :

						while ( have_posts() ) :
							the_post();
							get_template_part( 'content', get_post_format() );
						endwhile;


					endif;  ?>
		</article>
	</div>

</div>

<?php get_footer(); ?>
