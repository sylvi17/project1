<div>
    <nav class="bg-gray">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company" class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-950/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
              <x-nav-link 
                href="/home"
                :active="request()->is('home')"
                >Home
              </x-nav-link>

              <x-nav-link
                href="/profil"
                :active="request()->is('profil')"
              >Profill
              </x-nav-link>

              <x-nav-link
                href="/kontak"
                :active="request()->is('kontak')"
              >Kontak
              </x-nav-link>

              <x-nav-link
                href="/students"
                :active="request()->is('students')"
              >Students
              </x-nav-link>

              <x-nav-link
                href="/guardians"
                :active="request()->is('guardians')"
              >Guardians
              </x-nav-link>

              <x-nav-link
                href="/classrooms"
                :active="request()->is('classrooms')"
              >Classrooms
              </x-nav-link>

              <x-nav-link
                href="/teachers"
                :active="request()->is('teachers')"
              >Teacher
              </x-nav-link>

              <x-nav-link
                href="/subjects"
                :active="request()->is('subjects')"
              >Subject
              </x-nav-link>
              <x-nav-link
                href="/dashboard"
                :active="request()->is('admins')"
              >Admin
              </x-nav-link>
            
              {{-- <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Calendar</a>
              <a href="#" class=korounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-white/5 hover:text-white">Reports</a> --}}
            </div>
          </div>
        </div>


        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            @guest
            <a href="{{route('login')}}" class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">
              Login
            </a>
            @endguest

            @auth
            <div class="relative ml-3">
              <!-- Button avatar -->
              <button
                type="button"
                class="relative flex max-w-xs items-center rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500"
                id="user-menu-button"
                aria-expanded="false"
                onclick="document.getElementById('user-dropdown').classList.toggle('hidden')"
              >
                <span class="sr-only">Open user menu</span>
                <img
                  class="size-8 rounded-full"
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e"
                  alt="user avatar"
                />
              </button>

              <!-- Dropdown -->
              <div
                id="user-dropdown"
                class="hidden absolute right-0 z-10 mt-2 w-40 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black/5"
              >
                <a
                  href="{{ route('home') }}"
                  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                >
                  User View
                </a>

                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button
                    type="submit"
                    class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100"
                  >
                    Sign Out
                  </button>
                </form>
              </div>
            </div>
            @endauth

          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white/5 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-950S/50 text-white", Default: "text-gray-300 hover:bg-white/5 hover:text-white" -->
        <x-nav-link-mobile
        href="home" 
        :active="request()->is('home')"
        >Home
        </x-nav-link-mobile>
        
        <x-nav-link-mobile
        href="profil" 
        :active="request()->is('profil')"
        >Profil
        </x-nav-link-mobile>
        
        <x-nav-link-mobile
        href="kontak" 
        :active="request()->is('kontak')"
        >Kontak
        </x-nav-link-mobile>
        
        <x-nav-link-mobile
        href="students" 
        :active="request()->is('students')"
        >Students
        </x-nav-link-mobile>

        <x-nav-link-mobile
        href="students" 
        :active="request()->is('students')"
        >Guardians
        </x-nav-link-mobile>

        {{-- <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray hover:bg-white/5 hover:text-white">Calendar</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray- hover:bg-white/5 hover:text-white">Reports</a> --}}
      </div>
      <div class="border-t border-white/10 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="size-10 rounded-full outline -outline-offset-1 outline-white/10" />
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white">Tom Cook</div>
            <div class="text-sm font-medium text-gray-400">tom@example.com</div>
          </div>
          <button type="button" class="relative ml-auto shrink-0 rounded-full p-1 text-gray-400 hover:text-white focus:outline-2 focus:outline-offset-2 focus:outline-indigo-500">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
              <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Your profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Settings</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-white/5 hover:text-white">Sign out</a>
        </div>
      </div>
    </el-disclosure>
  </nav>
</div>