<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<hr />

<div id="footer" class='box' role="contentinfo">


	<div class='column_links'>
	<?php if (!is_single()):?>
		<?php
			next_posts_link('&laquo; Older Entries');
			previous_posts_link('Newer Entries &raquo;');
		?>
	<?php endif; ?>

		<a href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a>
	</div>
	
	<p id='credits'>
		Design by <a href='http://www.antipode.ca/'>Allen</a>, code by <a href='http://www.napkinware.com/'>Bruce</a>, and answers by Chris.
	</p>
</div>
</div>


		<?php wp_footer(); ?>
</body>
</html>
