<div>
    <x-dropdown>
       <x-slot name="trigger">
           <button class="focus:outline-none">
               <div class="flex">
                   {{ auth()->user()->name }}

                   <svg x-show="!open" class="ml-auto mt-1 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>

                    <svg x-show="open" class="ml-auto mt-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
               </div>
           </button>
       </x-slot>
       <x-slot name="content">
           <x-dropdown-link :href="route('app.users.edit')">Edit Account</x-dropdown-link>

           <form method="POST" action="{{ route('logout') }}">
               @csrf
               <x-dropdown-link href="#" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
           </form>
       </x-slot>
   </x-dropdown>
</div>
