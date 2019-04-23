<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/users_header.php'); ?>
<?php 
  $id = $_GET['id'] ?? '1';
  $user = find_user_by_id($id);
?>
    <div id="content">
      Username:<b><?php echo $user['username']; ?></b><br/>
      Email:<?php echo h($user['email']); ?>
    </div>

    <?php include(SHARED_PATH . '/topics_footer.php'); ?>
