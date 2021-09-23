<?php
session_start();
$output = '';
if (isset($_SESSION['EMAIL'])) {
  $output = "ログアウトしました";
} else {
  $output = "Seesionがタイムアウトしました";
}

$_SESSION = array();

if (ini_get("session.use_cookies")) {
  $params = session_set_cookie_params();
  setcookie(session_name(), '', time() - 42000,
    $params['path'], $params['domain'],
    $params['secure'], $params['httponly']  
  );
}

@session_destroy();
echo $output;
echo "<a href='/sessions/login_form.php'>ログインはこちら。</a>";