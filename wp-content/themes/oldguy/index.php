<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class('box') ?> id="post-<?php the_ID(); ?>">
				<h2><?php the_title(); ?>
					<span class='asker'>- Silent Bob</style></h2>
				<p class='date'><?php the_time('F jS, Y') ?></p>

				<div class="entry">
					<?php the_content('Read the rest of this entry &raquo;'); ?>
				</div>

				<p class="postmetadata column_links"><?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'first'); ?> <a href="<?php the_permalink() ?>" rel="bookmark" class='second' title="Permanent Link to <?php the_title_attribute(); ?>">Permalink</a>  <?php edit_post_link('Edit', '', ' | '); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
