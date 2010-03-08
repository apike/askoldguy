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
	var ok = true;
	
	// Update the post title field to make question answering easier
	
	if (jQuery('input#title').length) {
		// There's a title field here. Replace it with a textarea.
		var title_value = jQuery('input#title').attr('value');
		var title_field = jQuery("<textarea id='title' name='post_title'></textarea>").html(title_value);
		jQuery('input#title').replaceWith(title_field);
	}

	// Update dashboard Comments widget title and button
	
	jQuery('#dashboard_recent_comments h3.hndle')
		.text("Recent Comments & Questions");
	jQuery('#postexcerpt h3.hndle')
		.text('The Old Guy Question'); // need to use comments full page for actual text


	// Add an action to each row for answering questions
	jQuery('.comment .row-actions')
		.each(function(i, d) {
			// first try getting the CID from the hidden form field
			var cid = jQuery(d)
					.parent().parent()
					.find('th.check-column input').val();
			
			// next, try getting the CID from the TRASH anchor
			if (cid == undefined) {
				var del = jQuery(d).find('a.delete').attr('href');
				cid = del.match(/c=([^&]+)/)[1]; // parse it out of the GET params	
			}

			// if that fails, mark failure
			if (cid == undefined) {
				ok = false;
				return;
			};
						
			// hook the comment/question menues
			jQuery(d) 
				.css({ /* update the look of the action bar (so CH sees it) */ 
					backgroundColor: '#f7f7f7',
					padding: '2px 6px',
					'border-radius': '5px', '-webkit-border-radius': '5px', '-moz-border-radius': '5px'
				})
			.append( /* add a custom action */ 
				' | ' + 
				'<span class="edit">' +
				'<a href="'+ cid +'"' +
					'onclick="return false;"' + 
					'class="answerator" ' +
					'title="Hey old guy: answer this comment as a question."><b>Answer this question!</b></a>' + 
				'</span>'
			);		
	});
	
	// handle the ANSWER clicks
	jQuery('a.answerator').click(function() {
		var	cid = jQuery(this).attr('href');

		// post to our ajax proxy (in this plugin below)
		jQuery.post(
			ajaxurl, { 
				action: 'qa_post',
				comment: cid
			},
			function(d) {	
				window.location.replace(d); // redirect after posting
			});	
		
	});
	
	
	if (!ok)
		alert("JustAskOldGuy plugin failed: contact Allen or Bruce for tech support.");

</script>
<?php
}
 
add_action('admin_footer', 'qa_javascript');
add_action('wp_ajax_qa_post', 'qa_quick_post');

// Answer question AJAX handler
function qa_quick_post() {
	global $wpdb;
	
	/* NOTE: this should use get_comment, but it wasn't working in this context for whatever reason */
	
	$commend_ID = $_POST['comment'];
	
	$comment = $wpdb->get_row(
		$wpdb->prepare("SELECT * FROM $wpdb->comments WHERE comment_ID = %d LIMIT 1", $commend_ID));

	$question 	= $comment->comment_content;
	$who 		= $comment->comment_author;
	$when 		= $comment->comment_date;

	$post = array(
		'post_status' 	=> 'draft', 
		'post_type' 	=> 'post',
		'post_title'	=> "Just Ask Oldguy question from $who",
		'post_excerpt' 	=> $question,
		'post_content' 	=>  "" );
	
		
	$id = wp_insert_post( $post );
	add_post_meta($id, 'asker', $who);
	wp_set_comment_status( $commend_ID, 'approve' );

	echo "/wp-admin/post.php?action=edit&post=$id";
	die;
}
 
?>