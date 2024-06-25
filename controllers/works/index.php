<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$works = $db->query("select * from expense_tracker")->get();

view('works/index.view.php', [
  'heading' => 'All Works',
  'works' => $works,
]);
