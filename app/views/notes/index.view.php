<?php
use Core\Session;
get_template_part('header'); 
?>

<?php if (auth()) : ?>

  <h1><?php echo $title; ?></h1>

  <?php if (Session::has('message', 'logged_in')) : ?>
    <div class="message message--welcome">
      <?php echo Session::get('message')['logged_in']; ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($notes)) : ?>
    
  <?php foreach ($notes as $note) : ?>

    <?php
      $excerpt = (strlen($note['body']) > 50) ? substr($note['body'], 0, 50) . '...' : $note['body'];
    ?>

    <div class="note-item" style="margin-bottom: 10px;padding-bottom: 15px;border-bottom: 2px solid darkblue;">
      <a href="<?php echo "/note?id={$note['id']}"; ?>" style="display: block;">
        <?php echo htmlspecialchars($excerpt); ?>
      </a>
      <div style="margin: .5em 0 0;">
        <form action="/note/delete" method="post" style="display: inline-block;vertical-align: middle;">
          <input type="hidden" name="id" value="<?php echo $note['id']; ?>">
          <input type="hidden" name="_method" value="DELETE">
          <button type="submit" class="btn btn--secondary">Delete</button>
        </form>
        <a href="/note/edit?id=<?php echo $note['id'] ?>" class="btn btn--primary">Edit Note</a>
      </div>
    </div>

<?php 
    endforeach; 
  else :
?>
<p>You don't have any notes yet! Start adding to your notes now.</p>
<?php endif; ?>

<p style="display: flex;gap: 1.5em;margin-top: 3rem;">
  <a href="/notes/create" class="btn btn--neutral"><strong>Create note</strong></a>
</p>
<?php else : ?>
  <h1>Notes App</h1>
  <p>Want to take notes? Login or register your account now!</p>
  <p>
    <a href="/user/register" class="btn btn--primary"><strong>Create Account</strong></a>
    <a href="/user/login" class="btn btn--neutral"><strong>Login</strong></a>
  </p>
<?php endif; ?>

<?php get_template_part('footer'); ?>