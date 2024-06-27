<form method="GET" action="" class="mb-6 flex items-center justify-between w-full gap-x-2" onreset="resetForm()">
  <div class="flex items-center w-full gap-x-3">
    <select id="filter" name="filter" class="max-w-[8rem] text-gray-500 py-1.5 px-3 pe-9 block w-full border-gray-300 rounded-lg text-sm focus:border-blue-600 focus:ring-blue-600 disabled:opacity-50 disabled:pointer-events-none" onchange="toggleSearchInput()">
      <option selected>Filter By</option>
      <?php foreach ($filterOptions as $filterOption) : ?>
        <?php if ($filterOption !== 'id') : ?>
          <option value="<?= htmlspecialchars($filterOption) ?>" <?= ($_GET['filter'] ?? '') === $filterOption ? 'selected' : '' ?>>
            <?= htmlspecialchars($filterOption) ?>
          </option>
        <?php endif ?>
      <?php endforeach ?>
    </select>

    <input value="<?= $_GET['date'] ?? '' ?>" id="date-input" name="date" type="date" class="hidden block w-fit rounded-md border-0 py-[7px] text-gray-500 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm" onchange="submitFormIfDateSelected()">
    <span class="text-red-500 text-xs"><?= $errors['date_error'] ?? '' ?></span>
  </div>

  <div id="search-container" class="flex items-center gap-x-3 max-w-xs w-full relative">
    <input value="<?= htmlspecialchars($search) ?? '' ?>" id="search" name="search" type="text" autocomplete="search" class="pr-12 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6" placeholder="Search here..." oninput="toggleResetButton()">

    <button type="button" id="reset-button" onclick="resetForm()" class="absolute right-1.5 p-1 size-7 text-nowrap flex justify-center items-center rounded-full text-xs leading-6 hover:text-gray-800 text-gray-500 hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-400 hidden">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>

  <button id="submit_button" name="submit_button" value="submit_button" type="submit" class="flex text-nowrap justify-center rounded-md bg-gray-500 px-3 py-1.5 text-sm leading-6 text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Search</button>
</form>

<script>
  function toggleResetButton() {
    const searchInput = document.getElementById('search');
    const resetButton = document.getElementById('reset-button');

    if (searchInput.value.trim() === '') {
      resetButton.classList.add('hidden');
    } else {
      resetButton.classList.remove('hidden');
    }
  }

  function resetForm() {
    const searchInput = document.getElementById('search');
    searchInput.value = '';
    toggleResetButton();
  }

  function toggleSearchInput() {
    const filter = document.getElementById('filter').value;
    const dateInput = document.getElementById('date-input');

    if (filter === 'date') {
      dateInput.classList.remove('hidden');
    } else {
      dateInput.classList.add('hidden');
    }
  }

  function submitFormIfDateSelected() {
    const dateInput = document.getElementById('date-input');
    if (dateInput.value) {
      dateInput.form.submit();
    }
  }

  // Initial checks to set the visibility of elements on page load
  document.addEventListener('DOMContentLoaded', function() {
    toggleSearchInput();
    toggleResetButton();
  });
</script>