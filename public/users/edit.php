<?php 
    require_once('../../private/initialize.php'); 
     
    $id = $_GET['id'];
    $user = find_user_by_id($id);
  
    if(is_post_request()) {

        $user = [];
        $user['user_id'] = $id ?? '';
        $user['username'] = $_POST['username'] ?? '';
        $user['email'] = $_POST['email'] ?? '';
        $user['password'] = $_POST['password'] ?? '';

        $result = update_user($user);
        if($result === true) {
          redirect_to(url_for('/users/show.php?id=' . $id));
        } else {
          $errors = $result;
        }
      
      } else {
      
        $user = find_user_by_id($id);
      
      }
      

?>
<?php $page_username = 'Edit User'; ?>
<?php include(SHARED_PATH . '/users_header.php'); ?>
<form action="<?php echo url_for('/users/edit.php?id=' . $id); ?>" method="post">
    
    Username:<input type="text" name="username" value ="<?php echo $user['username'] ?>" />
    Email:<input type="text" name="email" value ="<?php echo $user['email']?>">
    Password:<input type="text" name="password" value ="">

    <input type="submit" value="Update User" />
    
</form>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>