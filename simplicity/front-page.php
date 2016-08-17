<?php
/**
 * The template for displaying front page.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simplicity
 */

get_header();
?>
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
			$home = array( 'post_type' => 'home', 'posts_per_page' => 1 );
			$query = new WP_Query( $home );
				while ( $query->have_posts() ) : $query->the_post();
				  echo '<div class="home-ontent">';
				  the_content();
				  echo '</div>';
				endwhile;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar();
get_footer();