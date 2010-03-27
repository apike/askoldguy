<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content" class="widecolumn">

<div class='box'>
	<h2>What questions have been asked in the past?</h2>

	<?php get_search_form(); ?>

	<ul>
		<?php wp_get_archives('type=yearly'); ?>
	</ul>
</div>

<?php get_footer(); ?>
