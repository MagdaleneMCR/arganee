<?php get_header(); ?>

				<!-- Inner -->
					<div class="inner">
						<header>
							<h1><a href="index.html" id="logo"><?php bloginfo( 'name' ); ?></a></h1>
							<hr />
							<p><?php bloginfo( 'description' ); ?></p>
						</header>
						<?php wp_head(); ?>
						<footer>
							<a href="#banner" class="button circled scrolly">Start</a>
						</footer>
					</div>
		</div>

			<!-- Banner -->
				<section id="banner">
					<header>

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
					</header>
				</section>

			<!-- Carousel >
				<section class="carousel">
					<div class="reel">

						<article>
							<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Pulvinar sagittis congue</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Fermentum sagittis proin</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Sed quis rhoncus placerat</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Ultrices urna sit lobortis</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Varius magnis sollicitudin</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Pulvinar sagittis congue</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic02.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Fermentum sagittis proin</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic03.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Sed quis rhoncus placerat</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic04.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Ultrices urna sit lobortis</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

						<article>
							<a href="#" class="image featured"><img src="images/pic05.jpg" alt="" /></a>
							<header>
								<h3><a href="#">Varius magnis sollicitudin</a></h3>
							</header>
							<p>Commodo id natoque malesuada sollicitudin elit suscipit magna.</p>
						</article>

					</div>
				</section-->


                <div class="column column-narrow column-last">
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                </div><!-- end .column-narrow -->
            <?php dynamic_sidebar( 'left-sidebar' ); ?>
            <?php dynamic_sidebar( 'sidebar-2' );?>
            <?php dynamic_sidebar( 'sidebar-3' );?>
            <?php dynamic_sidebar( 'sidebar-4' );?>
            <?php dynamic_sidebar( 'sidebar-5' );?>
            <?php dynamic_sidebar( 'sidebar-6' );?>
            <?php dynamic_sidebar( 'sidebar-7' );?>
            <?php dynamic_sidebar( 'sidebar-8' );?>
                </div>

<?php get_footer(); ?>
