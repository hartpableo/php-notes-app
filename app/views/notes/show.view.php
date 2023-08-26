<?php get_template_part('header'); ?>

<h1><?php echo $title; ?></h1>
<div class="note-content"><?php echo htmlspecialchars($note['body']); ?></div>
<p><a href="/">Go Back</a></p>
<p>
  <form action="/note/delete" method="POST">
    <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" style="border: 1px solid black;color: red;background: white;margin: .5em 0 0;cursor: pointer;">Delete</button>
  </form>
</p>

<?php get_template_part('footer'); ?>