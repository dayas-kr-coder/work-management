<?php require('partials/head.php') ?>

<div class="fixed top-0 w-full left-0 h-screen">
  <main class="grid min-h-full place-items-center bg-white px-6 py-24 sm:py-32 lg:px-8 my-auto">
    <div class="text-center">
      <p class="text-base font-semibold text-blue-600">404</p>
      <h1 class="mt-4 text-3xl font-bold tracking-tight text-gray-900 sm:text-5xl">Page not found</h1>
      <p class="mt-6 text-base leading-7 text-gray-600">Sorry, we couldn’t find the page you’re looking for.</p>
      <div class="mt-10 flex items-center justify-center gap-y-3 sm:gap-x-6 sm:flex-row flex-col">
        <a href="/" class="sm:flex-1 w-full rounded-md border border-blue-200/90 bg-blue-50 px-3.5 py-2.5 text-sm font-semibold text-blue-600 shadow-sm hover:bg-blue-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-400">Go back home</a>
        <a href="/contact-support" class="sm:flex-1 w-full bg-gray-100 px-3.5 py-2.5 rounded-md text-sm font-semibold text-gray-900 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-300">Contact support <span aria-hidden="true">&rarr;</span></a>
      </div>
    </div>
  </main>
</div>

<?php require('partials/footer.php') ?>