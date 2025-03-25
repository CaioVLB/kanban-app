<div class="w-full md:w-1/2 relative md:pr-2">
  <label for="card-priority" class="block text-sm font-medium text-gray-900 dark:text-white">Nível de Prioridade</label>
  <div class="mt-1 relative" @click.outside="openPriorityDropdown = false">
    <button @click="openPriorityDropdown = !openPriorityDropdown" type="button"
            class="relative w-full bg-gray-50 border border-gray-300 rounded-md shadow-sm pl-3 pr-10 py-2.5 text-left cursor-default focus:outline-none focus:ring-amber-400 focus:border-amber-200 sm:text-sm dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
      <span
        :class="{'text-gray-700 || dark:text-white': selectedPriorityDropdown !== '', 'text-gray-500 || dark:text-gray-400': selectedPriorityDropdown === ''}"
        class="block truncate" x-text="selectedPriorityDropdown || 'Prioridade do cartão'">
      </span>
      <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
        <svg :class="{'transform rotate-180': openPriorityDropdown, 'transform rotate-0': !openPriorityDropdown}"
             class="h-5 w-5 text-gray-400 transition-transform duration-300 ease-in-out"
             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
          <path fill-rule="evenodd" d="M5.292 7.293a1 1 0 011.415 0L10 10.586l3.293-3.293a1 1 0 111.415 1.414l-4 4a1 1 0 01-1.415 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
      </span>
    </button>
    <div x-show="openPriorityDropdown"
         class="absolute mt-1 w-full rounded-md bg-white dark:bg-gray-500 shadow-lg z-10 p-1">
      <ul tabindex="-1" role="listbox" aria-labelledby="listbox-label" aria-activedescendant="listbox-item-3"
          class="max-h-36 py-1 text-base ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
        <li @click="selectedOption('priority', {id: 1, label: 'Prioridade Baixa'})"
            class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-amber-200 hover:rounded-md hover:font-bold dark:hover:bg-amber-600">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-5 w-5 text-green-600 dark:text-green-500" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
            </svg>
            <span class="ml-3 block font-normal truncate dark:text-white">Prioridade <b class="text-green-600 dark:text-green-500">Baixa</b></span>
          </div>
        </li>
        <li @click="selectedOption('priority', {id: 2, label: 'Prioridade Média'})"
            class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-amber-200 hover:rounded-md hover:font-bold dark:hover:bg-amber-600">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-yellow-500 dark:fill-yellow-400" viewBox="0 0 256 256">
                <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
              </svg>
            <span class="ml-3 block font-normal truncate dark:text-white">Prioridade <b class="text-yellow-500 dark:text-yellow-400">Média</b></span>
          </div>
        </li>
        <li @click="selectedOption('priority', {id: 3, label: 'Prioridade Alta'})"
            class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-amber-200 hover:rounded-md hover:font-bold dark:hover:bg-amber-600">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FF0000" class="h-5 w-5 dark:fill-red-600" viewBox="0 0 256 256">
              <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
            </svg>
            <span class="ml-3 block font-normal truncate dark:text-white">Prioridade <b class="text-red-700">Alta</b></span>
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!--<input type="hidden" name="role" x-bind:value="selectedRole">-->
</div>
