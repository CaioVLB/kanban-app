<form class="p-4 md:p-5" @submit.prevent="submitForm()">
  <div class="grid grid-cols-2 gap-4 mb-4">
    <div class="col-span-full">
      <label for="name-client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Cliente</label>
      <input type="text" name="name-client" id="name-client" x-model="form.name"
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
             required autofocus
      >
      <template x-if="errors.name">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.name"></span>
      </template>
    </div>
    <div class="col-span-1" x-data>
      <label for="cpf" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
      <input type="text" name=cpf" id="cpf" x-model="form.cpf"
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
             x-mask="999.999.999-99" required autofocus>
      <template x-if="errors.cpf">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.cpf"></span>
      </template>
    </div>
    <div class="col-span-1" x-data>
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
      <input type="text" name="phone" id="phone" x-model="form.phone_number"
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
             placeholder="(99) 99999-9999" x-mask="(99) 99999-9999" required autofocus>
      <template x-if="errors.phone_number">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.phone_number"></span>
      </template>
    </div>
    <div class="col-span-full">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
      <input type="email" name="email" id="email" x-model="form.email"
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
             placeholder="exemplo@exemplo.com" required autofocus>
      <template x-if="errors.email">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.email"></span>
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
      <span x-show="!isSubmitting">Cadastrar</span>
    </button>
  </div>
</form>
