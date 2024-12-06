<form class="p-4 md:p-5" @submit.prevent="submitForm()">
  <div class="grid gap-4 mb-4 grid-cols-2">
    <div class="col-span-2">
      <label for="paper-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Cargo</label>
      <input type="text" name="paper-name" id="paper-name" x-model="form.paper" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Nome do cargo" required>
      <template x-if="errors.paper">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.paper"></span>
      </template>
    </div>
  </div>
  <div class="w-full flex items-center justify-center">
    <button type="submit"
            x-bind:disabled="isSubmitting"
            class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <span x-show="isSubmitting" x-transition>
            <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
            </svg>
          </span>
      <span x-show="!isSubmitting" x-text="mode === 'create' ? 'Cadastrar Cargo' : 'Atualizar Cargo'">Confirmar</span>
    </button>
  </div>
</form>
