<x-modal name="modal-card" :show="false" maxWidth="xl">
  <!-- Modal header -->
  <div class="relative bg-white dark:bg-gray-700" x-data>
    <div class="flex items-start justify-end px-4 pt-2">
      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" x-on:click="close()">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
    </div>
    <div class="px-4 pb-2">
      @include('board.forms.card-title-form')
      <div class="flex flex-wrap items-center gap-y-2 my-2">
        @include('board.forms.card-priority-form')
        @include('board.forms.card-client-form')
      </div>
      @include('board.forms.card-description-form')
      @include('board.forms.card-comments-form')
    </div>
  </div>
</x-modal>
