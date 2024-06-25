<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner/banner-start.php') ?>

<script>
  document.title = "Work: <?= htmlspecialchars($work['name'], ENT_QUOTES, 'UTF-8') ?>";
</script>

<a href="/works" class="rounded-md px-3.5 py-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
  <i class="fa-solid fa-angle-left mr-1"></i>
  <span>Go Back</span>
</a>

<!-- Expense Tracker Details -->
<h1 class="text-3xl text-gray-800"><?= $work['name'] ?></h1>

<div class="flex items-center justify-between gap-x-4">
  <a href="/work/update?id=<?= $work['id'] ?>" class="rounded-md px-3.5 py-2 text-sm text-sky-500 bg-sky-50 hover:bg-sky-100 hover:text-sky-600">
    <i class="fa-solid fa-pen-to-square mr-1"></i>
    <span>Update</span>
  </a>

  <a href="/work/delete?id=<?= $work['id'] ?>" class="rounded-md px-3.5 py-2 text-sm text-red-500 bg-red-50 hover:bg-red-100 hover:text-red-600">
    <i class="fa-solid fa-trash mr-1"></i>
    <span>Delete</span>
  </a>
</div>

<?php require base_path('views/partials/banner/banner-end.php') ?>

<?php
$totalCost = $work['taxi'] + $work['labour'] + $work['food'];
$profit = $work['advance'] - $totalCost;
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white py-5 px-8 rounded-lg mt-2">
      <div class="px-4 sm:px-0 ">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Work Contract Information</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">details of Work Contract and Client.</p>
      </div>
      <div class="mt-8 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Full name</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work['name'] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Advance Given</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work['advance'] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Taxi Charge</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work['taxi'] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Labour Charge</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work['labour'] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Food Cost</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work['food'] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Date</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work['date'] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Total Cost</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $totalCost ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Profit</dt>
            <dd class="<?= ((int)$profit < 0) ? 'text-red-600' : 'text-green-600' ?> mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0">
              <?= $profit ?>
            </dd>
          </div>
        </dl>
      </div>
    </div>

  </div>

</main>

<?php require base_path('views/partials/footer.php') ?>