<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/topics_header.php'); ?>
<?php 
  $id = $_GET['id'] ?? '1';
  echo h($id); 
?>
    <div id="content">
      Title:
      Post:
    
      created by: 
      created date:
      updated date:
    </div>

    <?php include(SHARED_PATH . '/topics_footer.php'); ?>
