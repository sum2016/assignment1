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
		if (have_posts()) :
			if (is_front_page() && ! is_home()) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;
			$portfolio = array( 'post_type' => 'Portfolio', 'posts_per_page' => 1 );
			$query = new WP_Query( $portfolio );
				while ( $query->have_posts() ) : $query->the_post();
					get_template_part( 'template-parts/content', get_post_format() );

					echo 'Advertisement Link: ' . get_post_meta(get_the_ID(), 'link_key', true);
				
				endwhile;

		the_posts_navigation(
			array(
			'mid_size' => 2,
			'prev_text' => __('&larr; Older Anlysis', '&larr; Older Anlysis'),
			'next_text'=> __('Recent Anlysis &rarr;', 'Recent Anlysis &rarr;')
			)
		);
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();