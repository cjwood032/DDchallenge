<?php 
    require_once('../../../private/initialize.php');
    if(!isset($_GET['id'])) {
        redirect_to(url_for('/topics/index.php'));
      }
      $id = $_GET['id'];
      $topic_id = $_GET['topic_id'];
    if(is_post_request()) {  
      $reply = [];
      $reply['reply_id'] = $id;
      $reply['reply_body'] = $_POST['reply_body'] ?? '';
      $reply['updated_at'] =  $_POST['updated_at'];
        $result = update_reply($reply);

        if($result=== true){ 
            redirect_to(url_for('/topics/show.php?id=' . $topic_id));
        }else {
            echo mysqli_error($db); //failed 
            db_disconnect($db);
            exit;
        };
      } else {
        $reply = find_reply_by_id($id);
      }
?>
      

<?php $page_title = 'Edit Reply'; ?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>

<h2>Edit</h2>
<form action="<?php echo url_for('/topics/replies/edit.php?id=' . $id . '&topic_id=' . $topic_id); ?>" method="post">
    Edit reply<br/>
    <input type = "date" name="updated_at" hidden="true" value="<?php echo date('Y-m-d')?>"/>
    <textarea name="reply_body" value ="" rows="10" cols="30"><?php echo $reply['reply_body']?></textarea>
    <input type="submit" value="Edit Reply" />
</form>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>