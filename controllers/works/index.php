<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];
$search = $_GET['search'] ?? '';
$filter = $_GET['filter'] ?? '';
$date = $_GET['date'] ?? '';
$searchQuery = '%' . $search . '%';

$filterOptionsResult = $db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'expense_tracker' AND TABLE_NAME = 'expense_tracker'")->get();
$filterOptions = array_column($filterOptionsResult, 'COLUMN_NAME');

if ($filter && !in_array($filter, $filterOptions)) {
  $filter = ''; // Reset filter if it's not valid
}


if (isset($_GET['submit_button'])) {
  if ($filter === 'date' && $date === '') {
    $errors['date_error'] = 'Please select a date';
  }
}


if ($filter === 'date' && $date !== '') {
  if (empty($errors)) {
    $works = $db->query("SELECT * FROM expense_tracker WHERE (name LIKE ? OR phone LIKE ? OR advance LIKE ?) AND date = ?", [
      $searchQuery, $searchQuery, $searchQuery, $date
    ])->get();
  }
} else if ($search) {
  if ($filter === '') {
    $works = $db->query("SELECT * FROM expense_tracker WHERE name LIKE ? OR date LIKE ? OR phone LIKE ? OR advance LIKE ?", [
      $searchQuery, $searchQuery, $searchQuery, $searchQuery
    ])->get();
  } else {
    $query = "SELECT * FROM expense_tracker WHERE $filter LIKE ?";
    $works = $db->query($query, [$searchQuery])->get();
  }
} else {
  $works = $db->query("SELECT * FROM expense_tracker")->get();
}

view('works/index.view.php', [
  'heading' => 'All Works',
  'errors' => $errors,
  'works' => $works,
  'search' => $search,
  'filterOptions' => $filterOptions,
]);
