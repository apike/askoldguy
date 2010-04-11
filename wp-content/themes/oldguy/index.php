<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

function shorten_question($question_text) {
	$max_q_length = 200;
	
	if (strlen($question_text) > $max_q_length) {
		$question_text = substr_replace($question_text, "...", $max_q_length);
	}
	
	return $question_text;
}


get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class('box') ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_excerpt(); ?>
					<?php if ($asker = get_post_meta(get_the_ID(), 'asker', true)) { ?>
						<span class='asker'>- <?php print $asker; ?></style>
					<?php } ?>
					</h2>
				<p class='date'><?php the_time('F jS, Y') ?></p>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata column_links"><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'first'); ?> <a href="<?php the_permalink() ?>" rel="bookmark" class='second' title="Permanent Link to <?php the_title_attribute(); ?>">Permalink</a>  <?php edit_post_link('Edit', '<br>', ''); ?></p>
			</div>

		<?php endwhile; ?>


	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
