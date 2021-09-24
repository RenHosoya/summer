<?php
  declare(strict_types=1);

  function connect(): PDO {
    $pdo = new PDO('mysql:host=localhost; dbname=practice_mysql; charset=utf8mb4', 'root', 'root');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $pdo;
  }
