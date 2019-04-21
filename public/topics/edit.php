<?php require_once('../../private/initialize.php'); ?>
<?php $page_title = 'Edit Topic'; ?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>
<?php 
  $id = $_GET['id'] ?? '1';
  echo h($id); 
?>
<h2>Edit</h2>
<form action="" method="post">
    
    Title:<input type="text" name="title" value ="" /> <input type="submit" value="Create Topic" /><br/>
    <textarea name="post_body" value ="" rows="10" cols="30">
    Enter your post here:
    </textarea>
    
    
</form>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>