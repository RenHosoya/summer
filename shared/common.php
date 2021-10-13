<?php

//require_once dirname(__FILE__) . '/dbconfig.php';

function h($str) {
  return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function error_display( $errors ) {
  foreach ($errors as $error) {
    ?>
    <div>
      <div class="alert alert-dismissible alert-warning">
        <?php print h( $error ) ?>
      </div>
    </div>
    <?php
  }
}

function get_current_datetime() {
  $now = new DateTime();
  $now = $now->format('Y-m-d H:i:s');

  return $now;
}