<h1>投稿フォーム</h1>
<form action="post_info.php" method="POST">
  <div>
    <label>タイトル：</label>
    <input type="text" name="title" required>
  </div>
  <div>
    <label>都道府県：</label>
    <select name="place">
      <option>北海道</option>
      <option>秋田県</option>
      <option>東京都</option>
    </select>
  </div>
  <div>
    <label>本文：</label>
    <textarea name="comment" placeholder="100文字以内で入力してください"></textarea>
  </div>
  <input type="submit" value="投稿">
</form> 