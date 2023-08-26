<?php get_template_part('header'); ?>

<h1><?php echo $title; ?></h1>

<?php foreach ($notes as $note) : ?>

  <?php
    $excerpt = (strlen($note['body']) > 50) ? substr($note['body'], 0, 50) . '...' : $note['body'];
  ?>

  <div class="note-item" style="margin-bottom: 10px;padding-bottom: 15px;border-bottom: 2px solid darkblue;">
    <a href="<?php echo "/note?id={$note['id']}"; ?>" style="display: block;">
      <?php echo htmlspecialchars($excerpt); ?>
    </a>
    <div style="margin: .5em 0 0;">
      <form action="/note/delete" method="post" style="display: inline-block;vertical-align: middle;">
        <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit" style="border: 1px solid black;color: red;background: white;cursor: pointer;">Delete</button>
      </form>
      <a href="/note/edit?id=<?php echo $note['id'] ?>" style="font-size: .8em;margin-left: .8em;font-weight: bold;text-decoration: underline;display: inline-block;vertical-align: middle;">Edit Note</a>
    </div>
  </div>

<?php endforeach; ?>

<p style="display: flex;gap: 1.5em;margin-top: 3rem;">
  <a href="/notes/create"><strong>Create note</strong></a>
</p>

<?php get_template_part('footer'); ?>