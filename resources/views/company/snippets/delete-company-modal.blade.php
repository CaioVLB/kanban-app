<x-modal name="modal-delete-company" :show="false" maxWidth="sm">
  <!-- Modal content -->
  <div class="relative bg-white dark:bg-gray-700" x-data>
    <!-- Modal header -->
    <header class="flex items-center justify-between px-4 py-3 border-b dark:border-gray-600">
      <h3 class="text-lg font-semibold truncate text-gray-900 dark:text-white" :title="companyName" x-text="companyName"></h3>
      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" x-on:click="show = false">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
    </header>
    <!-- Modal body -->
    <div class="flex flex-col justify-center items-center px-6 py-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-8 w-8 fill-amber-500">
        <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
      </svg>
      <p class="text-justify dark:text-white"><b>Atenção:</b> Tem certeza de que deseja excluir esta empresa? Esta ação resultará na <b>exclusão permanente</b> de todos os dados relacionados a ela e não poderá ser desfeita.</p>
    </div>
    <!-- Modal footer -->
    <footer class="flex justify-center items-center px-4 pb-4">
      <form :action="'{{ route('company.destroy', '') }}' + '/' + companyId" method="POST" @submit.prevent="isLoading = true; $el.submit()">
        @csrf
        @method('DELETE')
        <button type="submit"
                x-bind:disabled="isLoading"
                class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <span x-show="isLoading" x-transition>
            <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
            </svg>
          </span>
          <span x-show="!isLoading">Confirmar</span>
        </button>
      </form>
    </footer>
  </div>
</x-modal>
