<section x-data="client_menus()" class="md:flex">
  <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
    <li>
      <button @click="setCurrentMenu({id: 'client_record', label: 'Ficha do Cliente'})"
              :class="{ [active_menu]: current_menu.id === 'client_record', [inactive_menu]: current_menu.id !== 'client_record' }"
              class="w-full inline-flex items-center px-4 py-3" aria-current="page">
        <svg class="w-5 h-5 me-2 lucide lucide-book-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M15 13a3 3 0 1 0-6 0"/>
          <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H19a1 1 0 0 1 1 1v18a1 1 0 0 1-1 1H6.5a1 1 0 0 1 0-5H20"/>
          <circle cx="12" cy="8" r="2"/>
        </svg>
        Informações
      </button>
    </li>
    <li>
      <button @click="setCurrentMenu({id: 'client_address', label: 'Endereços'})"
              :class="{ [active_menu]: current_menu.id === 'client_address', [inactive_menu]: current_menu.id !== 'client_address' }"
              class="w-full inline-flex items-center px-4 py-3">
        <svg class="w-5 h-5 me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
             fill="none" stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
        </svg>
        Endereço
      </button>
    </li>
    <li>
      <button @click="setCurrentMenu({id: 'client_phone', label: 'Contatos'})"
              :class="{ [active_menu]: current_menu.id === 'client_phone', [inactive_menu]: current_menu.id !== 'client_phone' }"
              class="w-full inline-flex items-center px-4 py-3">
        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
             viewBox="0 0 20 20">
          <path
            d="M7.824 5.937a1 1 0 0 0 .726-.312 2.042 2.042 0 0 1 2.835-.065 1 1 0 0 0 1.388-1.441 3.994 3.994 0 0 0-5.674.13 1 1 0 0 0 .725 1.688Z"/>
          <path
            d="M17 7A7 7 0 1 0 3 7a3 3 0 0 0-3 3v2a3 3 0 0 0 3 3h1a1 1 0 0 0 1-1V7a5 5 0 1 1 10 0v7.083A2.92 2.92 0 0 1 12.083 17H12a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h1a1.993 1.993 0 0 0 1.722-1h.361a4.92 4.92 0 0 0 4.824-4H17a3 3 0 0 0 3-3v-2a3 3 0 0 0-3-3Z"/>
        </svg>
        Contatos
      </button>
    </li>
    <li class="relative group" x-data="{ toggleListOpening: false }">
      <button @click="toggleListOpening = !toggleListOpening"
              class="inline-flex items-center px-4 py-3 bg-white border border-gray-200 rounded-lg shadow hover:text-gray-900 hover:bg-gray-100 w-full dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 dark:hover:text-white">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
             class="w-5 h-5 me-2 text-gray-500 dark:text-gray-400 lucide lucide-notepad-text">
          <path d="M8 2v4"/>
          <path d="M12 2v4"/>
          <path d="M16 2v4"/>
          <rect width="16" height="18" x="4" y="4" rx="2"/>
          <path d="M8 10h6"/>
          <path d="M8 14h8"/>
          <path d="M8 18h5"/>
        </svg>
        <span>Fichas</span>
        <svg :class="{'transform rotate-180': toggleListOpening, 'transform rotate-0': !toggleListOpening}"
             class="h-5 w-5 text-gray-900 dark:text-gray-400 ml-auto transition-transform duration-200 ease-in-out"
             viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd"
                d="M5.292 7.293a1 1 0 0 1 1.415 0L10 10.586l3.293-3.293a1 1 0 1 1 1.415 1.414l-4 4a1 1 0 0 1-1.415 0l-4-4a1 1 0 0 1 0-1.414z"
                clip-rule="evenodd"/>
        </svg>
      </button>
      <ul x-show="toggleListOpening" x-cloak x-transition class="pl-6 mt-1 space-y-1">
        <template x-for="submenu in submenus" :key="submenu.id">
          <li>
            <button @click="setCurrentSubmenu(submenu)"
                    :class="{ [active_submenu]: submenu.id === current_submenu.id, [inactive_submenu]: submenu.id !== current_submenu.id }"
                    class="w-full flex items-center p-2"
                    x-text="submenu.label"></button>
          </li>
        </template>
      </ul>
    </li>
  </ul>

  <div class="w-full bg-white shadow text-medium text-gray-500 rounded-lg p-6 dark:text-gray-400 dark:bg-gray-800">
    <section class="flex flex-col h-full">
      <header>
        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4"
            x-text="current_menu.label || `Ficha - ${current_submenu.label}`"></h3>
      </header>
      <template x-if="current_menu.id === 'client_record'">
        @include('client.forms.dashboard.client-categories.client-record-form')
      </template>
      <template x-if="current_menu.id === 'client_address'">
        @include('client.snippets.dashboard.client-categories.client-address')
      </template>
      <template x-if="current_menu.id === 'client_phone'">
        @include('client.snippets.dashboard.client-categories.client-phone')
      </template>
    </section>
  </div>
</section>
