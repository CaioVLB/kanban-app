<x-app-layout>
  <div class="py-12">
    <div x-data="paper({{ $papers }})" class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-2">
      <div class="w-full flex justify-between items-center mb-4 px-2">
        <h1 class="font-bold text-gray-500 dark:text-white">Serviços da Empresa</h1>
        <x-button-modal onclick="openModal('create')">
          <svg class="me-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
          </svg>
          Novo Serviço
        </x-button-modal>
      </div>
      <template x-for="paper in papers" :key="paper.id">
        <div class="w-full flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-4 mx-2 mb-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8 stroke-gray-700 dark:stroke-white lucide lucide-hand-platter">
            <path d="M12 3V2"/><path d="m15.4 17.4 3.2-2.8a2 2 0 1 1 2.8 2.9l-3.6 3.3c-.7.8-1.7 1.2-2.8 1.2h-4c-1.1 0-2.1-.4-2.8-1.2l-1.302-1.464A1 1 0 0 0 6.151 19H5"/><path d="M2 14h12a2 2 0 0 1 0 4h-2"/><path d="M4 10h16"/><path d="M5 10a7 7 0 0 1 14 0"/><path d="M5 14v6a1 1 0 0 1-1 1H2"/>
          </svg>
          <div class="w-full grid grid-cols-3 gap-4 py-1 px-4">
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">Serviço</label>
              <span class="text-start text-gray-900 font-bold dark:text-white">Prevenção / Reabilitação / Diagnóstico</span>
            </div>
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">Preço</label>
              <span class="text-start text-gray-900 font-bold dark:text-white">R$ 100,00</span>
            </div>
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">Disponível?</label>
              <label class="inline-flex items-center me-5 cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer" checked>
                <div class="relative w-11 h-6 mt-1 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400"></div>
              </label>
            </div>
          </div>
          <div class="col-span-1 flex gap-2">
            <x-button-modal onclick="openModal('edit', paper)" modal_id="paper-modal" class="flex items-center justify-center p-2 bg-amber-200 rounded-lg text-amber-600 border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
              </svg>
            </x-button-modal>
            <x-button-modal onclick="openModal('delete', paper)" modal_id="delete-paper-modal" class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-6 w-6 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
                <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
              </svg>
            </x-button-modal>
          </div>
        </div>
      </template>
      <template x-if="papers.length === 0">
        <div class="w-full flex justify-center items-center border rounded-lg shadow bg-yellow-100 p-4 mx-2 dark:border-yellow-800 dark:bg-yellow-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-yellow-700 dark:text-yellow-100 mr-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
          </svg>
          <span class="py-2 px-4 text-start text-yellow-700 dark:text-yellow-100">
            Até o momento, você não tem nenhum cargo cadastrado. Utilize o botão acima para criar cargos.
          </span>
        </div>
      </template>

      @include('paper.snippets.paper-modal', ['show' => "currentModal === 'paper-modal'"])
      @include('paper.snippets.delete-paper-modal', ['show' => "currentModal === 'delete-paper-modal'"])

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
  </div>
</x-app-layout>
