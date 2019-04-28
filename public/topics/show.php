<?php require_once('../../private/initialize.php'); ?>
<?php 
  $id = $_GET['id'] ?? '1';
  $topic = find_topic_by_id($id);
  $watcher_set= get_watchers($id);
  $reply_set= get_replies($id);
    $watching= false;
    foreach ($watcher_set as $watcher)
      if (isset($watcher['user_id']) && $watcher['user_id'] == $_SESSION['user_id']){
           $watching = true;
      }
 
if(is_post_request()) {
  if ($watching == true){
    remove_watcher($id); } else {
      add_watcher($id);
    }

  redirect_to(url_for('/topics/show.php?id=' . $topic['topic_id']));

} else {
  $topic = find_topic_by_id($id);
}
?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>


  <div id="content">
  
    <h3>Title: <b><?php echo $topic['title']; ?></b></h3> 
    <form action="<?php echo url_for('/topics/show.php?id=' . $topic['topic_id']); ?>" method="post">
      <div id="operations">
     
      <?php if ($watching == false) {?> 
        <input type="submit" name="commit" value="Watch" />
      <?php } else {?>
        <input type="submit" name="commit" value="Unwatch" />
      <?php }?>
        </div>
    </form>
    Post:<br/><?php echo h($topic['post_body']); ?>
    <div id = "replies">
      
      <table class="list">
  	      <tr>
            <th>User</th>
            <th><center>Body</center></th>
            <th>Created</th>
            <th>Updated</th>
  	        <th>&nbsp;</th>
            <th><button ><a href="<?php echo url_for('/topics/replies/new.php?topic_id=' . $id); ?>">Add reply</a></button></th>
  	      </tr>
          
          <?php while($reply = mysqli_fetch_assoc($reply_set)) { ?>
            <tr>
              <td><?php echo $reply['user_id']; ?></td>
              <td><?php echo $reply['reply_body']; ?></td>
              <td><?php echo $reply['created_at']; ?></td>
              <td><?php echo $reply['updated_at']; ?></td>
              <td><a class="action" href="<?php echo url_for('/topics/replies/edit.php?id=' . $reply['reply_id'] . '&topic_id=' . $id); ?>">Edit</a></td>
              <td><a class="action" href="<?php echo url_for('/topics/replies/delete.php?id=' . h(u($reply['reply_id'])). '&topic_id=' . $id); ?>">Delete</a></td>
        	  </tr>
          <?php } ?>
  	    </table>  
    </div>
    <?php mysqli_free_result($watcher_set);?>
    <?php mysqli_free_result($reply_set);?>
  </div>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>
