<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <form method="POST" action="/work">
      <input type="hidden" name="_method" value="PATCH">
      <input type="hidden" name="id" value="<?= $work['id'] ?>">

      <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">

          <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

            <div class="sm:col-span-2">
              <label for="name" class="block relative text-sm font-medium leading-6 text-gray-900">Full Name <span class="text-red-500 font-bold font-mono absolute bottom-2 ml-1">*</span></label>
              <div class="mt-2">
                <input id="name" name="name" type="text" value="<?= $work['name'] ?? $_POST['name'] ?>" autocomplete="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <?php if (isset($errors['name'])) : ?>
                  <p class="text-xs text-red-500 mt-2"><?= $errors['name'] ?></p>
                <?php endif ?>
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="advance" class="block text-sm relative font-medium leading-6 text-gray-900">Advance
                <span class="text-red-500 font-bold font-mono absolute bottom-2 ml-1">*</span>
              </label>
              <div class="mt-2">
                <input value="<?= $work['advance'] ?? $_POST['advance'] ?>" id="advance" name="advance" type="number" autocomplete="advance" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <?php if (isset($errors['advance'])) : ?>
                  <p class="text-xs text-red-500 mt-2"><?= $errors['advance'] ?></p>
                <?php endif ?>
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="date" class="block text-sm font-medium leading-6 text-gray-900 relative">Date <span class="text-red-500 font-bold font-mono absolute bottom-2 ml-1">*</span></label>
              <div class="mt-2">
                <input value="<?= $work['date'] ?? $_POST['date'] ?>" id="date" name="date" type="date" autocomplete="date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <?php if (isset($errors['date'])) : ?>
                  <p class="text-xs text-red-500 mt-2"><?= $errors['date'] ?></p>
                <?php endif ?>
              </div>
            </div>

            <div class="sm:col-span-2 sm:col-start-1">
              <label for="labour" class="block text-sm font-medium leading-6 text-gray-900">Labour</label>
              <div class="mt-2">
                <input value="<?= $work['labour'] ?? $_POST['labour'] ?>" type="number" name="labour" id="labour" autocomplete="labour" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <?php if (isset($errors['labour'])) : ?>
                  <p class="text-xs text-red-500 mt-2"><?= $errors['labour'] ?></p>
                <?php endif ?>
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="food" class="block text-sm font-medium leading-6 text-gray-900">Food</label>
              <div class="mt-2">
                <input value="<?= $work['food'] ?? $_POST['food'] ?>" type="number" name="food" id="food" autocomplete="food" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <?php if (isset($errors['food'])) : ?>
                  <p class="text-xs text-red-500 mt-2"><?= $errors['food'] ?></p>
                <?php endif ?>
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Taxi</label>
              <div class="mt-2">
                <input value="<?= $work['taxi'] ?? $_POST['taxi'] ?>" type="number" name="taxi" id="taxi" autocomplete="taxi" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <?php if (isset($errors['taxi'])) : ?>
                  <p class="text-xs text-red-500 mt-2"><?= $errors['taxi'] ?></p>
                <?php endif ?>
              </div>
            </div>

            <div class="sm:col-span-2">
              <label for="phone" class="block text-sm font-medium leading-6 text-gray-900 ">Mobile</label>
              <div class="mt-2">
                <input value="<?= $work['phone'] ?? $_POST['phone'] ?>" id="phone" name="phone" type="number" autocomplete="phone" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                <?php if (isset($errors['phone'])) : ?>
                  <p class="text-xs text-red-500 mt-2"><?= $errors['phone'] ?></p>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-6 grid gap-x-4 gap-y-3 sm:flex sm:items-center sm:justify-end">
        <a href="/works" class="bg-gray-200 order-2 sm:order-1 sm:w-fit w-full rounded-md bg-transparent text-center px-5 py-2 text-sm font-semibold hover:bg-gray-200 text-gray-900">Cancel</a>
        <button type="submit" class="order-1 sm:order-2 sm:w-fit w-full rounded-md bg-blue-600 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">Update</button>
      </div>

    </form>
  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>