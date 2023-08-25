<?php 

$db = new Database();

$notes = $db->query('select * from notes')->fetchAll();

?>

<h1>Notes</h1>

<?php foreach ($notes as $note) : ?>

  <div class="note-item" style="margin-bottom: 10px;padding-bottom: 15px;border-bottom: 2px solid darkblue;">
    <?php echo $note['body']; ?>
  </div>

<?php endforeach; ?>