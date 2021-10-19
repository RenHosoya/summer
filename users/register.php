<?php

//必要なファイルの取得
include ("../shared/common.php");
include ("user.php");
include ("../shared/navbar.php");

// submitボタンが押された際の処理
if (isset($_POST['action'])) {
  user_register($_POST['name'], $_POST['email'], $_POST['password']);
}

define("BUTTONTEXT", "新規登録");
define("URL", "authenticate.php");
define("LINKTEXT", "ログインは");

//登録ページの取得
require ("user_form.php");