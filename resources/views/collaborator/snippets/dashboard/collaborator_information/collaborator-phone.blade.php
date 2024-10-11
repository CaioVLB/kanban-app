<div class="flex-grow">
  @include('collaborator.partials.dashboard.collaborator_information.collaborator-phone-form')
  <div class="flex flex-col max-h-[380px] max-h-[380px]:overflow-scroll scroll-smooth overflow-x-hidden gap-y-1.5 pe-2 mt-6">
      <div class="w-full flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="w-full grid gap-x-4 gap-y-1 grid-cols-1 md:grid-cols-3 lg:grid-cols-4 lg:py-1 px-2">
          <div class="flex flex-col col-span-full md:col-span-2 lg:col-span-2">
            <label class="text-start text-gray-600 dark:text-gray-400">Responsável</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white">Caio Vitor Lima Brito</span>
          </div>
          <div class="flex flex-col col-span-full md:col-span-1 lg:col-span-2">
            <label class="text-start text-gray-600 dark:text-gray-400">Telefone</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white">(69) 99234-8050</span>
          </div>
        </div>
        <x-danger-button class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-6 w-6 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
            <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
          </svg>
        </x-danger-button>
      </div>
  </div>
</div>
