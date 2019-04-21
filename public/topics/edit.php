<?php 
    require_once('../../private/initialize.php');
    if(!isset($_GET['id'])) {
        redirect_to(url_for('/topics/index.php'));
      }
    $id = $_GET['id'];
    $title= '';
    $post_body='Enter your post here';
    if(is_post_request()) {

        // Handle form values sent by new.php
      
        $title = $_POST['title'] ?? '';
        $post_body = $_POST['post_body'] ?? '';
      
        echo "Form parameters<br />";
        echo "Title: " . $title . "<br />";
        echo "Post Body: " . $post_body . "<br />";
      } else {
        //redirect_to(url_for('/topics/new.php'));
      }
      
?>
      

<?php $page_title = 'Edit Topic'; ?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>
<?php 
  $id = $_GET['id'] ?? '1';
  echo h($id); 
?>
<h2>Edit</h2>
<form action="<?php echo url_for('/topics/edit.php?id=' . h(u($id))); ?>" method="post">
    
    Title:<input type="text" name="title" value ="<?php echo $title?>" /> <input type="submit" value="Create Topic" /><br/>
    <textarea name="post_body" value ="" rows="10" cols="30"><?php echo $post_body?></textarea>
      
</form>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>