<?php
  if(!isset($page_title)) {$page_title = 'Userss Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>DD- <?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/users.css');?>" />
  </head>

  <body>
    <header>
        <h1>Users</h1>
    </header>

    <navigation>
        <ul>
          <li><a href ="<?php echo url_for("/topics/index.php"); ?>">Topics</a></li>
        </ul>
    </navigation>
    
