<form>
  <div class="grid grid-cols-12 gap-y-4">
    <div class="col-span-full md:col-span-8 lg:col-span-4 md:mr-2">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Descrição</label>
      <input type="text" id="description" name="description" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Ex: nome do responsável pelo endereço" required>
    </div>
    <div class="col-span-full md:col-span-4 lg:col-span-2 md:ml-2 lg:mx-2" x-data>
      <label for="cep" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">CEP</label>
      <input type="text" id="cep" name="cep" autocomplete autofocus class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="99999-999" x-mask="99999-999" required>
    </div>
    <div class="col-span-full md:col-span-5 lg:col-span-4 md:mr-2 lg:mx-2">
      <label for="street" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Logradouro</label>
      <input type="text" id="street" name="street" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Nome da rua/avenida/estrada" required>
    </div>
    <div class="col-span-full md:col-span-2 lg:col-span-2 md:mx-2 lg:ml-2">
      <label for="number" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Número</label>
      <input type="text" id="number" name="number" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Número da residência" required>
    </div>
    <div class="col-span-full md:col-span-5 lg:col-span-3 md:ml-2 lg:mr-2 lg:ml-0">
      <label for="neighborhood" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Bairro</label>
      <input type="text" id="neighborhood" name="neighborhood" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Bairro">
    </div>
    <div class="col-span-full md:col-span-5 lg:col-span-4 md:mr-2 lg:mx-2">
      <label for="city" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Cidade</label>
      <input type="text" id="city" name="city" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Cidade" required>
    </div>
    <div class="col-span-full md:col-span-5 lg:col-span-3 md:mx-2">
      <label for="state" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Estado/UF</label>
      <input type="text" id="state" name="state" autocomplete class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Estado/Unidade Federativa" required>
    </div>
    <div class="col-span-full md:col-span-2 lg:col-span-2 flex items-end md:ml-2">
      <button type="submit" class="inline-flex justify-center w-full gap-1 py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <svg class="w-5 h-5 md:hidden lg:block" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
        <span>Cadastrar</span>
      </button>
    </div>
  </div>
</form>

