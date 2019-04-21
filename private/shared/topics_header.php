<?php
  if(!isset($page_title)) {$page_title = 'Topics Area'; }
?>

<!doctype html>

<html lang="en">
  <head>
    <title>DD- <?php echo $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/topics.css');?>" />
  </head>

  <body>
    <header>
        <h1>Discussion Topics</h1>
    </header>

    <navigation>
        <ul>
          <li><a href ="<?php echo url_for("/topics/index.php"); ?>">Menu</a></li>
        </ul>
    </navigation>
    
