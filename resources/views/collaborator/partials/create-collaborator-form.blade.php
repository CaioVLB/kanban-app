<!-- Modal content -->
<div class="relative bg-white dark:bg-gray-700" x-data>
  <!-- Modal header -->
  <div class="flex items-center justify-between px-4 py-3 border-b dark:border-gray-600">
    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
      Cadastrar Colaborador
    </h3>
    <button type="button"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            x-on:click="show = false">
      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
      </svg>
      <span class="sr-only">Close modal</span>
    </button>
  </div>
  <!-- Modal body -->
  <form class="p-4 md:p-5" @submit.prevent="submitForm()">
    <div class="grid gap-4 mb-4 grid-cols-2">
      <div class="col-span-2">
        <label for="name-collaborator" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do
          Colaborador
        </label>
        <input type="text" name="name-collaborator" id="name-collaborator" x-model="form.name"
               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
               placeholder="Nome do seu colaborador" required autofocus
        >
      </div>
      <div class="col-span-2">
        <div class="relative">
          <label for="role" class="block text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
          <div class="mt-1 relative">
            <button @click="toggleRoleDropdown()" type="button"
                    class="relative w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-amber-400 focus:border-amber-200 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
              <span
                :class="{'text-gray-700 || dark:text-white': selectedRole !== '', 'text-gray-500 || dark:text-gray-400': selectedRole === ''}"
                class="block truncate" x-text="selectedRole || 'Cargo do colaborador'">
              </span>
              <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                <svg :class="{'transform rotate-180': openRoleDropdown, 'transform rotate-0': !openRoleDropdown}"
                     class="h-5 w-5 text-gray-400 transition-transform duration-300 ease-in-out"
                     viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M5.292 7.293a1 1 0 011.415 0L10 10.586l3.293-3.293a1 1 0 111.415 1.414l-4 4a1 1 0 01-1.415 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
              </span>
            </button>
            <div x-show="openRoleDropdown" @click.away="toggleRoleDropdown()"
                 class="absolute mt-1 w-full rounded-md bg-white dark:bg-gray-500 shadow-lg z-10 p-1">
              <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3"
                  class="max-h-36 py-1 text-base ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
                <template x-for="role in roles" :key="role.id">
                  <li @click="selectRole(role)"
                      class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-amber-200 hover:rounded-md hover:font-bold dark:hover:bg-amber-600">
                    <div class="flex items-center">
                      <span class="ml-1 block font-normal truncate dark:text-white" x-text="role.name"></span>
                    </div>
                  </li>
                </template>
              </ul>
            </div>
          </div>
          <!--<input type="hidden" name="role" x-bind:value="selectedRole">-->
        </div>
      </div>
      <div class="col-span-2" x-data>
        <div class="col-span-2">
          <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
          <input type="text" name="phone" id="phone" x-model="form.phone"
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
                 placeholder="(99) 99999-9999" x-mask="(99) 99999-9999" required autofocus>
        </div>
      </div>
      <div class="col-span-2" x-data>
        <div class="col-span-2">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <input type="text" name="email" id="email" x-model="form.email"
                 class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
                 placeholder="exemplo@exemplo.com" required autofocus>
        </div>
      </div>
    </div>
    <div class="w-full flex items-center justify-center">
      <button type="submit"
              class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        Cadastrar
      </button>
    </div>
  </form>
</div>
