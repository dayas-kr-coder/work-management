<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['id'];

$work = $db->query("select * from work_details where id = :id", [
  ':id' => $_GET['id']
])->findOrFail();

authorize($work['user_id'] === $currentUserId);

view('works/edit.view.php', [
  'heading' => 'Edit Work',
  'errors' => [],
  'work' => $work,
]);
