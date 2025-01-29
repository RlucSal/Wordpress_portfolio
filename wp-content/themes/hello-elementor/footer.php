<?php
/**
 * The template for displaying the footer.
 *
 * Contains the body & html closing tags.
 *
 * @package HelloElementor
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; 
}

if ( ! function_exists( 'elementor_theme_do_location' ) || ! elementor_theme_do_location( 'footer' ) ) {
	
	echo do_shortcode('[hfe_template id="310"]');
}

?>

<?php wp_footer(); ?>

</body>
</html>
