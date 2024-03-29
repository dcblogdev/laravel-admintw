<div id="pricing"></div>


<div class="bg-gray-800 dark:bg-gray-700">
    <div class="pt-12 sm:pt-16 lg:pt-24">
        <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto space-y-2 lg:max-w-none">
                <h2 class="text-lg leading-6 font-semibold text-gray-300 uppercase tracking-wider">
                    Pricing
                </h2>
                <p class="text-3xl font-extrabold text-white sm:text-4xl lg:text-5xl">
                    Simple pricing, for everyone
                </p>
            </div>
        </div>
    </div>
    <div class="mt-8 pb-12 bg-gray-50 sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24">
        <div class="relative">
            <div class="absolute inset-0 h-3/4 bg-gray-800 dark:bg-gray-700"></div>
            <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-md mx-auto space-y-4 lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5 lg:space-y-0">
                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                            <div>
                                <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-blue-100 text-blue-600"
                                    id="tier-standard">
                                    Monthly
                                </h3>
                            </div>
                            <div class="mt-4 flex items-baseline text-6xl text-blue-600 font-extrabold">
                                $9
                                <span class="ml-1 text-2xl font-medium text-blue-600 text-gray-500">
                  /month
                </span>
                            </div>
                        </div>
                        <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Unlimited domains
                                    </p>
                                </li>

                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Automatic DNS updates
                                    </p>
                                </li>

                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Domain renewal reminders
                                    </p>
                                </li>

                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Unlimited users
                                    </p>
                                </li>

                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Cancel anytime
                                    </p>
                                </li>
                            </ul>
                            @if (config('admintw.is_live'))
                                <div class="rounded-md shadow">
                                    <a href="{{ url('register') }}"
                                       class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700"
                                       aria-describedby="tier-standard">
                                        Start your free {{ config('admintw.trail_days') }} days trial
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                        <div class="px-6 py-8 bg-white sm:p-10 sm:pb-6">
                            <div>
                                <h3 class="inline-flex px-4 py-1 rounded-full text-sm font-semibold tracking-wide uppercase bg-blue-100 text-blue-600"
                                    id="tier-standard">
                                    Annual
                                </h3>
                            </div>
                            <div class="mt-4 flex items-baseline text-6xl text-blue-600 font-extrabold">
                                $99
                                <span class="ml-1 text-2xl font-medium text-blue-600 text-gray-500">
                  /year (1 Month Free)
                </span>
                            </div>
                        </div>
                        <div class="flex-1 flex flex-col justify-between px-6 pt-6 pb-8 bg-gray-50 space-y-6 sm:p-10 sm:pt-6">
                            <ul class="space-y-4">
                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Unlimited domains
                                    </p>
                                </li>

                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Automatic DNS updates
                                    </p>
                                </li>

                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Domain renewal reminders
                                    </p>
                                </li>

                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Unlimited users
                                    </p>
                                </li>

                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <!-- Heroicon name: check -->
                                        <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg"
                                             fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M5 13l4 4L19 7"/>
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-base text-gray-700">
                                        Cancel anytime
                                    </p>
                                </li>
                            </ul>
                            @if (config('admintw.is_live'))
                                <div class="rounded-md shadow">
                                    <a href="{{ route('register') }}"
                                       class="flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700"
                                       aria-describedby="tier-standard">
                                        Start your free {{ config('admintw.trail_days') }} days trial
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>