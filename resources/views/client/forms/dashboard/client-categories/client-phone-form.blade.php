<form>
  <div class="grid grid-cols-5 gap-y-4">
    <div class="col-span-full md:col-span-2 lg:col-span-2 md:mr-2">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Titular do Número</label>
      <input type="text" id="name" name="name" autocomplete="name" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Nome do titular" required>
    </div>
    <div class="col-span-full md:col-span-2 lg:col-span-2 md:ml-2" x-data>
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
      <input type="text" id="phone" name="phone" autocomplete="tel" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="(99) 99999-9999" x-mask="(99) 99999-9999" required>
    </div>
    <div class="col-span-full md:col-span-1 lg:col-span-1 flex items-end md:ml-4">
      <button type="submit" class="inline-flex justify-center w-full py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
        Cadastrar
      </button>
    </div>
  </div>
</form>
