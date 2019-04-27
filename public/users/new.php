<?php 
    require_once('../../private/initialize.php'); 

    if(is_post_request()) {

        $user = [];
      //  $user['user_id'] = $_POST['user_id'] ?? '';
        $user['username'] = $_POST['username'] ?? '';
        $user['email'] = $_POST['email'] ?? '';
        $user['password'] = $_POST['password'] ?? '';

        $result = insert_user($user);
        if($result === true) {
          redirect_to(url_for('/users/login.php'));
        } else {
          $errors = $result;
        }
      
      } else {
      
        $user = [];
       // $user['user_id'] = '';
        $user['username'] = '';
        $user['email'] = '';
        $user['passsword'] = '';

      
      }
?>
<?php $page_username = 'New User'; ?>
<?php include(SHARED_PATH . '/users_header.php'); ?>
<form action="<?php echo url_for('/users/new.php'); ?>" method="post">
    
    Username:<input type="text" name="username" value ="" />
    Email:<input type="text" name="email" value ="">
    Password:<input type="text" name="password" value ="">

    <input type="submit" value="Create user" />
    
</form>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>