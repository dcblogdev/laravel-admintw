<x-layouts.plain>
@section('title', '503')

    <!-- Pages: Errors: 503 -->
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
        class="absolute top-0 bottom-0 left-0 -ml-44 w-48 bg-gray-50 md:-ml-28 md:skew-x-6 dark:bg-gray-500/10"
        aria-hidden="true"
      ></div>
      <div
        class="absolute top-0 right-0 bottom-0 -mr-44 w-48 bg-gray-50 md:-mr-28 md:skew-x-6 dark:bg-gray-500/10"
        aria-hidden="true"
      ></div>
      <!-- END Left/Right Background -->

      <!-- Error Content -->
      <div
        class="relative container mx-auto space-y-16 px-8 py-16 text-center lg:py-32 xl:max-w-7xl"
      >
        <div>
          <div class="mb-5 text-gray-300 dark:text-gray-600">
            <svg
              class="hi-outline hi-wrench-screwdriver inline-block size-12"
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
                d="M11.42 15.17L17.25 21A2.652 2.652 0 0021 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 11-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 004.486-6.336l-3.276 3.277a3.004 3.004 0 01-2.25-2.25l3.276-3.276a4.5 4.5 0 00-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437L5.909 7.5H4.5L2.25 3.75l1.5-1.5L7.5 4.5v1.409l4.26 4.26m-1.745 1.437l1.745-1.437m6.615 8.206L15.75 15.75M4.867 19.125h.008v.008h-.008v-.008z"
              />
            </svg>
          </div>
          <div
            class="text-6xl font-extrabold text-gray-600 md:text-7xl dark:text-gray-400"
          >
            503
          </div>
          <div
            class="mx-auto my-6 h-1.5 w-12 rounded-lg bg-gray-200 md:my-10 dark:bg-gray-700"
            aria-hidden="true"
          ></div>
          <h1 class="mb-3 text-2xl font-extrabold md:text-3xl">
            Hang Tight, We'll Be Back Soon!
          </h1>
          <h2
            class="mx-auto mb-5 font-medium text-gray-500 md:leading-relaxed lg:w-3/5 dark:text-gray-400"
          >
            Our servers are currently overloaded, and we need a little time to
            catch up. We apologize for the inconvenience and appreciate your
            patience.
          </h2>
        </div>
        <a
          href="{{ route('dashboard') }}"
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
<!-- END Pages: Errors: 503 -->


</x-layouts.plain>
