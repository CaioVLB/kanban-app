<div class="w-full my-2">
  <div class="flex flex-col gap-y-2">
    <div class="flex items-center gap-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="dark:stroke-white">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
      </svg>
      <span class="text-lg font-semibold text-gray-900 dark:text-white">Descrição</span>
    </div>
    <form @submit.prevent="saveDescription()">
      <textarea x-model="form.description" @focus="isAddingDescription = true" class="w-full h-16 max-h-16 overflow-y-auto scroll-smooth bg-gray-50 border border-gray-300 text-gray-900 text-sm resize-none rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Adicione uma descrição mais detalhada..."></textarea>
      <div x-show="isAddingDescription" class="flex items-center justify-end gap-2">
        <button type="submit" class="bg-amber-200 border-amber-300 font-semibold text-amber-600 hover:bg-amber-300 hover:border-gray-300 hover:text-amber-700 rounded-lg shadow gap-2 py-1.5 px-4 focus:outline-none dark:bg-amber-600 dark:text-amber-200 dark:hover:text-white dark:border-amber-700 dark:hover:bg-amber-700">
          Adicionar
        </button>
        <button @click="cancelAddingDescription()" type="button" class="bg-white/25 border-gray-300 font-semibold rounded-lg shadow gap-2 py-1.5 px-4 focus:outline-none hover:bg-white/75 dark:text-white dark:bg-gray-700 dark:hover:bg-white/25 dark:border-gray-700">
          Cancelar
        </button>
      </div>
    </form>
  </div>
</div>
