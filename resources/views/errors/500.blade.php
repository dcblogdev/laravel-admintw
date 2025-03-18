<x-layouts.plain>
@section('title', '500')

    <!-- Pages: Errors: 500 -->
<!-- Page Container -->
<div
  id="page-container"
  class="mx-auto flex min-h-dvh w-full min-w-80 flex-col bg-gray-100 dark:bg-gray-900 dark:text-gray-100"
>
  <!-- Page Content -->
  <main id="page-content" class="flex max-w-full flex-auto flex-col">
    <div
      class="relative flex min-h-dvh items-center overflow-hidden bg-white dark:bg-gray-800"
    >
      <!-- Left/Right Background -->
      <div
        class="absolute top-0 bottom-0 left-0 -ml-44 w-48 bg-red-50 md:-ml-28 md:skew-x-6 dark:bg-red-500/10"
        aria-hidden="true"
      ></div>
      <div
        class="absolute top-0 right-0 bottom-0 -mr-44 w-48 bg-red-50 md:-mr-28 md:skew-x-6 dark:bg-red-500/10"
        aria-hidden="true"
      ></div>
      <!-- END Left/Right Background -->

      <!-- Error Content -->
      <div
        class="relative container mx-auto space-y-16 px-8 py-16 text-center lg:py-32 xl:max-w-7xl"
      >
        <div>
          <div class="mb-5 text-red-300 dark:text-red-300/50">
            <svg
              class="hi-outline hi-server inline-block h-21 w-12"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke-width="1.5"
              stroke="currentColor"
              aria-hidden="true"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21.75 17.25v-.228a4.5 4.5 0 00-.12-1.03l-2.268-9.64a3.375 3.375 0 00-3.285-2.602H7.923a3.375 3.375 0 00-3.285 2.602l-2.268 9.64a4.5 4.5 0 00-.12 1.03v.228m19.5 0a3 3 0 01-3 3H5.25a3 3 0 01-3-3m19.5 0a3 3 0 00-3-3H5.25a3 3 0 00-3 3m16.5 0h.008v.008h-.008v-.008zm-3 0h.008v.008h-.008v-.008z"
              />
            </svg>
          </div>
          <div
            class="text-6xl font-extrabold text-red-600 md:text-7xl dark:text-red-500"
          >
            500
          </div>
          <div
            class="mx-auto my-6 h-1.5 w-12 rounded-lg bg-gray-200 md:my-10 dark:bg-gray-700"
            aria-hidden="true"
          ></div>
          <h1 class="mb-3 text-2xl font-extrabold md:text-3xl">
            Houston, We Have a Problem
          </h1>
          <h2
            class="mx-auto mb-5 font-medium text-gray-500 md:leading-relaxed lg:w-3/5 dark:text-gray-400"
          >
            Our server is having a bit of a meltdown. Don't worry, our team of
            experts is on it. Please try again later.
          </h2>
        </div>
        <a
          href="{{ back() }}"
          class="group inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700"
        >
          <svg
            class="hi-mini hi-arrow-path inline-block size-5 opacity-50 transition group-hover:opacity-100"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              fill-rule="evenodd"
              d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z"
              clip-rule="evenodd"
            />
          </svg>
          <span>Try Refreshing</span>
        </a>
      </div>
      <!-- END Error Content -->
    </div>
  </main>
  <!-- END Page Content -->
</div>
<!-- END Page Container -->
<!-- END Pages: Errors: 500 -->


</x-layouts.plain>
