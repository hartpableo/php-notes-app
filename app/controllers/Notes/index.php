<?php

$db = new Database();

$current_user_id = 4;

$notes = $db->query('select * from notes where user_id = :user_id', [
  ':user_id' => $current_user_id
])->findAll();

require base_path('../views/notes/index.view.php');