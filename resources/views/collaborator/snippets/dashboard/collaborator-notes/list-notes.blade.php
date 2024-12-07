<div class="lg:col-span-1 col-span-full bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex flex-col items-start">
  <div class="flex items-center">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 text-gray-900 dark:text-white mr-2">
      <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
    </svg>
    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Anotações</h2>
  </div>
  <div class="mt-2 w-full">
    <form x-data="{ isLoading: false }" action="{{ route('collaborator.storeNotes', $id) }}" method="POST" @submit.prevent="isLoading = true; $el.submit()">
      @csrf
      <div class="flex">
        <input type="text" name="collaborator_annotation" id="collaborator_annotation" autocomplete="off" class="border border-gray-300 text-gray-900 text-sm rounded-s-md shadow-sm focus:ring-amber-400 focus:border-amber-200 w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Escreva anotações sobre o seu colaborador" required>
        <button type="submit"
                x-bind:disabled="isLoading"
                class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-e-lg border border-s-0 border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <span x-show="isLoading" x-transition>
            <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
            </svg>
          </span>
          <span x-show="!isLoading">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
            </svg>
          </span>
        </button>
      </div>
    </form>
    <div class="flex flex-col max-h-[460px] max-h-[460px]:overflow-scroll scroll-smooth overflow-x-hidden gap-y-0.5 mt-2 p-1">
      @forelse($notes as $note)
        <div x-data="{ isLoading: false }" class="grid grid-cols-6 w-full h-auto max-h-[90px] box-border p-1.5 mt-1.5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <div class="flex flex-col col-span-5">
            <span class="text-start text-xs text-gray-500 dark:text-gray-400 truncate" title="{{ $note->createdBy->name }}">Anotação registrada por <b>{{ $note->createdBy->name }}</b>:</span>
            <span class="text-start text-[11px] text-gray-500 dark:text-gray-400">{{ $note->created_at }}</span>
            <div class="max-h-[60px] max-h-auto:overflow-scroll overflow-x-hidden scroll-smooth ps-1 pb-0.5">
              <span class="inline-block break-words text-sm text-gray-600 dark:text-gray-400">{{ $note->content }}</span>
            </div>
          </div>
          <form action="{{ route('collaborator.destroyNotes', $note->id) }}" method="POST" @submit.prevent="isLoading = true; $el.submit()" class="flex items-center justify-center col-span-1">
            @csrf
            @method('DELETE')
            <button type="submit"
                    x-bind:disabled="isLoading"
                    class="flex items-center justify-center p-2 ms-1 focus:outline-none bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
              <span x-show="isLoading" x-transition>
                <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
                </svg>
              </span>
              <span x-show="!isLoading">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
                  <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
                </svg>
              </span>
            </button>
          </form>
        </div>
      @empty
        <div class="border rounded-lg shadow bg-yellow-100 p-3 mt-1 dark:border-yellow-800 dark:bg-yellow-600">
          <p class="p-1 text-start text-yellow-700 dark:text-yellow-100">Até o momento, nenhuma anotação foi registrada para este colaborador.</p>
        </div>
      @endforelse
    </div>
  </div>
</div>
