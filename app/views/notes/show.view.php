<?php get_template_part('header'); ?>

<h1><?php echo $title; ?></h1>
<div class="note-content"><?php echo htmlspecialchars($note['body']); ?></div>
<p><a href="/">Go Back</a></p>

<?php get_template_part('footer'); ?>