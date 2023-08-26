<?php get_template_part('header'); ?>

<h1><?php echo $title; ?></h1>

<?php 
  if (!empty($errors)) : 
    foreach ($errors as $err) :
?>

  <p style="color: red;font-size: .8em;margin: 0 0 .5em;">
    <strong><?php echo $err; ?></strong>
  </p>

<?php endforeach; endif; ?>

<form method="POST">
  <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
  <input type="hidden" name="_method" value="PATCH">
  <p>
    <label for="body">Note Body:</label><br>
    <textarea name="body" id="body" cols="30" rows="10" placeholder="Enter note body..."><?php echo $note['body']; ?></textarea>
  </p>
  <p>
    <input type="submit" value="Update Note" class="btn btn--primary">
    <a href="/" class="btn btn--secondary">Cancel</a>
  </p>
</form>

<?php get_template_part('footer'); ?>