<?php 

get_template_part('header');

$db = new Database();

$current_user_id = 4;

$notes = $db->query('select * from notes where user_id = :user_id', [
  ':user_id' => $current_user_id
])->findAll();

?>

<h1>Notes</h1>

<?php foreach ($notes as $note) : ?>

  <?php
    $excerpt = (strlen($note['body']) > 50) ? substr($note['body'], 0, 50) . '...' : $note['body'];
  ?>

  <div class="note-item" style="margin-bottom: 10px;padding-bottom: 15px;border-bottom: 2px solid darkblue;">
    <a href="<?php echo "/note?id={$note['id']}"; ?>" style="display: block;">
      <?php echo htmlspecialchars($excerpt); ?>
    </a>
  </div>

<?php endforeach; ?>

<p style="display: flex;gap: 1.5em;margin-top: 3rem;">
  <a href="/notes/create"><strong>Create note</strong></a>
</p>

<?php get_template_part('footer'); ?>