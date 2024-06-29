<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

$currentUserId = 1;

$search = $_GET['search'] ?? '';
$filter = $_GET['filter'] ?? '';
$date = $_GET['date'] ?? '';
$searchQuery = '%' . $search . '%';

$filterOptionsResult = $db->query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = 'work' AND TABLE_NAME = 'work_details'")->get();
$filterOptions = array_column($filterOptionsResult, 'COLUMN_NAME');

if ($filter && !in_array($filter, $filterOptions)) {
  $filter = ''; // Reset filter if it's not valid
}

if (isset($_GET['submit_button'])) {
  if ($filter === 'date' && $date === '') {
    $errors['date_error'] = 'Please select a date';
  }
}

// Fetch works based on conditions
if ($filter === 'date' && $date !== '' && empty($errors)) {
  authorize($currentUserId === 1); // Ensure current user is authorized

  $works = $db->query("SELECT * FROM work_details WHERE (name LIKE ? OR phone LIKE ? OR advance LIKE ?) AND date = ? AND user_id = ?", [
    $searchQuery, $searchQuery, $searchQuery, $date, $currentUserId
  ])->get();
} elseif ($search) {
  if ($filter === '') {
    $works = $db->query("SELECT * FROM work_details WHERE (name LIKE ? OR date LIKE ? OR phone LIKE ? OR advance LIKE ?) AND user_id = ?", [
      $searchQuery, $searchQuery, $searchQuery, $searchQuery, $currentUserId
    ])->get();
  } else {
    authorize($currentUserId === 1);

    $query = "SELECT * FROM work_details WHERE $filter LIKE ? AND user_id = ?";
    $works = $db->query($query, [$searchQuery, $currentUserId])->get();
  }
} else {
  $works = $db->query("SELECT * FROM work_details WHERE user_id = ?", [
    $currentUserId
  ])->get();
}


view('works/index.view.php', [
  'heading' => 'All Works',
  'errors' => $errors,
  'works' => $works,
  'search' => $search,
  'filterOptions' => $filterOptions,
]);
