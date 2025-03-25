<form class="p-4 md:p-5" @submit.prevent="submitForm()">
  <div class="grid gap-4 mb-4 grid-cols-2">
    <div class="col-span-full">
      <label for="name-collaborator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Colaborador</label>
      <input type="text" name="name-collaborator" id="name-collaborator" x-model="form.name"
             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
             required autofocus
      >
      <template x-if="errors.name">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.name"></span>
      </template>
    </div>
    <div class="col-span-full">
      <div class="relative">
        <label for="paper" class="block text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
        <div class="mt-1 relative">
          <button @click="togglePaperDropdown()" type="button"
                  class="relative w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-amber-400 focus:border-amber-200 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
              <span
                :class="{'text-gray-700 || dark:text-white': selectedPaper !== '', 'text-gray-500 || dark:text-gray-400': selectedPaper === ''}"
                class="block truncate" x-text="selectedPaper || 'Selecione o cargo do colaborador'">
              </span>
            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg :class="{'transform rotate-180': openPaperDropdown, 'transform rotate-0': !openPaperDropdown}"
                     class="h-5 w-5 text-gray-400 transition-transform duration-300 ease-in-out"
                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.292 7.293a1 1 0 011.415 0L10 10.586l3.293-3.293a1 1 0 111.415 1.414l-4 4a1 1 0 01-1.415 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
              </span>
          </button>
          <div x-show="openPaperDropdown" @click.away="togglePaperDropdown()"
               class="absolute mt-1 w-full rounded-md bg-white dark:bg-gray-500 shadow-lg z-10 p-1">
            <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3"
                class="max-h-36 py-1 text-base ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
              <template x-for="paper in papers" :key="paper.id">
                <li @click="selectPaper(paper)"
                    class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-amber-200 hover:rounded-md hover:font-bold dark:hover:bg-amber-600">
                  <div class="flex items-center">
                    <span class="ml-1 block font-normal truncate dark:text-white" x-text="paper.paper"></span>
                  </div>
                </li>
              </template>
              <template x-if="papers.length === 0">
                <li class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:rounded-md">
                  <div class="flex items-center">
                    <span class="ml-1 block font-normal dark:text-white">Nenhum cargo cadastrado</span>
                  </div>
                </li>
              </template>
            </ul>
          </div>
        </div>
      </div>
      <template x-if="errors.paper">
        <span class="align-middle text-xs font-bold text-red-400" x-text="errors.paper"></span>
      </template>
    </div>
    <div class="col-span-1" x-data>
      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
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
