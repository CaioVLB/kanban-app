<x-app-layout>
    <div class="max-h-content flex gap-4 p-4 overflow-hidden" x-data="{ openSpaceBoardList: true }">
        <aside class="flex flex-col bg-white shadow rounded-lg transition-width duration-500 overflow-hidden hover:overflow-y-auto gap-y-2 dark:bg-gray-800" :class="openSpaceBoardList ? 'w-64 p-4' : 'w-12 h-min px-1 py-2'">
            <header class="flex items-center justify-center" :class="openSpaceBoardList ? 'mb-2' : 'mb-0'">
                <button @click="openSpaceBoardList = !openSpaceBoardList">
                    <svg class="rotate-90 stroke-gray-600" width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <!-- Ícone para minimizar -->
                        <polyline x-show="openSpaceBoardList" points="4 14 10 14 10 20"/>
                        <polyline x-show="openSpaceBoardList" points="20 10 14 10 14 4"/>
                        <line x-show="openSpaceBoardList" x1="14" x2="21" y1="10" y2="3"/>
                        <line x-show="openSpaceBoardList" x1="3" x2="10" y1="21" y2="14"/>
                        <!-- Ícone para maximizar -->
                        <polyline x-show="!openSpaceBoardList" points="15 3 21 3 21 9"/>
                        <polyline x-show="!openSpaceBoardList" points="9 21 3 21 3 15"/>
                        <line x-show="!openSpaceBoardList" x1="21" x2="14" y1="3" y2="10"/>
                        <line x-show="!openSpaceBoardList" x1="3" x2="10" y1="21" y2="14"/>
                    </svg>
                </button>
                <span class="w-full text-center font-bold text-sm dark:text-white" :class="{'hidden' : !openSpaceBoardList}">SEUS QUADROS</span>
            </header>
            @foreach (range(date('Y')-20, date('Y')) as $key => $item)
            <div class="w-full md:h-[50px] h-[90px] flex flex-col justify-center items-start p-2 bg-white border border-gray-200 rounded-lg shadow cursor-pointer hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" :class="{'hidden' : !openSpaceBoardList}">
                <div class="w-full flex items-center justify-between gap-2">
                    <span class="w-full text-sm font-bold text-gray-900 truncate dark:text-white" title="Kanban Quadro Mensina">Kanban Quadro Mensina</span>
                    <div x-data="{ tooltip: false }" class="relative">
                        <svg @mouseenter="tooltip = true" @mouseleave="tooltip = false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis-vertical w-4 h-4 stroke-gray-600">
                            <circle cx="12" cy="12" r="1"/>
                            <circle cx="12" cy="5" r="1"/>
                            <circle cx="12" cy="19" r="1"/>
                        </svg>

                        <div x-show="tooltip" class="absolute z-20 right-full ml-2 top-0 w-48 bg-white shadow-lg rounded p-2" style="display: none;" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FF0000" class="h-5 w-5 dark:fill-red-600" viewBox="0 0 256 256">
                                    <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                                </svg>
                                <span>Prioridade Alta: 10</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-yellow-700 dark:fill-yellow-100" viewBox="0 0 256 256">
                                    <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
                                </svg>
                                <span>Prioridade Média: 15</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-5 w-5 text-green-700 dark:text-green-100" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                                </svg>
                                <span>Prioridade Baixa: 20</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </aside>

        <section class="flex-grow flex flex-col bg-white shadow rounded-lg overflow-x-auto dark:bg-gray-800">
            <div class="flex-grow flex flex-col min-w-max">
                <header class="w-full shadow py-4 px-6">
                    <h1 class="text-lg font-bold dark:text-white">Kanban Quadro Mensina</h1>
                </header>
                <section class="flex-grow p-4">
                    <div class="xl:w-[20%] lg:w-[25%] md:w-[33.3333%] w-full relative group box-border py-1 px-2">
                        <x-button-modal modal_id="create-board" class="w-full flex justify-center items-center bg-white border border-gray-200 rounded-lg shadow gap-2 py-3 px-2 transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 dark:stroke-white">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                            </svg>                            
                            <span class="font-normal dark:text-white">Criar primeira etapa</span>
                        </x-button-modal>
                    </div>
                </section>
            </div>
        </section>
    </div>
</x-app-layout>