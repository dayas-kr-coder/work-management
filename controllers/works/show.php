<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$work = $db->query("select * from work_details where id = :id", [
  ':id' => $_GET['id']
])->findOrFail();

authorize($work['user_id'] === $currentUserId);

view('works/show.view.php', [
  'heading' => 'Work',
  'work' => $work,
]);
