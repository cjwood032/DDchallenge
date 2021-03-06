<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';
  if ($username !='' && $password !=''){
    $result=verify_user($username, $password);
    if($result===true){
      $_SESSION['user_id'] = user_logon($username);
      $_SESSION['username'] = $username;
      redirect_to(url_for('/topics/index.php'));
    } else {
      echo "user verification failed.";
    }
  } else{
    echo "please enter both Username and Password";
  }
}

?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/users_header.php'); ?>

<div id="content">
  <h2>Log in or <a href ="<?php echo url_for("/users/new.php"); ?>" >Sign up</a></h2>

  <?php echo display_errors($errors); ?>

  <form action="login.php" method="post">
    Username:<br />
    <input type="text" name="username" value="<?php echo h($username); ?>" /><br />
    Password:<br />
    <input type="password" name="password" value="" /><br />
    <input type="submit" name="submit" value="Submit"  />
  </form>

</div>

<?php include(SHARED_PATH . '/topics_footer.php'); ?>
