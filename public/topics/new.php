<?php 
    require_once('../../private/initialize.php'); 

    if(is_post_request()) {

        $topic = [];
      //  $topic['user_id'] = $_POST['user_id'] ?? '';
        $topic['title'] = $_POST['title'] ?? '';
        $topic['post_body'] = $_POST['post_body'] ?? '';
        $topic['created_at'] = $_POST['created_at'];
        $topic['updated_at'] =  $_POST['updated_at'];
      
        $result = insert_topic($topic);
        if($result === true) {
          $new_id = mysqli_insert_id($db);
          redirect_to(url_for('/topics/show.php?id=' . $new_id));
        } else {
          $errors = $result;
        }
      
      } else {
      
        $topic = [];
       // $topic['user_id'] = '';
        $topic['title'] = '';
        $topic['post_body'] = '';

      
      }
      
      $topic_set = find_all_topics();
      $topic_count = mysqli_num_rows($topic_set) + 1;
      mysqli_free_result($topic_set);
      

?>
<?php $page_title = 'New Topic'; ?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>
<form action="<?php echo url_for('/topics/new.php'); ?>" method="post">
    
    Title:<input type="text" name="title" value ="" /> <input type="submit" value="Create Topic" /><br/>
    <input type = "date" name="created_at" hidden="true" value="<?php echo date('Y-m-d')?>"/>
    <input type = "date" name="updated_at" hidden="true" value="<?php echo date('Y-m-d')?>"/>
    <textarea name="post_body" value ="" rows="10" cols="30">
    Enter your post here:
    </textarea>
    
    
</form>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>