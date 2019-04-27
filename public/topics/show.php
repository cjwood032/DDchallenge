<?php require_once('../../private/initialize.php'); ?>
<?php 
  $id = $_GET['id'] ?? '1';
  $topic = find_topic_by_id($id);
  $watchers= get_watchers($id);
  $reply_set= get_replies($id)
?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>


  <div id="content">
  
    <h3>Title: <b><?php echo $topic['title']; ?></b></h3> Watchers: <?php echo count($watchers)?> <br/>
   
    Post:<br/><?php echo h($topic['post_body']); ?>
    <?php while($watcher = mysqli_fetch_assoc($watchers)) { ?>
      <?php echo $watcher['user_id']; ?>
    <?php }?>
      <hr/>
    <div id = "replies">
      <button ><a href="<?php echo url_for('/topics/replies/new.php?topic_id=' . $id); ?>">Add reply</a></button>
      <table class="list">
  	      <tr>
            <th>User</th>
            <th><center>Body</center></th>
            <th>Created</th>
            <th>Updated</th>
  	        <th>&nbsp;</th>
            <th>&nbsp;</th>
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
    <?php mysqli_free_result($watchers);?>
  </div>
<?php include(SHARED_PATH . '/topics_footer.php'); ?>
