<form @submit.prevent="submitForm()">
  <div class="grid grid-cols-5 gap-y-4">
    <div class="col-span-full md:col-span-2 lg:col-span-2 md:mr-2">
      <label for="identifier" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Titular do Número</label>
      <input type="text" id="identifier" name="identifier" autocomplete="name" x-model="form.identifier"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" required>
      <template x-if="errors.identifier">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.identifier"></span>
      </template>
    </div>
    <div class="col-span-full md:col-span-2 lg:col-span-2 md:ml-2" x-data>
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
      <input type="text" id="phone" name="phone" autocomplete="tel" x-model="form.phone_number"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" x-mask="(99) 99999-9999" required>
      <template x-if="errors.phone_number">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.phone_number"></span>
      </template>
    </div>
    <div class="col-span-full md:col-span-1 lg:col-span-1 flex items-end md:ml-4">
      <button type="submit"
              x-bind:disabled="isSubmitting"
              class="inline-flex justify-center w-full py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <span x-show="isSubmitting" x-transition>
          <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
          </svg>
        </span>
        <span x-show="!isSubmitting">Cadastrar</span>
      </button>
    </div>
  </div>
</form>
