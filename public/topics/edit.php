<?php 
    require_once('../../private/initialize.php');
    if(!isset($_GET['id'])) {
        redirect_to(url_for('/topics/index.php'));
      }
      $id = $_GET['id'];
    
    if(is_post_request()) {

        
        $topic=[];
        $topic['topic_id'] = $id;
        $topic['title'] = $_POST['title'] ?? '';
        $topic['post_body'] = $_POST['post_body'] ?? '';
        $topic['updated_at'] = $_POST['updated_at'] ?? '';

        

        $result = update_topic($topic);

        if($result=== true){ //ID not carrying over
            redirect_to(url_for('/topics/show.php?id='. $id));
        }else {
            echo mysqli_error($db); //failed 
            db_disconnect($db);
            exit;
        };
      } else {
        $topic = find_topic_by_id($id);
      }
?>
      

<?php $page_title = 'Edit Topic'; ?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>

<h2>Edit</h2>
<form action="<?php echo url_for('/topics/edit.php?id=' . h(u($id))); ?>" method="post">
    <input type = "date" name="updated_at" hidden="true" value="<?php echo date('Y-m-d')?>"/>
    Title:<input type="text" name="title" value ="<?php echo $topic['title']?>" /> <input type="submit" value="Update Topic" /><br/>
    <textarea name="post_body" value ="" rows="10" cols="30"><?php echo $topic['post_body']?></textarea>

</form>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>