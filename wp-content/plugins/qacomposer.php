<?php
/**
 * @package QandA=
 * @author Allen Pike
 */
/*
Plugin Name: Question and Answer Composer
Plugin URI: http://antipode.ca/
Description: This improves the post editing screen for using the title field as questions for a Q&A site.
Author: Allen Pike
Version: 0.1
Author URI: http://antipode.ca/
*/

// Monkey patch the admin screen
function qa_javascript() {

	?>

	<script type='text/javascript'>
		if (jQuery('input#title').length) {
			// There's a title field here. Replace it with a textarea.
			var title_value = jQuery('input#title').attr('value');
			var title_field = jQuery("<textarea id='title' name='post_title'></textarea>").html(title_value);
			jQuery('input#title').replaceWith(title_field);
		}
	</script>

	<?php
}

add_action('admin_footer', 'qa_javascript');

?>
