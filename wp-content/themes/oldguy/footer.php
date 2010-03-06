<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>

<hr />

<div id="footer" class='box' role="contentinfo">

	<p>
		<a href="<?php bloginfo('rss2_url'); ?>">Entries RSS</a>
		- <a href="<?php bloginfo('comments_rss2_url'); ?>">Comments RSS</a>.
		<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
	</p>
	
	<p>
		Design by <a href='http://www.antipode.ca/'>Allen</a>, code by <a href='http://www.napkinware.com/'>Bruce</a>, and answers by Chris.
	</p>
</div>
</div>


		<?php wp_footer(); ?>
</body>
</html>
