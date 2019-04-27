<?php 
  require_once('../../../private/initialize.php');
  $topic_id= $_GET['topic_id']; 
  $topic = find_topic_by_id($topic_id);
  if(is_post_request()) {

    $reply = [];
    $reply['user_id'] = $_SESSION['user_id'] ?? '';
    $reply['topic_id'] = $topic_id ?? '';
    $reply['reply_body'] = $_POST['reply_body'] ?? '';
    $reply['created_at'] = $_POST['created_at'];
    $reply['updated_at'] =  $_POST['updated_at'];
  
    $result = insert_reply($reply);
    if($result === true) {
      //email_watchers
      
      redirect_to(url_for('/topics/show.php?id=' . $topic_id));
    } else {
      $errors = $result;
    }
  
  } else {
    $reply = [];
    $reply['title'] = '';
    $reply['reply_body'] = '';
  }
?>


<?php include(SHARED_PATH . '/topics_header.php'); ?>
Topic ~ <?php echo $topic['title'] ?>
<form action="<?php echo url_for('/topics/replies/new.php?topic_id=' . $topic_id); ?>" method="post">
    Add a reply<br/>
    <input type = "date" name="created_at" hidden="true" value="<?php echo date('Y-m-d')?>"/>
    <input type = "date" name="updated_at" hidden="true" value="<?php echo date('Y-m-d')?>"/>
    <textarea name="reply_body" value ="" rows="10" cols="30"></textarea>
    <input type="submit" value="Create Reply" />
</form>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>