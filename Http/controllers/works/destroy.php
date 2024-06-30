<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$work = $db->query("select * from work_details where id = :id", [
  ':id' => $_GET['id']
])->findOrFail();

authorize($work['user_id'] === $currentUserId);

$db->query("DELETE FROM work_details WHERE id = :id", [
  ':id' => $_POST['id'],
]);

redirect('/works');
