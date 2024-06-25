<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner/banner-start.php') ?>

<h1 class="text-3xl font-bold tracking-tight text-gray-900">Expense Tracker Details</h1>

<a href="/work/create" class="rounded-md bg-indigo-600 px-3.5 py-2 text-sm text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
  <i class="fa-solid fa-plus mr-2"></i>
  <span>New Work</span>
</a>

<?php require base_path('views/partials/banner/banner-end.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <?php if (empty($works)) : ?>
      <p class="text-center text-lg mt-5 text-gray-600">No Works Found.</p>
    <?php else : ?>
      <div class="relative overflow-x-auto mt-2 border border-gray-300 rounded-md mb-10">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 rounded-md overflow-hidden">
          <thead class="text-xs text-gray-700 uppercase bg-gray-200">
            <tr>
              <?php
              $tableHeadings = ['Name', 'Date', 'Advance', 'Taxi', 'Labour', 'Food', 'Total', 'Balance'];
              foreach ($tableHeadings as $tableHeading) : ?>
                <th scope="col" class="px-6 py-3 text-gray-800"><?= $tableHeading ?></th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $total_advance = 0;
            $total_taxi = 0;
            $total_labour = 0;
            $total_food = 0;
            $total_total = 0;
            $total_balance = 0;

            foreach ($works as $work) :
              $total = $work['advance'] + $work['taxi'] + $work['labour'] + $work['food'];
              $balance = $work['advance'] - ($work['taxi'] + $work['labour'] + $work['food']);

              $total_advance += $work['advance'];
              $total_taxi += $work['taxi'];
              $total_labour += $work['labour'];
              $total_food += $work['food'];
              $total_total += $total;
              $total_balance += $balance;
            ?>
              <tr class="bg-white border-b hover:bg-blue-50">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                  <a href="/work?id=<?= $work['id'] ?>" class="hover:text-blue-500 hover:underline"><?= htmlspecialchars($work['name']) ?></a>
                </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($work['date']) ?></td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($work['advance']) ?></td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($work['taxi']) ?></td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($work['labour']) ?></td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($work['food']) ?></td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($total) ?></td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($balance) ?></td>
              </tr>
            <?php endforeach; ?>

            <tr class="bg-gray-50">
              <th scope="row" class="px-6 py-4 font-bold text-gray-900 whitespace-nowrap" colspan="2">Totals</th>
              <th scope="row" class="px-6 py-4 font-medium text-blue-600 whitespace-nowrap"><?= htmlspecialchars($total_advance) ?></th>
              <th scope="row" class="px-6 py-4 font-medium text-red-600 whitespace-nowrap"><?= htmlspecialchars($total_taxi) ?></th>
              <th scope="row" class="px-6 py-4 font-medium text-red-600 whitespace-nowrap"><?= htmlspecialchars($total_labour) ?></th>
              <th scope="row" class="px-6 py-4 font-medium text-red-600 whitespace-nowrap"><?= htmlspecialchars($total_food) ?></th>
              <th scope="row" class="px-6 py-4 font-medium text-orange-600 whitespace-nowrap"><?= htmlspecialchars($total_total) ?></th>
              <th scope="row" class="px-6 py-4 font-bold text-green-600 whitespace-nowrap"><?= htmlspecialchars($total_balance) ?></th>
            </tr>

          </tbody>
        </table>
      </div>
    <?php endif ?>

  </div>

</main>

<?php require base_path('views/partials/footer.php') ?>