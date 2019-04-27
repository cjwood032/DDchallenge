<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/users_header.php'); ?>
<?php 
  $id = $_GET['id'] ?? '1';
  $user = find_user_by_id($id);
?>
    <div id="content">
      <?php if($id == $_SESSION['user_id']){ ?>
      <a href="<?php echo url_for("/users/edit.php?id=". $id ); ?>">EDIT</a>
    <?php } else{
      echo($_SESSION['user_id']);
    }
    ?>
      Username: <b><?php echo $user['username']; ?></b><br/>
      Email: <?php echo h($user['email']); ?>
    </div>
  
    <?php include(SHARED_PATH . '/topics_footer.php'); ?>