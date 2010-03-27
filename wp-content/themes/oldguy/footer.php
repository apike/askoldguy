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


	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	try {
	var pageTracker = _gat._getTracker("UA-585700-5");
	pageTracker._trackPageview();
	} catch(err) {}</script>
</body>
</html>
