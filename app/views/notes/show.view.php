<?php get_template_part('header'); ?>

<h1><?php echo $title; ?></h1>
<div class="note-content"><?php echo htmlspecialchars($note['body']); ?></div>
<div style="margin: .5em 0 0;">
  <a href="/note/edit?id=<?php echo $note['id'] ?>" class="btn btn--primary">Edit Note</a>
  <a href="/" class="btn btn--neutral">Go Back</a>
  <form action="/note/delete" method="POST" style="display: inline-block;vertical-align: middle;">
    <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn--secondary">Delete</button>
  </form>
</div>

<?php get_template_part('footer'); ?>