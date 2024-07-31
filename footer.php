<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package highvis
 */

?>

	<footer id="colophon" class="site-footer">
		<span>Copyright &copy; High Vis <?php echo date("Y"); ?></span>
	</footer><!-- #colophon -->
</div><!-- #page -->


<script>
	/* Sub-menu */
	jQuery('.menu-item-has-children').on('mouseenter', function() {
		jQuery(this).find('.sub-menu').css('display', 'grid');
	});
	jQuery('.sub-menu').on('mouseleave', function() {
		jQuery(this).css('display', 'none');
	});

	/* Preorder Modal */
	jQuery('.pre-order-link').on('click', function() {
		jQuery('.preorder--modal').css('display', 'block');

		setTimeout(function() {

			jQuery('.preorder--modal').animate({
				top: '50%'
			}, 300);
			
		}, 300);

	});

	jQuery('.close-preorder-modal').on('click', function() {
		jQuery('.preorder--modal').animate({
			top: '-150%'
		}, 300);

		setTimeout(function() {
			jQuery('.preorder--modal').css('display', 'none');
		}, 300);
	});	

	/* Mobile Overlay */
	jQuery('.hamburger').on('click', function() {
		jQuery('.mobile-overlay').css({
			left: '0vw',
			right: '0vw'
		});
	});
	jQuery('.mobile-overlay-close').on('click', function() {
		jQuery('.mobile-overlay').css({
			left: '100vw',
			right: '-100vw'
		});
	});
</script>

<!--  
<script src="https://unpkg.com/scrollreveal"></script>

<script>
	ScrollReveal().reveal('.scroll-reveal', { delay: 300, reset: true });
</script>
-->

<div class="floating-socials">
	<?php get_template_part('template-parts/social-media-icons'); ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
