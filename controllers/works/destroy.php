<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

if (empty($errors)) {
  $db->query("DELETE FROM expense_tracker WHERE id = :id", [
    ':id' => $_POST['id'],
  ]);

  redirect('/works');
} else {
  abort();
}
