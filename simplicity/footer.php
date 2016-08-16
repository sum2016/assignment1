<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package simplicity
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'simplicity' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'simplicity' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'simplicity' ), 'simplicity', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' . ' edited by Helen' ); ?>
		</div><!-- .site-info -->
		<?php $options = get_option( 'options_settings');
			if ($options[checkbox_field] == 'on'){?>
			<div class="site-info">
				<p class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" alt="webiste logo"></a>. All Rights Reserved.</p> 
			</div> <?php } ?><!-- .site-info -->
		

		<div id="footer-menu">
			<?php wp_nav_menu( array( 'theme_location'=>'menufoot', 'menu_class'=>'foot-menu')); ?>
		</div><!-- #footer-menu -->
		
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>