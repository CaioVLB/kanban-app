<form>
  <div class="flex-grow grid grid-cols-6 gap-4 mb-6">
    <div class="col-span-full">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
      <input type="text" id="name" name="name" autocomplete="name" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Nome do cliente" required>
    </div>
    <div class="col-span-3" x-data>
      <label for="cpf" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">CPF</label>
      <input type="text" id="cpf" name="cpf" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o CPF" x-mask="999.999.999-99" required>
    </div>
    <div class="col-span-2">
      <label for="date-birth" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
      <input type="date" id="date-birth" name="date-birth" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-1">
      <label for="age" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Idade</label>
      <input type="number" id="age" name="age" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-3">
      <label for="gender" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gênero</label>
      <input type="text" id="gender" name="gender" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-3">
      <label for="nationality" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nacionalidade</label>
      <input type="text" id="nationality" name="nationality" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-3">
      <label for="marital-status" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Estado Civil</label>
      <input type="text" id="marital-status" name="marital-status" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-3">
      <label for="profession" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Profissão</label>
      <input type="text" id="profession" name="profession" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-3" x-data>
      <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">(69) 99234-8050</div>
    </div>
    <div class="col-span-3">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
      <input type="email" id="email" name="email" autocomplete="email" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Email" required>
    </div>
    <div class="col-span-full">
      <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Endereço</label>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">Rua Abunã - 3247, Bairro Embratel - Porto Velho (RO)</div>
    </div>
  </div>
  <footer class="flex justify-center items-center mt-auto">
    <button class="inline-flex items-center gap-1 py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
      <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lucide lucide-user-round-pen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 21a8 8 0 0 1 10.821-7.487"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="8" r="5"/></svg>
      <span>Atualizar Informações</span>
    </button>
  </footer>
</form>
