<?php
require_once dirname(__FILE__) . '/functions.php';

$id = $_GET['id'];

$sql = "SELECT * FROM posts WHERE id = :id";
$pdo = connect();
$stmt = $pdo->prepare($sql);

$stmt->bindParam('id', $id, PDO::PARAM_INT);
$stmt->execute();

?>

<div>
  <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
     <h1><?php echo $row['title']; ?></h1>
    <br>
  <?php endwhile; ?>
</div>
