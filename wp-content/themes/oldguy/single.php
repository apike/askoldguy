<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>

	<div id="content" class="widecolumn" role="main">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class('box') ?> id="post-<?php the_ID(); ?>">
			<h2><?php the_excerpt(); ?>
				<span class='asker'>- Silent Bob</style></h2>
			
			<p class='date'><?php the_time('F jS, Y') ?></p>
			

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>

				<p class="postmetadata alt">
					<?php edit_post_link('Edit this entry','','.'); ?>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>
