<?php 
  get_template_part('header'); 
?>

<h1><?php echo $title; ?></h1>

<?php 
  if (!empty($errors)) : 
    foreach ($errors as $err) :
?>

  <p style="color: red;font-size: .8em;margin: 0 0 .5em;">
    <strong><?php echo $err; ?></strong>
  </p>

<?php endforeach; endif; ?>

<form method="POST">
  <p>
    <label for="name">Name:</label><br>
    <input type="text" name="name" id="name" value="<?php echo old('name'); ?>">
  </p>
  <p>
    <label for="email">Email Address:</label><br>
    <input type="email" name="email" id="email" value="<?php echo old('email'); ?>">
  </p>
  <p>
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" value="<?php echo $_POST['password'] ?? '' ?>">
  </p>
  <p>
    <input type="submit" value="Login" class="btn btn--primary">
    <a href="/" class="btn btn--neutral">Go Back</a>
  </p>
</form>

<?php get_template_part('footer'); ?>