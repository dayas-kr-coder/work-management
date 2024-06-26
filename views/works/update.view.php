<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<!-- form method="POST" -->
<script>
  document.title = "Update: <?= htmlspecialchars($work['name'], ENT_QUOTES, 'UTF-8') ?>";
</script>

<form method="POST">
  <?php require base_path('views/partials/banner/banner-start.php') ?>
  <a href="/works" class="rounded-md px-3.5 py-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
    <i class="fa-solid fa-angle-left mr-1"></i>
    <span>Go Back</span>
  </a>

  <h1 class="text-3xl text-gray-800">Update (<?= $work['name'] ?>)</h1>

  <div class="flex items-center justify-between gap-x-4">
    <a href="/work?id=<?= $work['id'] ?>" class="rounded-md px-3.5 py-2 text-sm text-gray-600 bg-gray-100 hover:bg-gray-200 hover:text-gray-800">
      <i class="fa-solid fa-xmark mr-2"></i>
      <span>Cancel</span>
    </a>
    <button type="submit" class="rounded-md px-7 py-2 text-sm text-green-800 bg-green-200 hover:bg-green-300 hover:text-green-900">Save</button>
  </div>

  <?php require base_path('views/partials/banner/banner-end.php') ?>

  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white py-5 px-8 rounded-lg mt-2">
      <div class="px-4 sm:px-0 flex items-top justify-between">
        <div>
          <h3 class="text-base font-semibold leading-7 text-gray-900">Update Work Contract Information</h3>
          <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">Please update the details of the Work Contract and Client.</p>
        </div>
      </div>
      <div class="mt-8 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Full name</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <input name="name" id="name" type="text" value="<?= $_POST['name'] ?? $work['name']  ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <?php if (isset($errors['name'])) : ?>
                <p class="text-xs text-red-500 mt-2"><?= $errors['name'] ?></p>
              <?php endif ?>
            </dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Advance Given</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <input name="advance" id="advance" type="text" value="<?= $_POST['advance'] ?? $work['advance'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <?php if (isset($errors['advance'])) : ?>
                <p class="text-xs text-red-500 mt-2"><?= $errors['advance'] ?></p>
              <?php endif ?>
            </dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Taxi Charge</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <input name="taxi" id="taxi" type="text" value="<?= $_POST['taxi'] ?? $work['taxi'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Labour Charge</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <input name="labour" id="labour" type="text" value="<?= $_POST['labour'] ?? $work['labour'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Food Cost</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <input name="food" id="food" type="text" value="<?= $_POST['food'] ?? $work['food'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Phone Number</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <input name="phone" id="phone" type="number" value="<?= $_POST['phone'] ?? $work['phone'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Date</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <input name="date" id="date" type="date" value="<?= $_POST['date'] ?? $work['date'] ?>" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              <?php if (isset($errors['taxi'])) : ?>
                <p class="text-xs text-red-500 mt-2"><?= $errors['taxi'] ?></p>
              <?php endif ?>
            </dd>
          </div>
        </dl>
      </div>
    </div>

  </div>

</form>

<?php require base_path('views/partials/footer.php') ?>