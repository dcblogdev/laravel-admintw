<x-layouts.plain>
    @section('title', '403')

    <!-- Pages: Errors: 403 -->
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
                    class="absolute top-0 bottom-0 left-0 -ml-44 w-48 bg-orange-50 md:-ml-28 md:skew-x-6 dark:bg-orange-500/10"
                    aria-hidden="true"
                ></div>
                <div
                    class="absolute top-0 right-0 bottom-0 -mr-44 w-48 bg-orange-50 md:-mr-28 md:skew-x-6 dark:bg-orange-500/10"
                    aria-hidden="true"
                ></div>
                <!-- END Left/Right Background -->

                <!-- Error Content -->
                <div
                    class="relative container mx-auto space-y-16 px-8 py-16 text-center lg:py-32 xl:max-w-7xl"
                >
                    <div>
                        <div class="mb-5 text-orange-300 dark:text-orange-300/50">
                            <svg
                                class="hi-outline hi-hand-raised inline-block size-12"
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
                                    d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075.75V4.575m0 0a1.575 1.575 0 013.15 0V15M6.9 7.575a1.575 1.575 0 10-3.15 0v8.175a6.75 6.75 0 006.75 6.75h2.018a5.25 5.25 0 003.712-1.538l1.732-1.732a5.25 5.25 0 001.538-3.712l.003-2.024a.668.668 0 01.198-.471 1.575 1.575 0 10-2.228-2.228 3.818 3.818 0 00-1.12 2.687M6.9 7.575V12m6.27 4.318A4.49 4.49 0 0116.35 15m.002 0h-.002"
                                />
                            </svg>
                        </div>
                        <div
                            class="text-6xl font-extrabold text-orange-600 md:text-7xl dark:text-orange-500"
                        >
                            403
                        </div>
                        <div
                            class="mx-auto my-6 h-1.5 w-12 rounded-lg bg-gray-200 md:my-10 dark:bg-gray-700"
                            aria-hidden="true"
                        ></div>
                        <h1 class="mb-3 text-2xl font-extrabold md:text-3xl">
                            Sorry, You don't have permission to access this page.
                        </h1>
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


                    @auth
                        <a
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="group inline-flex items-center justify-center gap-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm leading-5 font-semibold text-gray-800 hover:border-gray-300 hover:text-gray-900 hover:shadow-xs focus:ring-3 focus:ring-gray-300/25 active:border-gray-200 active:shadow-none dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:border-gray-600 dark:hover:text-gray-200 dark:focus:ring-gray-600/40 dark:active:border-gray-700"
                        >
                            <svg
                                class="hi-mini hi-lock-closed inline-block size-5 opacity-50 transition group-hover:opacity-100"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M5 8V6a5 5 0 0110 0v2a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2zm8-2v2H7V6a3 3 0 016 0z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="post">
                            {{ csrf_field() }}
                        </form>
                    @endauth
                </div>
                <!-- END Error Content -->
            </div>
        </main>
        <!-- END Page Content -->
    </div>
    <!-- END Page Container -->
    <!-- END Pages: Errors: 403 -->

</x-layouts.plain>
