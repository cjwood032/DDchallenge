<?php require_once('../../private/initialize.php'); ?>

<?php
    $sql= "SELECT * FROM topics ";
    $sql .= "ORDER BY updated_date DSC";
    $topic_set = find_all_topics();

?>
<?php $page_title = 'Topics Menu'; ?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>

    <div id="content">
        <div id="main-menu">
            <h3>Main Menu</h3>
            <ul><li><a href="<?php echo url_for('/topics/replies/index.php');?>">Replies</a></li></ul>
        </div>
        <div class="actions">
          <a class="action" href="<?php echo url_for('/topics/new.php'); ?>">Create New Topic</a>
        </div>

  	    <table class="list">
  	      <tr>
            <th>ID</th>
            <th>User</th>
            
  	        <th>Title</th>
            <th>Body</th>
            <th>Created</th>
            <th>Updated</th>
  	        <th>&nbsp;</th>
  	        <th>&nbsp;</th>
            <th>&nbsp;</th>
  	      </tr>

          <?php while($topic = mysqli_fetch_assoc($topic_set)) { ?>
            <tr>
              <td><?php echo $topic['topic_id']; ?></td>
              <td><?php echo $topic['user_id']; ?></td>
        	  <td><?php echo $topic['title']; ?></td>
              <td><?php echo $topic['post_body']; ?></td>
              <td><?php echo $topic['created_at']; ?></td>
              <td><?php echo $topic['updated_at']; ?></td>
              <td><a class="action" href="<?php echo url_for('/topics/show.php?id=' . $topic['topic_id']); ?>">View</a></td>
              <td><a class="action" href="<?php echo url_for('/topics/edit.php?id=' . $topic['topic_id']); ?>">Edit</a></td>
              <td><a class="action" href="<?php echo url_for('/topics/delete.php?id=' . h(u($topic['topic_id']))); ?>">Delete</a></td>
        	  </tr>
          <?php } ?>
  	    </table>
          <?php mysqli_free_result($topic_set);?> <!-- Warning boolean given in chapter 6-retrieve data-->
    </div>

<?php include(SHARED_PATH . '/topics_footer.php'); ?>