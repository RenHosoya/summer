<?php
require_once dirname(__FILE__) . '/functions.php';

//投稿する関数
function post_register($title, $place, $comment) {
  $errors = post_validation($title, $comment); 

  if (count($errors) == 0) {
    post_insert($title, $place, $comment);
  }
}

//バリデーション関数
function post_validation($title, $comment) {
  $errors = array();

  if (!mb_strlen(trim($title))) { 
    $errors[] = "タイトルが空です";
  }

  if (!mb_strlen(trim($comment))) {
    $errors[] = "本文が空です";
  }
  return $errors;
}

//DBに挿入する関数
function post_insert($title, $place, $comment) {
  try {
    $sql = "INSERT INTO posts(title, place, comment) VALUES ('$title', '$place', '$comment')";
    $pdo = connect();
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':title', $title);
    $stmt->bindValue(':place', $place);
    $stmt->bindValue(':comment', $comment);
    $stmt->execute();
  
  } catch(\Exception $e) {
    echo $e->getMessage() . PHP_EOL;
  }
}