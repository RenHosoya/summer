<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/functions.php';

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

?>

<body>
  <?php
    try {
      $pdo = connect();
      $sql = 'INSERT INTO users(name, email, password) VALUES (:name, :email, :password)';
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':name', $name);
      $stmt->bindValue(':email', $email);
      $stmt->bindValue(':password', $password);
      $stmt->execute();
      $msg = "会員登録が完了しました";
      $link = '<a href="siginup.php">ログインページ</a>';
      echo $msg;
    } catch (PDOException $e) {
      echo "ユーザーの登録に失敗しました";
    } 
  ?>
</body>
