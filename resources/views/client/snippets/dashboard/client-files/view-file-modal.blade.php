<x-modal name="view-file-modal" :show="false" maxWidth="xl">
  <!-- Modal content -->
  <div class="relative bg-white dark:bg-gray-700" x-data>
    <!-- Modal header -->
    <div class="flex items-center justify-between px-4 py-3 border-b dark:border-gray-600">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white" x-text="`Arquivo: ${fileName}`"></h3>
      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" x-on:click="show = false">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
    </div>
    <!-- Modal body -->
    <div class="w-full">
      <div x-show="isLoadingFile" x-transition role="status" class="max-w-full p-4 rounded shadow animate-pulse md:p-6 dark:border-gray-700">
        <div class="flex items-center justify-center h-48 mb-4 bg-gray-300 rounded dark:bg-gray-500">
          <svg class="w-10 h-10 text-gray-200 dark:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
            <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2ZM10.5 6a1.5 1.5 0 1 1 0 2.999A1.5 1.5 0 0 1 10.5 6Zm2.221 10.515a1 1 0 0 1-.858.485h-8a1 1 0 0 1-.9-1.43L5.6 10.039a.978.978 0 0 1 .936-.57 1 1 0 0 1 .9.632l1.181 2.981.541-1a.945.945 0 0 1 .883-.522 1 1 0 0 1 .879.529l1.832 3.438a1 1 0 0 1-.031.988Z"/>
            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
          </svg>
        </div>
        <div class="flex justify-center">
          <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
        </div>
        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-500 mb-2.5"></div>
        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-500 mb-2.5"></div>
        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-500"></div>
        <span class="sr-only">Carregando arquivo...</span>
      </div>

      <div x-show="!isLoadingFile && file" class="flex flex-col justify-center p-4">
        <!-- Mostre o arquivo -->
        <img x-bind:src="file" x-show="mimeType.endsWith('/png') || mimeType.endsWith('/jpeg') || mimeType.endsWith('/jpg')" :alt="`Exibição do arquivo ${fileName}`" class="pointer-events-none rounded">
        <iframe x-bind:src="file" x-show="mimeType.endsWith('/pdf')" class="min-h-96"></iframe>
        <div class="flex flex-col">
          <span class="text-center text-sm text-gray-600 dark:text-gray-400">Descrição</span>
          <p class="text-center text-sm text-gray-900 font-bold dark:text-white" x-text="fileDescription"></p>
        </div>
      </div>

      <div x-show="errorLoadingFile" class="flex flex-col justify-center items-center p-8">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-28 w-28 fill-amber-500">
          <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
        </svg>
        <p class="text-center font-bold dark:text-white">Algo deu errado ao carregar o arquivo. Por favor, tente novamente mais tarde.</p>
      </div>
    </div>
  </div>
</x-modal>
