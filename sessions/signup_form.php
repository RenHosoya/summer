<?php

function h($s){
  return htmlspecialchars($s, ENT_QUOTES, 'utf-8');
}

session_start();
//ログイン済みの場合
if (isset($_SESSION['EMAIL'])) {
  echo 'ようこそ' .  h($_SESSION['EMAIL']) . "さん<br>";
  echo "<a href='/sessions/logout.php'>ログアウトはこちら。</a>";
  exit;
}
?>

<h1>新規会員登録</h1>
<form action="signup.php" method="post">
  <div>
    <label>名前:</label>
    <input type="text" name="name" required>
  </div>
  <div>
    <label>メールアドレス:</label>
    <input type="text" name="email" required>
  </div>
  <div>
    <label>パスワード:</label>
    <input type="password" name="password" required>
  </div>
  <input type="submit" value="新規登録">
</form>
<p>既に登録済みの方は<a href="login_form.php">こちら</a></p>