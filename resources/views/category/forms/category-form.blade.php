<form :action="mode === 'create' ? routes.create : routes.update" method="POST" class="p-4 md:p-5" @submit.prevent="isLoadingCategoryAdd = true; $el.submit()">
  @csrf
  <template x-if="mode === 'edit'">
    @method('put')
  </template>
  <div class="mb-4">
    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Especialidade</label>
    <input type="text" name="category" id="category" x-model="form.category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Nome da especialidade" required>
  </div>
  <div class="w-full flex items-center justify-center">
    <button type="submit"
            x-bind:disabled="isLoadingCategoryAdd"
            class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <span x-show="isLoadingCategoryAdd" x-transition>
            <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
            </svg>
          </span>
      <span x-show="!isLoadingCategoryAdd" x-text="mode === 'create' ? 'Cadastrar' : 'Atualizar'"></span>
    </button>
  </div>
</form>
