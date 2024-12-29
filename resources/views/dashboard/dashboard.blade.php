<x-app-layout>
  <div class="py-12">
    <div x-data="{ clientesCount: 0, altaCount: 0, mediaCount: 0, baixaCount: 0 }" class="max-w-7xl grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mx-auto px-4 pb-4">
      <!-- Card Clientes -->
      <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex flex-col items-start">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-6 w-6 fill-gray-900 dark:fill-white mr-2" viewBox="0 0 256 256">
            <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
          </svg>
          <h2 class="text-xl font-bold text-gray-900 dark:text-white">Clientes</h2>
        </div>
        <p class="mt-2 text-gray-600 dark:text-gray-300">Gerencie seus clientes e visualize suas informações.</p>
        <div class="w-full flex justify-end mt-1 text-2xl font-bold text-gray-900 dark:text-white" x-text="clientesCount"></div>
      </div>

      <!-- Card Prioridade Alta -->
      <div class="bg-red-100 dark:bg-red-600 shadow rounded-lg p-4 flex flex-col items-start">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#A30E0E" class="h-6 w-6 mr-2 dark:fill-red-100" viewBox="0 0 256 256">
            <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
          </svg>
          <h2 class="text-xl font-bold text-red-700 dark:text-red-100">Prioridade Alta</h2>
        </div>
        <p class="mt-2 text-red-600 dark:text-red-200">Tarefas que requerem atenção imediata.</p>
        <div class="w-full flex justify-end mt-1 text-2xl font-bold text-red-700 dark:text-red-100" x-text="altaCount"></div>
      </div>

      <!-- Card Prioridade Média -->
      <div class="bg-yellow-100 dark:bg-yellow-600 shadow rounded-lg p-4 flex flex-col items-start">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-6 w-6 fill-yellow-700 dark:fill-yellow-100 mr-2" viewBox="0 0 256 256">
            <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
          </svg>
          <h2 class="text-xl font-bold text-yellow-700 dark:text-yellow-100">Prioridade Média</h2>
        </div>
        <p class="mt-2 text-yellow-600 dark:text-yellow-200">Tarefas que devem ser tratadas em breve.</p>
        <div class="w-full flex justify-end mt-1 text-2xl font-bold text-yellow-700 dark:text-yellow-100" x-text="mediaCount"></div>
      </div>

      <!-- Card Prioridade Baixa -->
      <div class="bg-green-100 dark:bg-green-600 shadow rounded-lg p-4 flex flex-col items-start">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-6 w-6 text-green-700 dark:text-green-100 mr-2" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
          </svg>
          <h2 class="text-xl font-bold text-green-700 dark:text-green-100">Prioridade Baixa</h2>
        </div>
        <p class="mt-2 text-green-600 dark:text-green-200">Tarefas que podem ser tratadas depois.</p>
        <div class="w-full flex justify-end mt-1 text-2xl font-bold text-green-700 dark:text-green-100" x-text="baixaCount"></div>
      </div>
    </div>
    <div>
      <h1 class="max-w-7xl mx-auto px-4 mb-2 font-bold text-gray-500 dark:text-white">Gerenciador de Processos</h1>
    </div>
    <div x-data="create_board({{ $boards }})" class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-2 md:gap-y-0 gap-y-0.5">
      <div class="xl:w-[20%] lg:w-[25%] md:w-[33.3333%] w-full relative group box-border py-1 px-2">
        <x-button-modal onclick="openModal()" class="w-full md:h-[122px] h-[90px] flex flex-col justify-center items-center bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="dark:fill-white" viewBox="0 0 256 256">
            <path d="M216,48H40a8,8,0,0,0-8,8V208a16,16,0,0,0,16,16H88a16,16,0,0,0,16-16V160h48v16a16,16,0,0,0,16,16h40a16,16,0,0,0,16-16V56A8,8,0,0,0,216,48ZM88,208H48V128H88Zm0-96H48V64H88Zm64,32H104V64h48Zm56,32H168V128h40Zm0-64H168V64h40Z"></path>
          </svg>
          <span class="font-normal dark:text-white">Criar Novo Quadro</span>
        </x-button-modal>
      </div>

      <template x-for="board in boards" :key="board.id">
        <div class="xl:w-[20%] lg:w-[25%] md:w-[33.3333%] w-full relative group box-border py-1 px-2">
          <a class="w-full md:h-[122px] h-[90px] flex flex-col justify-between py-2 px-4 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <span class="w-full max-h-[80px] inline-block overflow-scroll overflow-y-auto overflow-x-hidden scroll-smooth break-words text-sm font-semibold dark:text-white" x-text="board.title"></span>
            <div class="w-full flex justify-end gap-2">
              <div class="inline-flex justify-center items-center gap-1" title="Cliente(s) vinculado(s) ao quadro">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000" class="dark:fill-white" viewBox="0 0 256 256">
                  <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                </svg>
                <span class="font-normal dark:text-white">0</span>
              </div>
              <div class="inline-flex justify-center items-center gap-1" title="Cartão com prioridade alta">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FF0000" class="dark:fill-red-600" viewBox="0 0 256 256">
                  <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                </svg>
                <span class="font-normal dark:text-white">0</span>
              </div>
              <div class="inline-flex justify-center items-center gap-1" title="Cartão com prioridade média">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000" class="fill-yellow-700 dark:fill-yellow-100" viewBox="0 0 256 256">
                  <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
                </svg>
                <span class="font-normal dark:text-white">0</span>
              </div>
              <div class="inline-flex justify-center items-center gap-1" title="Cartão com prioridade baixa">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" class="text-green-700 dark:text-green-100" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                </svg>
                <span class="font-normal dark:text-white">0</span>
              </div>
            </div>
          </a>
        </div>
      </template>

      <template x-if="true">
        @include('dashboard.snippets.board-modal')
      </template>

      <template x-if="success || error.processing_failure">
        <div x-show="success || error.processing_failure"
             x-transition:enter="transform ease-out duration-300 transition"
             x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
             x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
             x-transition:leave="transform ease-in duration-100 transition"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             role="alert"
             class="fixed top-4 right-4 z-50 max-w-xs w-full border text-sm font-bold p-4 rounded-lg shadow-lg"
             :class="success ? 'bg-green-200 border-green-300 text-green-700' : 'bg-red-200 border-red-300 text-red-700'">
          <span x-text="success || error.processing_failure"></span>
        </div>
      </template>
    </div>
  </div>
</x-app-layout>
