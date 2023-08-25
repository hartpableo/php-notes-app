<?php

$db = new Database();

$current_user_id = 4;

$note = $db->query('select * from notes where id = :id', [
  ':id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] !== $current_user_id, Response::FORBIDDEN);

?>

<h1>Note #<?php echo $note['id']; ?></h1>
<div class="note-content"><?php echo $note['body']; ?></div>
<p><a href="/">Go Back</a></p>