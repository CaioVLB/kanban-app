<x-app-layout>
    <div class="py-12">
        <div x-data="{ clientesCount: 50, altaCount: 10, mediaCount: 20, baixaCount: 30 }" class="max-w-7xl grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 mx-auto px-4 pb-4">
            <!-- Card Clientes -->
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex flex-col items-start">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-6 w-6 fill-gray-900 dark:fill-white mr-2" viewBox="0 0 256 256">
                        <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                    </svg>
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Clientes</h2>
                </div>
                <p class="mt-2 text-gray-600 dark:text-gray-300">Gerencie seus clientes e visualize suas informações.</p>
                <div class="w-full flex justify-end mt-1 text-2xl font-bold text-gray-900 dark:text-white" x-text="clientesCount">0</div>
            </div>

            <!-- Card Prioridade Alta -->
            <div class="bg-red-100 dark:bg-red-600 shadow rounded-lg p-4 flex flex-col items-start">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#A30E0E" class="h-6 w-6 mr-2 dark:fill-red-100" viewBox="0 0 256 256">
                        <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                    </svg>
                    <h2 class="text-xl font-bold text-red-700 dark:text-red-100">Prioridade Alta</h2>
                </div>
                <p class="mt-2 text-red-600 dark:text-red-200">Tarefas que requerem atenção imediata.</p>
                <div class="w-full flex justify-end mt-1 text-2xl font-bold text-red-700 dark:text-red-100" x-text="altaCount">0</div>
            </div>

            <!-- Card Prioridade Média -->
            <div class="bg-yellow-100 dark:bg-yellow-600 shadow rounded-lg p-4 flex flex-col items-start">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-6 w-6 fill-yellow-700 dark:fill-yellow-100 mr-2" viewBox="0 0 256 256">
                        <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
                    </svg>
                    <h2 class="text-xl font-bold text-yellow-700 dark:text-yellow-100">Prioridade Média</h2>
                </div>
                <p class="mt-2 text-yellow-600 dark:text-yellow-200">Tarefas que devem ser tratadas em breve.</p>
                <div class="w-full flex justify-end mt-1 text-2xl font-bold text-yellow-700 dark:text-yellow-100" x-text="mediaCount">0</div>
            </div>

            <!-- Card Prioridade Baixa -->
            <div class="bg-green-100 dark:bg-green-600 shadow rounded-lg p-4 flex flex-col items-start">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-6 w-6 text-green-700 dark:text-green-100 mr-2" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                    </svg>
                    <h2 class="text-xl font-bold text-green-700 dark:text-green-100">Prioridade Baixa</h2>
                </div>
                <p class="mt-2 text-green-600 dark:text-green-200">Tarefas que podem ser tratadas depois.</p>
                <div class="w-full flex justify-end mt-1 text-2xl font-bold text-green-700 dark:text-green-100" x-text="baixaCount">0</div>
            </div>
        </div>
        <div>
            <h1 class="max-w-7xl mx-auto px-4 mb-2 font-bold text-gray-500 dark:text-white">Gerenciador de Processos</h1>
        </div>
        <div class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-2 md:gap-y-0 gap-y-0.5">
            <div class="xl:w-[20%] lg:w-[25%] md:w-[33.3333%] w-full relative group box-border py-1 px-2">
                <x-button-modal modal_id="create-board" class="w-full md:h-[122px] h-[90px] flex flex-col justify-center items-center bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="dark:fill-white" viewBox="0 0 256 256">
                        <path d="M216,48H40a8,8,0,0,0-8,8V208a16,16,0,0,0,16,16H88a16,16,0,0,0,16-16V160h48v16a16,16,0,0,0,16,16h40a16,16,0,0,0,16-16V56A8,8,0,0,0,216,48ZM88,208H48V128H88Zm0-96H48V64H88Zm64,32H104V64h48Zm56,32H168V128h40Zm0-64H168V64h40Z"></path>
                    </svg>
                    <span class="font-normal dark:text-white">Criar Novo Quadro</span>
                </x-button-modal>
            </div>

            <div class="xl:w-[20%] lg:w-[25%] md:w-[33.3333%] w-full relative group box-border py-1 px-2">
                <a href="{{ route('board') }}" class="w-full md:h-[122px] h-[90px] flex flex-col justify-between py-2 px-4 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <span class="w-full max-h-[80px] inline-block overflow-scroll overflow-y-auto overflow-x-hidden scroll-smooth break-words font-bold dark:text-white">Planejamento de Desenvolvimento de Software Para Gestão de Processos</span>
                    <div class="w-full flex justify-end gap-2">
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000" class="dark:fill-white" viewBox="0 0 256 256">
                                <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">18</span>
                        </div>
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FF0000" class="dark:fill-red-600" viewBox="0 0 256 256">
                                <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">6</span>
                        </div>
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000" class="fill-yellow-700 dark:fill-yellow-100" viewBox="0 0 256 256">
                                <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">6</span>
                        </div>
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" class="text-green-700 dark:text-green-100" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                            </svg>
                            <span class="font-normal dark:text-white">6</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="xl:w-[20%] lg:w-[25%] md:w-[33.3333%] w-full relative group box-border py-1 px-2">
                <a href="#" class="w-full md:h-[122px] h-[90px] flex flex-col justify-between py-2 px-4 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <span class="w-full max-h-[80px] inline-block overflow-scroll overflow-y-auto overflow-x-hidden scroll-smooth break-words font-bold dark:text-white">Planejamento do Backlog Para a Sprint</span>
                    <div class="w-full flex justify-end gap-2">
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000" class="dark:fill-white" viewBox="0 0 256 256">
                                <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">16</span>
                        </div>
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FF0000" class="dark:fill-red-600" viewBox="0 0 256 256">
                                <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">8</span>
                        </div>
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" class="text-green-700 dark:text-green-100" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25 12 21m0 0-3.75-3.75M12 21V3" />
                            </svg>
                            <span class="font-normal dark:text-white">8</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="xl:w-[20%] lg:w-[25%] md:w-[33.3333%] w-full relative group box-border py-1 px-2">
                <a href="#" class="w-full md:h-[122px] h-[90px] flex flex-col justify-between py-2 px-4 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <span class="w-full max-h-[80px] inline-block overflow-scroll overflow-y-auto overflow-x-hidden scroll-smooth break-words font-bold dark:text-white">Planejamento das Novas Funcionalidades</span>
                    <div class="w-full flex justify-end gap-2">
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000" class="dark:fill-white" viewBox="0 0 256 256">
                                <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">4</span>
                        </div>
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FF0000" class="dark:fill-red-600" viewBox="0 0 256 256">
                                <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">2</span>
                        </div>
                        <div class="inline-flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000" class="fill-yellow-700 dark:fill-yellow-100" viewBox="0 0 256 256">
                                <path d="M236.8,188.09,149.35,36.22h0a24.76,24.76,0,0,0-42.7,0L19.2,188.09a23.51,23.51,0,0,0,0,23.72A24.35,24.35,0,0,0,40.55,224h174.9a24.35,24.35,0,0,0,21.33-12.19A23.51,23.51,0,0,0,236.8,188.09ZM222.93,203.8a8.5,8.5,0,0,1-7.48,4.2H40.55a8.5,8.5,0,0,1-7.48-4.2,7.59,7.59,0,0,1,0-7.72L120.52,44.21a8.75,8.75,0,0,1,15,0l87.45,151.87A7.59,7.59,0,0,1,222.93,203.8ZM120,144V104a8,8,0,0,1,16,0v40a8,8,0,0,1-16,0Zm20,36a12,12,0,1,1-12-12A12,12,0,0,1,140,180Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">2</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    {{-- Modal para cadastro de novo quadro   --}}
    <x-modal name="create-board" :show="false" maxWidth="sm">
        <!-- Modal content -->
        <div class="relative bg-white dark:bg-gray-700">
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
            <form class="p-4 md:p-5">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Título do Quadro</label>
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-purple-400 focus:border-purple-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="Nome do seu quadro" required="">
                    </div>
                    <div class="col-span-2">
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
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-md shadow-sm border border-gray-300 focus:ring-purple-400 focus:border-purple-200 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="Escreva a descrição sobre o quadro aqui"></textarea>
                    </div>
                </div>
                <button type="submit" class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-purple-600 focus:outline-none bg-purple-100 rounded-lg border border-purple-200 hover:bg-purple-200 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-purple-600 dark:text-purple-200 dark:border-gray-800 dark:hover:text-white dark:hover:bg-purple-700">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Criar Novo Quadro
                </button>
            </form>
        </div>
    </x-modal>
</x-app-layout>
