<x-app-layout>
    <div class="pt-4 pb-12">
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex items-center col-span-full">
          <a href="{{ route('dashboard') }}"
             class="inline-flex items-center p-2.5 text-amber-600 focus:outline-none bg-amber-200 rounded-full border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="lucide lucide-arrow-big-left-dash">
              <path d="M19 15V9"/>
              <path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/>
            </svg>
          </a>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.forms.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.forms.update-password-form')
            </div>
        </div>
      </div>
      <!--<div class="max-w-7xl mx-auto mt-4 sm:px-6 lg:px-8">
          <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
              <div class="max-w-xl">
                  @include('profile.forms.delete-user-form')
              </div>
          </div>
      </div> -->
    </div>
</x-app-layout>
