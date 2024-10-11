<!-- Modal content -->
<div class="relative bg-white dark:bg-gray-700" x-data>
  <!-- Modal header -->
  <div class="flex items-center justify-between px-4 py-3 border-b dark:border-gray-600">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
      Criar Quadro
    </h3>
    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" x-on:click="show = false">
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close modal</span>
    </button>
  </div>
  <!-- Modal body -->
  <form class="p-4 md:p-5" @submit.prevent="submitForm()">
    <div class="grid gap-4 mb-4 grid-cols-2">
      <div class="col-span-2">
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título do Quadro</label>
        <input type="text" name="name" id="name" x-model="form.title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-purple-400 focus:border-purple-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="Nome do seu quadro" required="">
      </div>
      {{-- <div class="col-span-2">
          <div x-data="{ open: false, selected: 'Visibilidade do Quadro' }" class="relative">
              <label for="visibilidade" class="block text-sm font-medium text-gray-900 dark:text-white">Visibilidade</label>
              <div class="mt-1 relative">
                  <button @click="open = !open" type="button" class="relative w-full bg-gray-50
                   border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-purple-400 focus:border-purple-400 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-400">
                      <span :class="{'text-gray-700 || dark:text-white': selected === 'Privado', 'text-green-500': selected === 'Compartilhado', 'text-gray-500 || dark:text-gray-400': selected === 'Visibilidade do Quadro'}" class="block truncate" x-text="selected"></span>
                      <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                          <svg :class="{'transform rotate-180': open, 'transform rotate-0': !open}" class="h-5 w-5 text-gray-400 transition-transform duration-300 ease-in-out" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5.292 7.293a1 1 0 011.415 0L10 10.586l3.293-3.293a1 1 0 111.415 1.414l-4 4a1 1 0 01-1.415 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>
                      </span>
                  </button>

                  <div x-show="open" @click.away="open = false" class="absolute mt-1 w-full rounded-md bg-white dark:bg-gray-500 shadow-lg z-10">
                      <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3" class="max-h-60 rounded-md py-1 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                          <li @click="selected = 'Privado'; open = false" class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-purple-200 hover:font-bold dark:hover:bg-purple-600">
                              <div class="flex items-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="relative top-4 h-5 w-5 text-gray-400 dark:text-white">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                  </svg>
                                  <span class="ml-3 block font-normal truncate dark:text-white">Privado</span>
                              </div>
                              <div class="ml-8 text-sm text-gray-500 dark:text-white">
                                  Apenas o criador pode acessar este quadro.
                              </div>
                          </li>
                          <li @click="selected = 'Compartilhado'; open = false" class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-purple-200 hover:font-bold dark:hover:bg-purple-600">
                              <div class="flex items-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="relative top-4 h-5 w-5 text-gray-400 dark:text-white">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                                  </svg>
                                  <span class="ml-3 block font-normal truncate dark:text-white">Compartilhado</span>
                              </div>
                              <div class="ml-8 text-sm text-gray-500 dark:text-white">
                                  Todos os colaboradores terão acesso a este quadro.
                              </div>
                          </li>
                      </ul>
                  </div>
              </div>
              <input type="hidden" name="visibilidade" x-bind:value="selected">
          </div>
      </div> --}}
      <div class="col-span-2">
        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
        <textarea id="description" rows="4" x-model="form.description" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md shadow-sm border border-gray-300 focus:ring-purple-400 focus:border-purple-200 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="Escreva a descrição sobre o quadro aqui"></textarea>
      </div>
    </div>
    <div class="flex items-center justify-center">
      <button type="submit" class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <svg class="w-5 h-5 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
        Criar Novo Quadro
      </button>
    </div>
  </form>
</div>
