<div class="h-screen overflow-y-auto transition-all duraction-200 bg-white dark:bg-gray-800" :class="openSideBar ? '2xl:w-64 xl:w-64 lg:w-62 w-56' : 'w-0'">
  <div class="w-full h-auto flex justify-center p-2 bg-white dark:bg-gray-800">
    <!-- Logo -->
    <div class="shrink-0 flex items-center">
      <a href="{{ route('dashboard') }}">
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
      </a>
    </div>
  </div>
  <div class="p-3">
    <ul>
      <!-- Menu: Perfil -->
      <li>
        <a href="{{ route('profile.edit') }}" class="w-full flex items-center p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 mr-[9px] stroke-gray-900 dark:stroke-white lucide lucide-user-round-cog">
            <path d="M2 21a8 8 0 0 1 10.434-7.62"/><circle cx="10" cy="8" r="5"/><circle cx="18" cy="18" r="3"/><path d="m19.5 14.3-.4.9"/><path d="m16.9 20.8-.4.9"/><path d="m21.7 19.5-.9-.4"/><path d="m15.2 16.9-.9-.4"/><path d="m21.7 16.5-.9.4"/><path d="m15.2 19.1-.9.4"/><path d="m19.5 21.7-.4-.9"/><path d="m16.9 15.2-.4-.9"/>
          </svg>
          Perfil
        </a>
      </li>
      <!-- Menu Item: Clientes -->
      <li>
        <a href="{{ route('clients.index') }}" class="w-full flex items-center p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 mr-[9px] stroke-gray-900 dark:stroke-white lucide lucide-handshake">
            <path d="m11 17 2 2a1 1 0 1 0 3-3"/><path d="m14 14 2.5 2.5a1 1 0 1 0 3-3l-3.88-3.88a3 3 0 0 0-4.24 0l-.88.88a1 1 0 1 1-3-3l2.81-2.81a5.79 5.79 0 0 1 7.06-.87l.47.28a2 2 0 0 0 1.42.25L21 4"/><path d="m21 3 1 11h-2"/><path d="M3 3 2 14l6.5 6.5a1 1 0 1 0 3-3"/><path d="M3 4h8"/>
          </svg>
          Pacientes
        </a>
      </li>
      @can('access-collaborators')
        <!-- Menu Item: Equipe -->
        <li class="relative group" x-data="{ openTeam : false }">
          <button @click="openTeam = !openTeam" class="w-full flex items-center text-start p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md transition duration-150 ease-in-out">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 mr-[9px] fill-gray-900 dark:fill-white" viewBox="0 0 256 256">
              <path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path>
            </svg>
            Equipe
            <svg :class="{'transform rotate-180': openTeam, 'transform rotate-0': !openTeam}" class="h-5 w-5 text-gray-900 dark:text-gray-200 ml-auto transition-transform duration-200 ease-in-out" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M5.292 7.293a1 1 0 0 1 1.415 0L10 10.586l3.293-3.293a1 1 0 1 1 1.415 1.414l-4 4a1 1 0 0 1-1.415 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
            </svg>
          </button>
          <ul x-show="openTeam" x-cloak x-transition class="md:pl-6 pl-0 mt-1 space-y-1">
            <li>
              <a href="{{ route('collaborators.index') }}" class="flex items-center p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition duration-150 ease-in-out">
                Colaboradores
              </a>
            </li>
            <li>
              <a href="{{ route('papers.index') }}" class="flex items-center p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition duration-150 ease-in-out">
                Cargos
              </a>
            </li>
          </ul>
        </li>
        <li>
          <a href="{{ route('categories.index') }}" class="w-full flex items-center p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 mr-[9px] stroke-gray-900 dark:stroke-white lucide lucide-notebook-pen">
              <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4"/><path d="M2 6h4"/><path d="M2 10h4"/><path d="M2 14h4"/><path d="M2 18h4"/><path d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/>
            </svg>
            Especialidades
          </a>
        </li>
      @endcan
      @can('access-companies')
        <li>
          <a href="{{ route('companies.index') }}" class="w-full flex items-center p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-gray-900 dark:fill-white mr-[9px]" viewBox="0 0 256 256">
              <path d="M248,208H232V96a8,8,0,0,0,0-16H184V48a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16V208H24a8,8,0,0,0,0,16H248a8,8,0,0,0,0-16ZM216,96V208H184V96ZM56,48H168V208H144V160a8,8,0,0,0-8-8H88a8,8,0,0,0-8,8v48H56Zm72,160H96V168h32ZM72,80a8,8,0,0,1,8-8H96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,80Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H128A8,8,0,0,1,120,80ZM72,120a8,8,0,0,1,8-8H96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,120Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H128A8,8,0,0,1,120,120Z"></path>
            </svg>
            Empresas
          </a>
        </li>
      @endcan
      <!-- Menu Item: Kanban -->
      <li>
        <button type="button" title="Em breve" disabled class="w-full flex items-center text-start p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-5 w-5 fill-gray-900 dark:fill-white mr-2">
            <path d="M216,48H40a8,8,0,0,0-8,8V208a16,16,0,0,0,16,16H88a16,16,0,0,0,16-16V160h48v16a16,16,0,0,0,16,16h40a16,16,0,0,0,16-16V56A8,8,0,0,0,216,48ZM88,208H48V128H88Zm0-96H48V64H88Zm64,32H104V64h48Zm56,32H168V128h40Zm0-64H168V64h40Z"></path>
          </svg>
          Kanban
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 stroke-gray-900 dark:stroke-white ml-auto lucide lucide-lock-keyhole">
            <circle cx="12" cy="16" r="1"/><rect x="3" y="10" width="18" height="12" rx="2"/><path d="M7 10V7a5 5 0 0 1 10 0v3"/>
          </svg>
        </button>
      </li>
      <!-- Menu Item: Agendamentos -->
      <li>
        <button type="button" title="Em breve" disabled class="w-full flex items-center text-start p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-gray-900 dark:fill-white mr-2" viewBox="0 0 256 256">
            <path d="M208,32H184V24a8,8,0,0,0-16,0v8H88V24a8,8,0,0,0-16,0v8H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32ZM72,48v8a8,8,0,0,0,16,0V48h80v8a8,8,0,0,0,16,0V48h24V80H48V48ZM208,208H48V96H208V208Zm-68-76a12,12,0,1,1-12-12A12,12,0,0,1,140,132Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,132ZM96,172a12,12,0,1,1-12-12A12,12,0,0,1,96,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,140,172Zm44,0a12,12,0,1,1-12-12A12,12,0,0,1,184,172Z"></path>
          </svg>
          Agendamentos
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 stroke-gray-900 dark:stroke-white ml-auto lucide lucide-lock-keyhole">
            <circle cx="12" cy="16" r="1"/><rect x="3" y="10" width="18" height="12" rx="2"/><path d="M7 10V7a5 5 0 0 1 10 0v3"/>
          </svg>
        </button>
      </li>
      <!-- Menu Item: Financeiro -->
      <li>
        <button type="button" title="Em breve" disabled class="w-full flex items-center text-start p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-5 w-5 fill-gray-900 dark:fill-white mr-2">
            <path d="M230.33,141.06a24.43,24.43,0,0,0-21.24-4.23l-41.84,9.62A28,28,0,0,0,140,112H89.94a31.82,31.82,0,0,0-22.63,9.37L44.69,144H16A16,16,0,0,0,0,160v40a16,16,0,0,0,16,16H120a7.93,7.93,0,0,0,1.94-.24l64-16a6.94,6.94,0,0,0,1.19-.4L226,182.82l.44-.2a24.6,24.6,0,0,0,3.93-41.56ZM16,160H40v40H16Zm203.43,8.21-38,16.18L119,200H56V155.31l22.63-22.62A15.86,15.86,0,0,1,89.94,128H140a12,12,0,0,1,0,24H112a8,8,0,0,0,0,16h32a8.32,8.32,0,0,0,1.79-.2l67-15.41.31-.08a8.6,8.6,0,0,1,6.3,15.9ZM164,96a36,36,0,0,0,5.9-.48,36,36,0,1,0,28.22-47A36,36,0,1,0,164,96Zm60-12a20,20,0,1,1-20-20A20,20,0,0,1,224,84ZM164,40a20,20,0,0,1,19.25,14.61,36,36,0,0,0-15,24.93A20.42,20.42,0,0,1,164,80a20,20,0,0,1,0-40Z"></path>
          </svg>
          Financeiro
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 stroke-gray-900 dark:stroke-white ml-auto lucide lucide-lock-keyhole">
            <circle cx="12" cy="16" r="1"/><rect x="3" y="10" width="18" height="12" rx="2"/><path d="M7 10V7a5 5 0 0 1 10 0v3"/>
          </svg>
        </button>
      </li>
    </ul>
  </div>
</div>
