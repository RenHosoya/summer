<?php 
  require_once dirname(__FILE__) . '/post.php';
  require_once dirname(__FILE__) . '/functions.php';

  //投稿を実行
  post_register($_POST['title'], $_POST['place'], $_POST['comment']);

  // データを取得
  $sql = "SELECT * FROM posts";
  $pdo = connect();
  $stmt = $pdo->query($sql);

?>


<div>
  <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <a href="post_detail.php?id=<?php echo $row['id']; ?>">詳細</a>
    <br>
  <?php endwhile; ?>
</div>