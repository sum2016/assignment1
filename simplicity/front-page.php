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
			$portfolio = array( 'post_type' => 'Portfolio', 'posts_per_page' => 4 );
			$query = new WP_Query( $portfolio );
				while ( $query->have_posts() ) : $query->the_post();
get_template_part( 'template-parts/content', get_post_format() );


				endwhile;
		the_posts_navigation();

		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();