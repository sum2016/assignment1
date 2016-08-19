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
		<div id="footer-menu">
			<?php wp_nav_menu( array( 'theme_location'=>'menufoot', 'menu_class'=>'foot-menu')); ?>
		</div><!-- #footer-menu -->
		<div id="footer_widget">
	            <?php if ( is_active_sidebar( 'footer_widget' ) ) : ?>
	                <aside id="widget-foot" class="widget-foot">
	                    <?php dynamic_sidebar( 'footer_widget' ); ?>
	                </aside>
	            <?php endif; ?>
	        </div><!-- end #footer-widgets -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'simplicity' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'simplicity' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'simplicity' ), 'simplicity', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' . ' edited by Helen' ); ?>
		</div><!-- .site-info -->
		
		<?php
			$options = get_option( 'options_settings'); //Applying Theme Options Setting
				if ($options[checkbox_field] == 'on'){
					if ($options[text_field] == !null){
						echo '&copy ' . $options['text_field'];
					}
					else{ ?>
						<div class="site-info">
							<p class="copyright">&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" alt="webiste logo"></a>. All Rights Reserved.</p> 
						</div><!-- .site-info -->
					<?php }
				}
		?>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>