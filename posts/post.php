<?php
require_once dirname(__FILE__) . '/functions.php';

try {
  
  $sql = "INSERT INTO posts(title, place, comment) VALUES (:title, :place, :comment)";
  $pdo = connect();
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':title', $_POST['title']);
  $stmt->bindValue(':place', $_POST['place']);
  $stmt->bindValue(':comment', $_POST['comment']);
  $stmt->execute();
  echo "投稿が完了しました";

} catch(\Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}