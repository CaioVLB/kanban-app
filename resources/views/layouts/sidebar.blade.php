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
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-5 w-5 fill-gray-900 dark:fill-white mr-2" >
                        <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24ZM74.08,197.5a64,64,0,0,1,107.84,0,87.83,87.83,0,0,1-107.84,0ZM96,120a32,32,0,1,1,32,32A32,32,0,0,1,96,120Zm97.76,66.41a79.66,79.66,0,0,0-36.06-28.75,48,48,0,1,0-59.4,0,79.66,79.66,0,0,0-36.06,28.75,88,88,0,1,1,131.52,0Z"></path>
                    </svg> 
                    Perfil
                </a>
            </li>
            <!-- Menu Item: Clientes -->
            <li>
                <a href="{{ route('client') }}" class="w-full flex items-center p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-4 w-4 fill-gray-900 dark:fill-white mr-2" viewBox="0 0 256 256">
                        <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                    </svg>
                    Clientes
                </a>
            </li>
            <!-- Menu Item: Equipe -->
            <li class="relative group" x-data="{ openTeam : false }">
                <button @click="openTeam = !openTeam" class="w-full flex items-center p-2 text-gray-900 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-md transition duration-150 ease-in-out">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-gray-900 dark:fill-white mr-2" viewBox="0 0 256 256">
                        <path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path>
                    </svg>
                    Equipes
                    <svg :class="{'transform rotate-180': openTeam, 'transform rotate-0': !openTeam}" class="h-5 w-5 text-gray-900 dark:text-gray-200 ml-auto transition-transform duration-200 ease-in-out" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.292 7.293a1 1 0 0 1 1.415 0L10 10.586l3.293-3.293a1 1 0 1 1 1.415 1.414l-4 4a1 1 0 0 1-1.415 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <ul x-show="openTeam" x-cloak x-transition class="pl-6 mt-1 space-y-1">
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition duration-150 ease-in-out">
                            Gerenciar Colaboradores
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center p-2 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-100 dark:hover:bg-gray-700 rounded-md transition duration-150 ease-in-out">
                            Gerenciar Equipes
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
