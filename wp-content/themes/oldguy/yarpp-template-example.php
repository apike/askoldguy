<?php /*
Example template
Author: mitcho (Michael Yoshitaka Erlewine)
*/ 
?><h3>Related Questions</h3>
<?php if ($related_query->have_posts()):?>
<ol>
	<?php while ($related_query->have_posts()) : $related_query->the_post(); ?>
	<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php 
	
		$question = get_the_excerpt();
		$max_q_length = 200;

		if (strlen($question) > $max_q_length) {
			$question = substr_replace($question, "...", $max_q_length);
		}

		print $question;

	?></a></li>
	<?php endwhile; ?>
</ol>
<?php else: ?>
<p>No related questions.</p>
<?php endif; ?>
