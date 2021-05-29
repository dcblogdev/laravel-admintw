<div class="bg-gray-200 dark:bg-gray-700 dark:text-white min-h-screen bg-gray-50 dark:bg-gray-700 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
