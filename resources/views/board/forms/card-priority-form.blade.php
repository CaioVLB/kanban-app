<div class="w-full md:w-1/2 relative md:pr-2">
  <label for="card-priority" class="block text-sm font-medium text-gray-900 dark:text-white">Nível de Prioridade</label>
  <div class="mt-1 relative">
    <button @click="toggleDropdown()" type="button"
            class="relative w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-amber-400 focus:border-amber-200 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
      <span
        :class="{'text-gray-700 || dark:text-white': selectedDropdown !== '', 'text-gray-500 || dark:text-gray-400': selectedDropdown === ''}"
        class="block truncate" x-text="selectedDropdown || 'Prioridade do cartão'">
      </span>
      <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
        <svg :class="{'transform rotate-180': openDropdown, 'transform rotate-0': !openDropdown}"
             class="h-5 w-5 text-gray-400 transition-transform duration-300 ease-in-out"
             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.292 7.293a1 1 0 011.415 0L10 10.586l3.293-3.293a1 1 0 111.415 1.414l-4 4a1 1 0 01-1.415 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
      </span>
    </button>
    <div x-show="openDropdown" @click.away="toggleDropdown()"
         class="absolute mt-1 w-full rounded-md bg-white dark:bg-gray-500 shadow-lg z-10 p-1">
      <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3"
          class="max-h-36 py-1 text-base ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
        <template x-for="priority in priorities" :key="priority.id">
          <li @click="selectedOption(priority)"
              class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-amber-200 hover:rounded-md hover:font-bold dark:hover:bg-amber-600">
            <div class="flex items-center">
              <span class="ml-1 block font-normal truncate dark:text-white" x-text="priority.label"></span>
            </div>
          </li>
        </template>
      </ul>
    </div>
  </div>
  <!--<input type="hidden" name="role" x-bind:value="selectedRole">-->
</div>
