<div class="flex-grow grid grid-cols-6 gap-y-4 mb-6">
  <div class="col-span-full md:col-span-3 md:mr-2">
    <label for="nome" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
    <input type="text" id="nome" name="nome" autocomplete="name" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o nome" required>
  </div>
  <div class="col-span-full md:col-span-3 md:ml-2">
    <label for="nome-social" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nome Social</label>
    <input type="text" id="nome-social" name="nome-social" autocomplete="nome-social" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o nome" required>
  </div>
  <div class="col-span-full md:col-span-2 md:mr-2" x-data>
    <label for="cpf" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">CPF</label>
    <input type="text" id="cpf" name="cpf" autocomplete="off" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o CPF" x-mask="999.999.999-99" required>
  </div>
  <div class="col-span-full md:col-span-2 md:mx-2">
    <label for="data-nascimento" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
    <input type="date" id="data-nascimento" name="data-nascimento" autocomplete="bday" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" required>
  </div>
  <div class="col-span-full md:col-span-2 md:ml-2">
    <label for="genero" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gênero</label>
    <input type="text" id="genero" name="genero" autocomplete="genero" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Selecione o gênero" required>
  </div>
  <div class="col-span-full md:col-span-2 md:mr-2">
    <label for="nacionalidade" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nacionalidade</label>
    <input type="text" id="nacionalidade" name="nacionalidade" autocomplete="nacionalidade" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite a nacionalidade" required>
  </div>
  <div class="col-span-full md:col-span-2 md:mx-2">
    <label for="estado-civil" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Estado Civil</label>
    <input type="text" id="estado-civil" name="estado-civil" autocomplete="estado-civil" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o estado civil" required>
  </div>
  <div class="col-span-full md:col-span-2 md:ml-2" x-data>
    <label for="telefone" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
    <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o telefone" x-mask="(99) 99999-9999" required>(69) 99234-8050</div>
  </div>
  <div class="col-span-full md:col-span-3 md:mr-2">
    <label for="contratracao" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Data de Contratação</label>
    <input type="date" id="contratracao" name="contratacao" autocomplete="contratacao" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" required>
  </div>
  <div class="col-span-full md:col-span-3 md:ml-2">
    <label for="role" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Cargo</label>
    <input type="text" id="role" name="role" autocomplete="role" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o email" required>
  </div>
  <div class="col-span-full md:col-span-3 md:mr-2">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
    <input type="email" id="email" name="email" autocomplete="email" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Digite o email" required>
  </div>
  <div class="col-span-full md:col-span-3 md:ml-2">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Endereço</label>
    <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">Rua Abunã - 3247, Bairro Embratel - Porto Velho (RO)</div>
  </div>
</div>
