<?php 
  require_once dirname(__FILE__) . '/post.php';
  
  //投稿を実行
  post_register($_POST['title'], $_POST['place'], $_POST['comment']);

?>

<div>
  <h1><?php echo $_POST['title']; ?></h1>
  <p><?php echo $_POST['place']; ?></p>
  <p><?php echo $_POST['comment']; ?></p>
</div>