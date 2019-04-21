<?php require_once('../../private/initialize.php'); ?>

<?php
  $topics = [
    ['id' => '1', 'user_id' => '1', 'title' => 'Title1', 'post_body' => 'Body', 'created_date'=>'04/18/2019', 'updated_date'=> '04/19/2019'],
    ['id' => '2', 'user_id' => '2', 'title' => 'Title2', 'post_body' => 'Body', 'created_date'=>'04/18/2019', 'updated_date'=> '04/19/2019'],
    ['id' => '3', 'user_id' => '3', 'title' => 'Title3', 'post_body' => 'Body', 'created_date'=>'04/18/2019', 'updated_date'=> '04/19/2019'],
    ['id' => '4', 'user_id' => '4', 'title' => 'Title4', 'post_body' => 'Body', 'created_date'=>'04/18/2019', 'updated_date'=> '04/19/2019'],
  ];
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
            <th>updated</th>
  	        <th>&nbsp;</th>
  	        <th>&nbsp;</th>
            <th>&nbsp;</th>
  	      </tr>

          <?php foreach($topics as $topic) { ?>
            <tr>
              <td><?php echo $topic['id']; ?></td>
              <td><?php echo $topic['user_id']; ?></td>
        	  <td><?php echo $topic['title']; ?></td>
              <td><?php echo $topic['post_body']; ?></td>
              <td><?php echo $topic['created_date']; ?></td>
              <td><?php echo $topic['updated_date']; ?></td>
              <td><a class="action" href="<?php echo url_for('/topics/show.php?id=' . $topic['id']); ?>">View</a></td>
              <td><a class="action" href="<?php echo url_for('/topics/edit.php?id=' . $topic['id']); ?>">Edit</a></td>
              <td><a class="action" href="">Delete</a></td>
        	  </tr>
          <?php } ?>
  	    </table>
    </div>

<?php include(SHARED_PATH . '/topics_footer.php'); ?>