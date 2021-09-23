<?php
  declare(strict_types=1);
  require_once dirname(__FILE__) . '/functions.php';

  try {
    $pdo = connect();
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['email']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } catch (\Exception $e) {
    echo "アドレスの検索に失敗";
  }

  // POST(email)のバリデーション
  if (!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "入力された値が不正です";
    return false;
  }

  // パスワードの正規表現
  if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  } else {
    echo "パスワードは半角英数字をそれぞれ1文字以上含んだ8文字以上で設定してください。";
    return false;
  }

  // 登録処理
  try {
    $name = $_POST['name'];
    //$email = $_POST['email'];

    $sql = "insert into users(name, email, password) value(:name, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $password);
    $stmt->execute();
    echo '登録完了';
  } catch (\Exception $e) {
    echo '登録済みのメールアドレスです。';
  }
?>
