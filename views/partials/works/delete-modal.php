<!-- Button to open the modal -->
<button id="openDeleteWarningModal" class="size-10 bg-red-50 hover:bg-red-100 flex items-center justify-center rounded-lg px-6 text-red-500 hover:text-red-600 text-sm" title="Delete permanently">
  <i class="fa-solid fa-trash-can text-lg"></i>
</button>

<!-- Dialog modal -->
<dialog id="deleteWarningModal" class="max-w-[512px] rounded-lg bg-white overflow-hidden shadow-sm">
  <div class="flex gap-x-4 p-6 pb-4">
    <div class="size-10 rounded-full bg-red-200 shrink-0 flex items-center justify-center">
      <i class="fa-solid fa-triangle-exclamation text-red-600"></i>
    </div>
    <div class="flex flex-col gap-y-1">
      <span class="font-medium">This action can't be undone.</span>
      <span class="text-sm text-gray-500 pr-2">Are you absolutely certain you want to proceed with deleting the work details from the database record? Please review carefully before confirming.</span>
    </div>
  </div>

  <div class="bg-gray-50 w-full py-3.5 flex items-center justify-end px-6 gap-x-3">
    <button id="closeDeleteWarningModal" class="bg-gray-50 border border-gray-200 hover:bg-gray-100 py-1.5 rounded-md px-4 text-sm">Cancel</button>
    <form method="POST">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="_delete_work" id="_delete_work" value="<?= $work["id"] ?>">
      <button type="submit" class="bg-red-600 hover:bg-red-700 py-1.5 rounded-md px-4 text-white text-sm">
        <span>Delete</span>
      </button>
    </form>
  </div>
</dialog>

<script>
  const openDeleteWarningModal = document.getElementById("openDeleteWarningModal");
  const deleteWarningModal = document.getElementById("deleteWarningModal");
  const closeDeleteWarningModal = document.getElementById("closeDeleteWarningModal");

  openDeleteWarningModal.addEventListener("click", () => {
    deleteWarningModal.showModal();
  });

  closeDeleteWarningModal.addEventListener("click", () => {
    deleteWarningModal.close();
  });

  deleteWarningModal.addEventListener("click", (event) => {
    if (event.target === deleteWarningModal) {
      deleteWarningModal.close();
    }
  });
</script>