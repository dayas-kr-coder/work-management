<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner/banner-start.php') ?>

<h1 class="text-3xl font-bold tracking-tight text-gray-900">Expense Tracker Details</h1>

<a href="/work/create" class="rounded-md bg-blue-600 px-3.5 py-2 text-sm text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
  <i class="fa-solid fa-plus mr-2"></i>
  <span>New Work</span>
</a>

<?php require base_path('views/partials/banner/banner-end.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

    <?php require base_path('views/works/search-form.view.php') ?>

    <?php if (empty($works)) : ?>
      <div class="relative overflow-x-auto mt-2 border border-gray-300 rounded-md mb-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md overflow-hidden">
          <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
              <?php
              $tableHeadings = ['Name', 'Date', 'Mobile', 'Advance', 'Taxi', 'Labour', 'Food'];
              foreach ($tableHeadings as $tableHeading) : ?>
                <th scope="col" class="px-6 py-3 text-gray-800"><?= $tableHeading ?></th>
              <?php endforeach ?>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-b hover:bg-blue-50">
              <td colspan="<?= count($tableHeadings) ?>" class="px-6 py-4 text-center text-lg text-gray-600">No Works Found.</td>
            </tr>
          </tbody>
        </table>
      </div>
    <?php else : ?>
      <div class="relative overflow-x-auto mt-2 border border-gray-300 rounded-md mb-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md overflow-hidden">
          <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
              <?php
              $tableHeadings = ['Name', 'Date', 'Mobile', 'Advance', 'Taxi', 'Labour', 'Food'];
              foreach ($tableHeadings as $tableHeading) : ?>
                <th scope="col" class="px-6 py-3 text-gray-800"><?= $tableHeading ?></th>
              <?php endforeach ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($works as $work) : ?>
              <tr class="bg-white border-b hover:bg-blue-50">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" title="Click on the name for more options">
                  <a href="/work?id=<?= htmlspecialchars($work['id']) ?>" class="hover:text-blue-500 hover:underline"><?= htmlspecialchars($work['name']) ?></a>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" title="<?= htmlspecialchars($work['date']) ?>"><?= htmlspecialchars($work['date']) ?></td>
                <td scope="row" class="text-gray-900 px-6 py-4 font-medium whitespace-nowrap" title="<?= htmlspecialchars($work['phone'] ?? 'N/A') ?>"><?= htmlspecialchars($work['phone'] ?? 'N/A') ?></td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap" title="<?= htmlspecialchars($work['advance']) ?>"><?= htmlspecialchars($work['advance']) ?></td>
                <td scope="row" class="text-gray-900 px-6 py-4 font-medium whitespace-nowrap" title="<?= htmlspecialchars($work['taxi']) ?>"><?= htmlspecialchars($work['taxi']) ?></td>
                <td scope="row" class="text-gray-900 px-6 py-4 font-medium whitespace-nowrap" title="<?= htmlspecialchars($work['labour']) ?>"><?= htmlspecialchars($work['labour']) ?></td>
                <td scope="row" class="text-gray-900 px-6 py-4 font-medium whitespace-nowrap" title="<?= htmlspecialchars($work['food']) ?>"><?= htmlspecialchars($work['food']) ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    <?php endif ?>

  </div>
</main>

<?php require base_path('views/partials/footer.php') ?>