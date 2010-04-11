<?php
/*
Template Name: Ask

Use:
1. Add a page based on this temlpate
2. Add a page titled "/ask/thank-you"
*/

get_header(); 
?>

<div id="content">

<?php 
if (have_posts()) {
	while (have_posts()) {
		the_post(); 
?>
		<div <?php post_class('box') ?>>
		<h2><?php the_title(); ?></h2>
		<?php edit_post_link('edit'); ?>
		<?php the_content(); ?> 

		<form id="question" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

			<ul>
				<li>
					<label for="author">Name</label>	
					<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="First and Last name" autofocus required />
				</li>

				<li>
					<label for="email">Email</label>
					<input type="email" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="you@yourdomain.com" required />

				</li>

				<li>
					<textarea name="comment" required></textarea>
				</li>
				<li>
					<input name="submit" type="submit" id="submit" value="Ask it!" />
					<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
					<input type="hidden" name="redirect_to" value="<?php echo get_option('siteurl'); ?>/thank-you" />
				</li>
				<?php do_action('comment_form', $post->ID); ?>
			</ul>
		</form>
		</div>
<?php 
	} 
} ?>



</div>

<?php get_footer(); ?>
