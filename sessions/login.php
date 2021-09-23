<?php

require_once dirname(__FILE__) . '/functions.php';

session_start();

//postのvalidate
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  echo '入力された値が不正です';
  return false;
}

try {
  $pdo = connect();
  $stmt = $pdo->prepare('select * from users where email = ?');
  $stmt->execute([$_POST['email']]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}

if (password_verify($_POST['password'], $row['password'])) {
  session_regenerate_id(true);
  $_SESSION['EMAIL'] = $row['email'];
  echo 'ログインしました';
} else {
  echo 'メールアドレスまたはパスワードが間違ってます';
  return false;
}