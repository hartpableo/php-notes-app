<?php 

$db = new Database();

$notes = $db->query('select * from notes')->fetchAll();

?>

<h1>Notes</h1>

<?php foreach ($notes as $note) : ?>

  <?php
    $excerpt = (strlen($note['body']) > 50) ? substr($note['body'], 0, 50) : $note['body'];  
  ?>

  <div class="note-item" style="margin-bottom: 10px;padding-bottom: 15px;border-bottom: 2px solid darkblue;">
    <a href="<?php echo "/note?id={$note['id']}"; ?>" style="display: block;">
      <?php echo $excerpt; ?>
    </a>
  </div>

<?php endforeach; ?>