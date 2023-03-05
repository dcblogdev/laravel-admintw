@props([
    'title' => '',
    'content' => '',
    'footer' => '',
    'height' => 'lg:w-1/2'
])

<div x-data="{ on: false }">
    {{ $trigger }}

    <div class="fixed z-50 inset-x-0 sm:inset-0 sm:flex sm:items-center sm:justify-center" x-show="on">

          <div
              class="fixed inset-0 transition-opacity"
              x-show="on"
              x-on:close-modal.window="on = false"
              x-on:keydown.escape.window="on = false"
              x-transition:enter="ease-out duration-300"
              x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100"
              x-transition:leave="ease-in duration-200"
              x-transition:leave-start="opacity-100"
              x-transition:leave-end="opacity-0"
          >
              <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>

        <div class="bg-white dark:bg-gray-600 dark:text-gray-200 rounded-lg overflow-scroll shadow-xl transform transition-all xs:w-full sm:w-full {{ $height }}" role="dialog" aria-modal="true" aria-labelledby="modal-headline"
           x-show="on"
           x-transition:enter="ease-out duration-300"
           x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
           x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
           x-transition:leave="ease-in duration-200"
           x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
           x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        >
            <div class="flex flex-col p-4">

                <header class="flex flex-col text-center mb-2">
                    <h2>{{ $title ?? '' }}</h2>
                </header>

                <main class="mb-4">
                    {{ $content ?? '' }}
                </main>

                <footer class="flex justify-center space-x-2 border-t pt-2">
                    {{ $footer ?? '' }}
                </footer>

            </div>
        </div>

    </div>

</div>
