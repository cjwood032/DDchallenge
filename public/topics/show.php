<?php require_once('../../private/initialize.php'); ?>

<?php include(SHARED_PATH . '/topics_header.php'); ?>
<?php 
  $id = $_GET['id'] ?? '1';
  $topic = find_topic_by_id($id);
?>
    <div id="content">
      Title:<b><?php echo $topic['title']; ?></b><br/>
      Post:<?php echo h($topic['post_body']); ?>
    </div>

    <?php include(SHARED_PATH . '/topics_footer.php'); ?>
