<?php

require_once('../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/topics/index.php'));
}
$id = $_GET['id'];

if(is_post_request()) {

  $result = delete_topic($id);
  redirect_to(url_for('/topics/index.php'));

} else {
  $topic = find_topic_by_id($id);
}

?>

<?php $page_title = 'Delete topic'; ?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/topics/index.php'); ?>">&laquo; Back to List</a>

  <div class="topic delete">
    <h1>Delete topic</h1>
    <p>Are you sure you want to delete this topic?</p>
    <p class="item">Title: <?php echo h($topic['title']); ?></p>

    <form action="<?php echo url_for('/topics/delete.php?id=' . h(u($topic['topic_id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete topic" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/topics_footer.php'); ?>
