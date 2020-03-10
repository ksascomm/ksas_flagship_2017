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

		</div>
		<footer class="footer">
			<div class="footer-container">
				<?php do_action( 'foundationpress_before_footer' ); ?>
				<?php dynamic_sidebar( 'footer-widgets' ); ?>
				<?php do_action( 'foundationpress_after_footer' ); ?>
				<div class="row">
					<div class="small-12 medium-5 large-4 columns">
						<a href="https://www.jhu.edu/">
							<img class="jhushield" src="<?php echo get_template_directory_uri() ?>/assets/images/jhu-horizontal.png" alt="Johns Hopkins University">
						</a>
					</div>
					<div class="small-12 medium-4 large-5 columns">
						<ul id="menu-footer-links" class="menu simple" role="menu">
							<li role="menuitem"><a href="https://accessibility.jhu.edu/" target="_blank">Accessibility</a></li>	
							<li role="menuitem"><a href="https://jobs.jhu.edu/" target="_blank">Careers</a></li>
							<li role="menuitem"><a href="https://livejohnshopkins.sharepoint.com/sites/KSASFacultyHandbook">Faculty Handbook</a></li>
							<li role="menuitem"><a href="https://it.johnshopkins.edu/policies/privacystatement">Privacy Statement</a></li>
						</ul>
					</div>
					<div class="small-12 medium-3 columns social-media hide-for-small-only">
						<a href="https://www.tiktok.com/@jhuartssciences"><svg xmlns="http://www.w3.org/2000/svg" height="2rem" viewBox="-32 0 512 512" width="2rem"><g><path d="m432.734375 112.464844c-53.742187 0-97.464844-43.722656-97.464844-97.464844 0-8.285156-6.714843-15-15-15h-80.335937c-8.28125 0-15 6.714844-15 15v329.367188c0 31.59375-25.707032 57.296874-57.300782 57.296874s-57.296874-25.703124-57.296874-57.296874c0-31.597657 25.703124-57.300782 57.296874-57.300782 8.285157 0 15-6.714844 15-15v-80.335937c0-8.28125-6.714843-15-15-15-92.433593 0-167.632812 75.203125-167.632812 167.636719 0 92.433593 75.199219 167.632812 167.632812 167.632812 92.433594 0 167.636719-75.199219 167.636719-167.632812v-145.792969c29.851563 15.917969 63.074219 24.226562 97.464844 24.226562 8.285156 0 15-6.714843 15-15v-80.335937c0-8.28125-6.714844-15-15-15zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#fff"/></g></svg></a>
						<a href="https://www.youtube.com/jhuartssciences"><span class="fab fa-youtube fa-2x"></span><span class="screen-reader-text">YouTube</span></a>
						<a href="https://twitter.com/JHUArtsSciences"><span class="fab fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a>
						<a href="https://www.instagram.com/JHUArtsSciences/"><span class=" fab fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a>
						<a href="http://facebook.com/JHUArtsSciences"><span class="fab fa-facebook-square fa-2x"></span><span class="screen-reader-text">Facebook</span></a>
					</div>
				</div>
				<div class="row">	
					<div class="small-12 columns copydate">						
						<p>&copy; <?php print date('Y'); ?> Johns Hopkins University, Zanvyl Krieger School of Arts & Sciences, 3400 N. Charles St, Baltimore, MD 21218</p>
					</div>
				</div>
			</div>
		</footer>	

		<?php do_action( 'foundationpress_layout_end' ); ?>

<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
	</div><!-- Close off-canvas wrapper -->
<?php endif; ?>


<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>
</body>
</html>
