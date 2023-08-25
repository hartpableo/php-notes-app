<?php

get_template_part('header');

?>

<h1>Create Note</h1>

<form method="POST">
  <p>
    <label for="body">Note Body:</label><br>
    <textarea name="body" id="body" cols="30" rows="10"></textarea>
  </p>
  <p>
    <input type="submit" value="Create Note">
  </p>
</form>

<?php get_template_part('footer'); ?>