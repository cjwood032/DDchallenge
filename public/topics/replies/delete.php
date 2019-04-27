<?php

require_once('../../../private/initialize.php');

if(!isset($_GET['id'])) {
  redirect_to(url_for('/topics/index.php'));
}
$id = $_GET['id'];
$topic_id = $_GET['topic_id'];

if(is_post_request()) {

  $result = delete_reply($id);
  redirect_to(url_for('/topics/show.php?id='. $topic_id));

} else {
  $reply = find_reply_by_id($id);
}

?>

<?php $page_title = 'Delete Reply'; ?>
<?php include(SHARED_PATH . '/topics_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/topics/show.php?id=' . $topic_id); ?>">&laquo; Back to List</a>

  <div class="topic delete">
    <h1>Delete Reply</h1>
    <p>Are you sure you want to delete this reply?</p>
    <p class="item">body: <br/><?php echo $reply['reply_body']; ?></p>

    <form action="<?php echo url_for('/topics/replies/delete.php?id=' . h(u($reply['reply_id'])) . '&topic_id=' . h(u($reply['topic_id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Reply"/>
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/topics_footer.php'); ?>
