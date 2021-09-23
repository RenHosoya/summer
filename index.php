<?php

function h($s) {
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
// ログイン済みの場合
if (isset($_SESSION['email'])) {
  echo 'ようこそ' . h($_SESSION['email']) . "さん<br>";
  echo "<a href='/logout.php'>ログアウトはこちら。</a>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="jp">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ホーム</title>
</head>
<body>
  <div class="wrapper grid">
  
  <div class="item">
  </div>
  </div>
</body>
</html>