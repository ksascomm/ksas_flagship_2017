<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

		</section>
		<div id="footer-container">
			<footer id="footer">
				<?php do_action( 'foundationpress_before_footer' ); ?>
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
				<?php do_action( 'foundationpress_after_footer' ); ?>

				<div class="row float-right social-media hide-for-small-only">
					<a href="http://facebook.com/jhuksas" title="Facebook"><span class="fa fa-facebook-official fa-2x"></span><span class="screen-reader-text">Facebook</span></a>
					<a href="https://www.youtube.com/user/jhuksas" title="YouTube"><span class="fa fa-youtube-square fa-2x"></span><span class="screen-reader-text">YouTube</span></a>
				</div>
				<div class="row">
					<div class="small-12 medium-4 columns">
						<img class="jhushield" src="<?php echo get_template_directory_uri() ?>/assets/images/jhu-vertical.png" alt="Johns Hopkins University">
					</div>
						<div class="small-12 medium-8 columns margin4">
						<div class="row">
							<div class="small-12 columns">
								<ul id="menu-footer-links" class="menu simple hide-for-small-only" role="menu">
									<li role="menuitem"><a href="http://krieger.jhu.edu/faculty-jobs/">Employment</a></li>	
									<li role="menuitem"><a href="https://www.jhu.edu/alert/">Emergency Alerts</a></li>
								</ul>
								<div class="row">
									<div class="small-12 columns">
										<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, Zanvyl Krieger School of Arts & Sciences, 3400 N. Charles St, Baltimore, MD 21218</p>
									</div>
								</div>	
							</div>
						</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		</div><!-- Close off-canvas content -->
	</div><!-- Close off-canvas wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
