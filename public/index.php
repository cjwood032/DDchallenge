<!doctype html>
<?php require_once('../private/initialize.php'); ?>
<html lang="en">
  <head>
    <title>Delta Defense Coding Challenge</title>
    <meta charset="utf-8">
  </head>

  <body>

    <h1>Delta Defense Project</h1>
    <a class="action" href="<?php echo url_for('/users/new.php'); ?>">Create a user to get started</a><br><br>
    <a class="action" href="<?php echo url_for('/users/login.php'); ?>">Login if you already created a user</a>
  </body>
</html>
