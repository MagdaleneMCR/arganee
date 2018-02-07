<!-- Footer -->
	<div id="footer">
		<div class="container">
			<div class="row">

				<!-- Tweets -->
					<section class="6u 12u(mobile)">
						<header>
							<h2 class="icon fa-twitter circled"><span class="label">Tweets</span></h2>
						</header>
						<?php dynamic_sidebar( 'sidebar-6' );?>
						</section>

				<!-- Posts -->
				<section class="6u 12u(mobile)">
						<header>
							<h2 class="icon fa-file circled"><span class="label">Posts</span></h2>
						</header>
							<?php dynamic_sidebar( 'sidebar-7' );>
					</section>

				<!-- Photos >
					<section class="4u 12u(mobile)">
						<header>
							<h2 class="icon fa-camera circled"><span class="label">Photos</span></h2>
						</header>
						<div class="row 25%">

					</section-->

			</div>
			<hr />
			<div class="row">
				<div class="12u">

					<!-- Contact -->
						<section class="contact">
								<?php dynamic_sidebar( 'right-sidebar' );?>
						</section>

					<!-- Copyright -->
						<div class="copyright">
							<ul class="menu">
								<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>

				</div>

			</div>
		</div>
	</div>

</div>


<?php wp_footer(); ?>
		<!-- Scripts -->

		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/jquery.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/jquery.dropotron.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/jquery.scrolly.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/jquery.onvisible.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/skel.min.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/util.js"></script>
		<script src="<?php echo get_stylesheet_directory_uri()?>/assets/js/main.js"></script>

	</body>
</html>
