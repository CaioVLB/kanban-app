<div x-data="client_phones({{ json_encode($phones) }})" class="flex-grow">
  @include('client.forms.dashboard.client-categories.phone-form')
  <div class="flex flex-col max-h-[380px] max-h-[380px]:overflow-scroll scroll-smooth overflow-x-hidden gap-y-1.5 pe-2 mt-6">
    <template x-for="phone in phones">
      <div class="flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="w-full grid grid-cols-5 gap-x-4 gap-y-1 lg:py-1 px-2">
          <div class="flex flex-col md:col-span-3 col-span-full">
            <label class="text-start text-gray-600 dark:text-gray-400">Responsável</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white" x-text="phone.identifier"></span>
          </div>
          <div class="flex flex-col md:col-span-2 col-span-full">
            <label class="text-start text-gray-600 dark:text-gray-400">Telefone</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white" x-text="phone.phone_number"></span>
          </div>
        </div>
        <x-danger-button
          class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
               class="h-6 w-6 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
            <path
              d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
          </svg>
        </x-danger-button>
      </div>
    </template>
  </div>
  <template x-if="success || errors.error">
    <div x-show="success || errors.error"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transform ease-in duration-100 transition"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed top-4 right-4 z-50 max-w-xs w-full border text-sm font-bold p-4 rounded-lg shadow-lg"
         :class="success ? 'bg-green-200 border-green-300 text-green-700' : 'bg-red-200 border-red-300 text-red-700'">
      <span x-text="success || errors.error"></span>
    </div>
  </template>
</div>
