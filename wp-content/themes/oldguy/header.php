<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />

<title><?php
if (is_singular() && $question = get_the_excerpt()) {
	$max_q_length = 100;

	if (strlen($question) > $max_q_length) {
		$question = substr_replace($question, "...", $max_q_length);
	}

	print $question;
}
else if ($page_title = wp_title('-', false, 'right')) {
	print "$page_title Just Ask Oldguy";
} else { 
	print "Just Ask Oldguy - Questions, answers, and wise advice.";
} ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if (is_home()): ?>
	<meta content="A Q&amp;A site featuring the advice of 'Oldguy'. Ask a question, or browse hundreds of previous answers." name="description" /> 
<?php endif; ?>

<style type="text/css" media="screen">


</style>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="page">


<div id="header" class='box' role="banner">
		<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
		<div class="description"><?php bloginfo('description'); ?></div>
		<p class='column_links'>
			<a href='/ask-oldguy/'>Ask a Question</a>
			<a href='/about/'>About</a>
			<a href='/archives/'>Archives</a>
		</p>
		
		<?php if (!is_single()):?>
			<p class='column_links'>
			<?php
				next_posts_link('&laquo; Older Entries');
				previous_posts_link('Newer Entries &raquo;');
			?>
			</p>
		<?php endif; ?>
</div>
<hr />
