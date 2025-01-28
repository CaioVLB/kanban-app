<form :action="mode === 'create' ? routes.create : routes.update" method="POST" class="p-4 md:p-5" @submit.prevent="isLoadingEvolutionAdd = true; $el.submit()">
  @csrf
  <template x-if="mode === 'edit'">
    @method('put')
  </template>
  <div class="mb-4">
    <label for="evolution_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Data</label>
    <input type="date" name="evolution_date" id="evolution_date" x-model="form.date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Nome do serviço" required>
  </div>
  <div class="mb-4">
    <label for="observations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição do Caso</label>
    <textarea id="observations" name="observations" rows="4" x-model="form.observations" class="w-full text-wrap overflow-hidden border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]"></textarea>
  </div>
  <div class="mb-4">
    <label for="next_steps" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Próximas Etapas</label>
    <textarea id="next_steps" name="next_steps" rows="3" x-model="form.nextSteps" class="w-full text-wrap overflow-hidden border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]"></textarea>
  </div>
  <div class="w-full flex items-center justify-center">
    <button type="submit"
            x-bind:disabled="isLoadingEvolutionAdd"
            class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <span x-show="isLoadingEvolutionAdd" x-transition>
            <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
            </svg>
          </span>
      <span x-show="!isLoadingEvolutionAdd" x-text="mode === 'create' ? 'Cadastrar' : 'Atualizar'"></span>
    </button>
  </div>
</form>
