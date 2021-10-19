<?php

session_stsrt();



// ログインしている場合trueを返す
function isAuthenticated() {
  if (isset($_SESSION['name')) {
    return true;
  }

  return false;
}