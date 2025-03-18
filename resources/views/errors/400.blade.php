<x-layouts.plain>
@section('title', '400')

    <!-- Pages: Errors: 400 -->
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
        class="absolute top-0 bottom-0 left-0 -ml-44 w-48 bg-primary-50 md:-ml-28 md:skew-x-6 dark:bg-primary-500/10"
        aria-hidden="true"
      ></div>
      <div
        class="absolute top-0 right-0 bottom-0 -mr-44 w-48 bg-primary-50 md:-mr-28 md:skew-x-6 dark:bg-primary-500/10"
        aria-hidden="true"
      ></div>
      <!-- END Left/Right Background -->

      <!-- Error Content -->
      <div
        class="relative container mx-auto space-y-16 px-8 py-16 text-center lg:py-32 xl:max-w-7xl"
      >
        <div>
          <div class="mb-5 text-primary-300 dark:text-primary-300/50">
            <svg
              class="hi-outline hi-exclamation-circle inline-block size-12"
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
                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"
              />
            </svg>
          </div>
          <div
            class="text-6xl font-extrabold text-primary-600 md:text-7xl dark:text-primary-500"
          >
            400
          </div>
          <div
            class="mx-auto my-6 h-1.5 w-12 rounded-lg bg-gray-200 md:my-10 dark:bg-gray-700"
            aria-hidden="true"
          ></div>
          <h1 class="mb-3 text-2xl font-extrabold md:text-3xl">
            Oops! Your Request is a Bit Off
          </h1>
          <h2
            class="mx-auto mb-5 font-medium text-gray-500 md:leading-relaxed lg:w-3/5 dark:text-gray-400"
          >
            Looks like our server can't make sense of your request.
          </h2>

        </div>
        <a
          href="{{ route('dashboard') }}"
          class="group inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700"
        >
          <svg
            class="hi-mini hi-arrow-left inline-block size-5 opacity-50 transition group-hover:opacity-100"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
            aria-hidden="true"
          >
            <path
              fill-rule="evenodd"
              d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"
              clip-rule="evenodd"
            />
          </svg>
          <span>Back to Dashboard</span>
        </a>
      </div>
      <!-- END Error Content -->
    </div>
  </main>
  <!-- END Page Content -->
</div>
<!-- END Page Container -->
<!-- END Pages: Errors: 400 -->


</x-layouts.plain>
