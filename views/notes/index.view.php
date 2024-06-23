<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <p class="mb-8">
      <a href="/note/create" class="text-white bg-green-600 hover:bg-green-700 shadow-sm active:bg-green-400 py-2 px-4 rounded-md">
        <i class="fa-solid fa-plus text-white"></i><span class="ml-2">Create</span>
      </a>
    </p>

    <ul>
      <?php foreach ($notes as $note) : ?>
        <li>
          <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
            <?= htmlspecialchars($note['body']) ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>