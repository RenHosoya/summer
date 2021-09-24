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

<h1>ログイン</h1>
<form action="login.php" method="post">
  <div>
    <label>メールアドレス:</label>
    <input type="email" name="email" required>
  </div>
  <div>
    <label>パスワード:</label>
    <input type="password" name="password" required>
  </div>
  <input type="submit" value="ログイン">
</form>
<p>まだ登録していない方は<a href="signup_form.php">こちら</a></p>