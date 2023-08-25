<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') show('Hello');

require base_path('../views/notes/create.view.php');