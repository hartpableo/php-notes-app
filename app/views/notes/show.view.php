<?php get_template_part('header'); ?>

<h1>Note #<?php echo $note['id']; ?></h1>
<div class="note-content"><?php echo htmlspecialchars($note['body']); ?></div>
<p><a href="/">Go Back</a></p>

<?php get_template_part('footer'); ?>