<h1>新規会員登録</h1>
<form method="POST">
  <div>
    <label>名前:</label>
    <input type="text" name="name" required>
  </div>
  <div>
    <label>メールアドレス:</label>
    <input type="email" name="email" required>
  </div>
  <div>
    <label>パスワード:</label>
    <input type="password" name="password" required>
  </div>
  <input type="submit" value="<?php print(BUTTONTEXT); ?>" name="action">
</form>
<p><?php print (LINKTEXT); ?><a href="<?php print (URL); ?>">こちら</a></p>