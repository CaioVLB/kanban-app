<form class="p-4 md:p-5" method="POST" action="{{ route('client.files.store', $client->id) }}" enctype="multipart/form-data" @submit.prevent="isUploadingFile = true; $el.submit()">
  @csrf
  <div class="flex flex-col gap-4 mb-4">
    <div class="col-span-full">
      <x-input-label for="content" :value="__('Descrição')" />
      <x-text-input id="content" class="block mt-1 w-full" type="text" name="content"
                    :value="old('content')" required autofocus autocomplete="off" />
    </div>
    <div class="col-span-full">
      <x-input-label for="file_input" :value="__('Arquivo')" />
      <input type="file" id="file_input" name="file_input" accept="image/png, image/jpeg, image/jpg, application/pdf" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-gray-400" aria-describedby="file_input_help" required>
      <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG, JPG, JPEG ou PDF (MAX. 8MB).</p>
    </div>
  </div>
  <div class="flex items-center justify-center mt-4">
    <button type="submit"
            x-bind:disabled="isUploadingFile"
            class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
      <span x-show="isUploadingFile" x-transition>
        <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
        </svg>
      </span>
      <span x-show="!isUploadingFile">{{ isset($managerAndYourCompany) ? 'Salvar Alteração' : 'Carregar Arquivo' }}</span>
    </button>
  </div>
</form>
