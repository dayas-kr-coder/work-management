<?php require base_path("views/partials/head.php"); ?>
<?php require base_path("views/partials/nav.php"); ?>

<script>
  document.title = "<?= htmlspecialchars($work["name"], ENT_QUOTES, "UTF-8") ?>";
</script>

<?php require base_path("views/partials/banner/banner-start.php"); ?>

<a href="/works" class="rounded-md px-3.5 py-2 text-gray-600 hover:bg-blue-50 hover:text-blue-600">
  <i class="fa-solid fa-angle-left mr-1"></i>
  <span>Go Back</span>
</a>

<h1 class="text-3xl text-gray-800 fond-bold"><?= $work["name"] ?></h1>

<div class="flex items-center justify-between gap-x-4">
  <a href="/work/update?id=<?= $work["id"] ?>" class="size-10 bg-blue-50 hover:bg-blue-100 flex items-center justify-center  rounded-lg px-6 text-blue-500 hover:text-blue-600 text-sm" title="Update <?= $work["name"] ?>">
    <i class="fa-solid fa-pen-to-square text-lg"></i>
  </a>

  <!-- Delete Modal Dialog -->
  <?php require base_path("views/partials/works/delete-modal.php"); ?>

</div>

<?php require base_path("views/partials/banner/banner-end.php"); ?>

<?php
$totalCost = $work["taxi"] + $work["labour"] + $work["food"];
$profit = $work["advance"] - $totalCost;
?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <div class="bg-white py-5 px-8 rounded-lg mt-2">
      <div class="px-4 sm:px-0">
        <h3 class="text-base font-semibold leading-7 text-gray-900">Work Contract Information</h3>
        <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">details of Work Contract and Client.</p>
      </div>
      <div class="mt-8 border-t border-gray-100">
        <dl class="divide-y divide-gray-100">
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Full name</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work["name"] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Advance Given</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work["advance"] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Taxi Charge</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work["taxi"] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Labour Charge</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work["labour"] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Food Cost</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $work["food"] ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Date</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <div class="flex items-center gap-x-2">
                <span>
                  <script>
                    document.write(dayjs("<?= $work["date"] ?>").format('DD MMMM YYYY'));
                  </script>
                </span>
                <span class="text-gray-500">
                  <script>
                    document.write(dayjs("<?= $work["date"] ?>").format('dddd'));
                  </script>
                </span>
              </div>
            </dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Mobile Number</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0">
              <a href="tel:<?= $work["phone"] ?>" class="hover:underline text-blue-500"><?= $work["phone"] ?></a>
            </dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Total Cost</dt>
            <dd class="mt-1 text-sm leading-6 text-gray-800 sm:col-span-2 sm:mt-0"><?= $totalCost ?></dd>
          </div>
          <div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
            <dt class="text-sm font-medium leading-6 text-gray-950">Profit</dt>
            <dd class="<?= (int) $profit <= 0
                          ? "text-red-600"
                          : "text-green-600" ?> mt-1 text-sm leading-6 sm:col-span-2 sm:mt-0">
              <?= $profit ?>
            </dd>
          </div>
        </dl>
      </div>
    </div>

  </div>

</main>

<?php require base_path("views/partials/footer.php"); ?>