<?php get_template_part('header'); ?>

<h1><?php echo $title; ?></h1>
<div class="note-content"><?php echo htmlspecialchars($note['body']); ?></div>
<p><a href="/">Go Back</a></p>
<div style="margin: .5em 0 0;">
  <form action="/note/delete" method="POST" style="display: inline-block;vertical-align: middle;">
    <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" style="border: 1px solid black;color: red;background: white;cursor: pointer;">Delete</button>
  </form>
  <a href="/note/edit?id=<?php echo $note['id'] ?>" style="font-size: .8em;margin-left: .8em;font-weight: bold;text-decoration: underline;display: inline-block;vertical-align: middle;">Edit Note</a>
</div>

<?php get_template_part('footer'); ?>