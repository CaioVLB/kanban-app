<form :action="mode === 'create' ? routes.create : routes.update" method="POST" @submit.prevent="isLoadingEvaluationAdd = true; $el.submit()" class="p-4 md:p-5">
  @csrf
  <template x-if="mode === 'edit'">
    @method('PUT')
  </template>
  <div class="mb-4">
    <label for="evaluation_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" x-text="`Qual o nome você deseja colocar para essa avaliação ${evaluationLabel}?`"></label>
    <input type="text" name="evaluation_name" id="evaluation_name" x-model="form.evaluationName" maxlength="255" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o nome da avaliação aqui" required>
    <small x-show="mode === 'edit'" class="text-[11.5px] font-bold text-gray-600 cursor-default dark:text-gray-400">Se desejar alterar o nome da avaliação, modifique o campo acima.</small>
  </div>
  <div class="w-full flex items-center justify-center">
    <button type="submit"
            x-bind:disabled="isLoadingEvaluationAdd"
            class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <span x-show="isLoadingEvaluationAdd" x-transition>
            <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
            </svg>
          </span>
      <span x-show="!isLoadingEvaluationAdd" x-text="mode === 'create' ? 'Iniciar Avaliação' : 'Ir Para Avaliação'"></span>
    </button>
  </div>
</form>
