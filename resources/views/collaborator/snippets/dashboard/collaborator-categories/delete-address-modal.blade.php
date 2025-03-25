<x-modal name="modal-delete-address" :show="false" maxWidth="sm">
  <!-- Modal content -->
  <div class="relative bg-white dark:bg-gray-700" x-data>
    <!-- Modal header -->
    <header class="flex items-center justify-between px-4 py-3 border-b dark:border-gray-600">
      <h3 class="text-lg font-semibold truncate text-gray-900 dark:text-white" :title="address" x-text="address"></h3>
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
      <p class="text-justify dark:text-white"><b>Atenção:</b> Tem certeza de que deseja excluir este endereço?</p>
    </div>
    <!-- Modal footer -->
    <footer class="flex justify-center items-center px-4 pb-4">
      @include('collaborator.forms.dashboard.collaborator-categories.delete-address-form')
    </footer>
  </div>
</x-modal>
