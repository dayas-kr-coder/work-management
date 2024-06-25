<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$work = $db->query("select * from expense_tracker where id = :id", [
  ":id" => $_GET['id']
])->find();

view('works/show.view.php', [
  'heading' => 'All Works',
  'work' => $work
]);
