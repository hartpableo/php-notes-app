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
    <form action="/note/delete" method="post">
      <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
      <input type="hidden" name="_method" value="DELETE">
      <button type="submit" style="border: 1px solid black;color: red;background: white;margin: .5em 0 0;cursor: pointer;">Delete</button>
    </form>
  </div>

<?php endforeach; ?>

<p style="display: flex;gap: 1.5em;margin-top: 3rem;">
  <a href="/notes/create"><strong>Create note</strong></a>
</p>

<?php get_template_part('footer'); ?>