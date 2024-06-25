<div id="DeleteWarningModal" class="hidden fixed top-0 left-0 h-screen w-full bg-black/40 flex items-center justify-center shadow-sm">
  <div class="max-w-[512px] w-full rounded-lg bg-white overflow-hidden">
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
        <input type="hidden" name="_delete_work" id="_delete_work" value="<?= $work['id'] ?>">
        <button class="bg-red-600 hover:bg-red-700 py-1.5 rounded-md px-4 text-white text-sm">
          <i class="fa-solid fa-trash mr-1"></i>
          <span>Delete</span>
        </button>
      </form>
    </div>
  </div>
</div>