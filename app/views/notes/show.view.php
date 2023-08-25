<?php

$db = new Database();

$note = $db->query('select * from notes where id = :id', [':id' => $_GET['id']])->fetch();
?>

<h1>Note #<?php echo $note['id']; ?></h1>
<div class="note-content"><?php echo $note['body']; ?></div>
<p><a href="/">Go Back</a></p>