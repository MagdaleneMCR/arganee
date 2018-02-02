<?php
/**
 * @package Academica
 */
class Academica_Featured_Posts_Gallery extends WP_Widget {

	function __construct() {
		$widget_ops = array(
			'classname'   => 'academica-featured-posts-gallery',
			'description' => 'Shows the latest posts with a featured image from a category (or all categories).'
		);
		parent::__construct( 'academica-featured-posts-gallery', 'Academica: Featured Posts Gallery', $widget_ops );

		add_action( 'save_post',    array( &$this, 'flush_widget_cache' ) );
		add_action( 'deleted_post', array( &$this, 'flush_widget_cache' ) );
		add_action( 'switch_theme', array( &$this, 'flush_widget_cache' ) );
	}

	function widget( $args, $instance ) {
		$cache = wp_cache_get( $this->id_base, 'widget' );

		if ( ! is_array( $cache ) )
			$cache = array();

		if ( isset( $cache[ $this->id ] ) ) {
			echo $cache[ $this->id ];
			return;
		}

		ob_start();
		extract( $args, EXTR_SKIP );

		$title      = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );
		$category   = absint( $instance['category'] );
		$amount     = absint( $instance['amount'] );
		$display    = ( 'grid' == $instance['display'] ) ? 'grid' : 'list';
		$count = 0;
		$query_args = array(
			// Get more posts than we need, in case there are not enough post thumbnails
			'posts_per_page' => $amount * 2,
			'no_found_rows' => true,
			'post_status' => 'publish',
			'ignore_sticky_posts' => true
		);

		if ( $category ) {
			$query_args['cat'] = $category;

			if ( ! empty( $title ) ) {
				$title = sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
					esc_url( get_category_link( $category ) ),
					esc_attr( get_cat_name( $category ) ),
					sprintf( _x( '%s &raquo;', 'Widget title link', 'academica' ), $title )
				);
			}
		}

		$r = new WP_Query( $query_args );

		if ( $r->have_posts() ) {

			echo $before_widget;

			if ( $title )
				echo $before_title . $title . $after_title; ?>

			<ul class="posts">

				<?php while( $r->have_posts() && $count < $amount ) : $r->the_post(); ?>

				<li class="clearfix <?php echo ( 'list' == $display ) ? 'post' : 'grid'; ?>">

					<?php if ( '' != get_the_post_thumbnail() ) : ?>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'academica' ), the_title_attribute( 'echo=0' ) ) ); ?>">
							<?php the_post_thumbnail( 'post-thumbnail', array( 'title' => '' ) ); ?>
						</a>
					</div>
					<?php
					elseif ( 'grid' == $display ) : ?>
					<div class="thumb">
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permanent Link to %s', 'academica' ), the_title_attribute( 'echo=0' ) ) ); ?>">
							<span class="thumb-placeholder"></span>
						</a>
					</div>
					<?php
					endif;

					if ( 'list' == $display ) {
						the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( sprintf( __( 'Permanent Link to %s', 'academica' ), the_title_attribute( 'echo=0' ) ) ) . '" rel="bookmark">', '</a></h2>' );
						$excerpt = get_the_excerpt();
						if ( ! empty( $excerpt ) ) {
							echo '<p>' . wp_trim_words( $excerpt, 25 ) . '</p>';
						}
					} ?>
				</li>

				<?php $count++; endwhile; ?>

			</ul><!-- end .posts -->

			<?php
			// Reset the global $the_post as this query will have stomped on it
			wp_reset_postdata();

			echo $after_widget;

			$cache[ $this->id ] = ob_get_flush();
			wp_cache_set( $this->id_base, $cache, 'widget');
		}
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']    = strip_tags( $new_instance['title'] );
		$instance['category'] = absint( $new_instance['category'] );
		$instance['amount']   = absint( $new_instance['amount'] );
		$instance['display']  = ( 'grid' == $new_instance['display'] ) ? 'grid' : 'list';

		$this->flush_widget_cache();

		return $instance;
	}

	function flush_widget_cache() {
		wp_cache_delete( $this->id_base, 'widget' );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'category' => 0, 'amount' => 4, 'display' => 'list' ) );
		$title    = strip_tags( $instance['title'] );
		$category = absint( $instance['category'] );
		$amount   = absint( $instance['amount'] );
		$display  = ( 'grid' == $instance['display'] ) ? 'grid' : 'list';
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'academica' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php _e( 'Choose category:', 'academica' ); ?></label>
			<?php wp_dropdown_categories( array(
				'show_option_all' => __( '- Recent in all categories -', 'academica' ),
				'hide_if_empty' => true,
				'selected' => $category,
				'name' => $this->get_field_name( 'category' ),
				'id' => $this->get_field_id( 'category' ),
				'class' => 'widefat',
				'show_count' => true
			) ); ?>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'amount' ); ?>"><?php _e( 'Number of posts to show:', 'academica' ); ?></label><br />
			<input id="<?php echo $this->get_field_id( 'amount' ); ?>" name="<?php echo $this->get_field_name( 'amount' ); ?>" type="text" value="<?php echo esc_attr( $amount ); ?>" size="3" />
		</p>
		<p>
			<label><?php _e( 'Display as:', 'academica' ); ?></label><br />
			<label>
				<input name="<?php echo $this->get_field_name( 'display' ); ?>" type="radio" value="<?php echo esc_attr( 'list' ); ?>" <?php checked( $display, 'list' ); ?> />
				<?php _e( 'Image list', 'academica' ); ?>
			</label><br />
			<label>
				<input name="<?php echo $this->get_field_name( 'display' ); ?>" type="radio" value="<?php echo esc_attr( 'grid' ); ?>" <?php checked( $display, 'grid' ); ?> />
				<?php _e( 'Image grid', 'academica' ); ?>
			</label>
		</p>

		<?php
	}
}
register_widget( 'academica_Featured_Posts_Gallery' );