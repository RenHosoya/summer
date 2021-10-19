<?php
require("../shared/dbconfig.php");

function user_register($name, $email, $password) {
  $errors = user_validation($name, $email, $password);

  if ( count( $errors ) == 0 ) {
    user_insert( $name, $email, $password );
  }
}

function user_validation($name, $email, $password) {
  $errors = array();

  //名前についてのバリデーション
  if (! mb_strlen(trim($name))) {
    $errors[] = "名前が入力されていません";
  } elseif (mb_strlen(trim($name)) > 10) {
    $errors[] = "名前の文字数は10文字以内です"; 
  }

  //アドレスについてのバリデーション
  if (! mb_strlen(trim($email))) {
    $errors[] = "アドレスが入力されています";
  } elseif (mb_strlen(trim($email)) > 255) {
    $errors[] = "アドレスは255文字以内です";
  }

  //パスワードについてのバリデーション
  if (! mb_strlen(trim($password))) {
    $errors[] = "パスワードが入力されていません";
  } elseif (mb_strlen(trim($password)) > 20) {
    $errors[] = "パスワードは20文字以内です";
  }

  return $errors;
}

function user_insert($name, $email, $password) {

  $name = escape($name);
  $email = escape($email);
  $password = password_hash($password, PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
  $pdo = get_db();

  $query = $pdo->prepare($sql);
  $query->execute();

  header("Location: ../index.php");
}