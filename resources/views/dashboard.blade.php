<x-app-layout>
    <div class="py-12">
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
                <a href="#" class="w-full md:h-[122px] h-[90px] flex flex-col justify-between py-2 px-4 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <span class="w-full max-h-[80px] inline-block overflow-scroll overflow-x-hidden scroll-smooth break-words font-bold dark:text-white">Planejamento de Desenvolvimento de Software Para Gestão de Processos</span>
                    <div class="w-full flex justify-end gap-4">
                        <div class="flex justify-center items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000" class="dark:fill-white" viewBox="0 0 256 256">
                                <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">10</span>
                        </div>
                        <div class="flex justify-center items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FF0000" class="dark:fill-red-600" viewBox="0 0 256 256">
                                <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                            </svg>
                            <span class="font-normal dark:text-white">6</span>
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
                        <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-400 focus:border-purple-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="Nome do seu quadro" required="">
                    </div>
                    <div class="col-span-2">
                        <label for="name-board" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visibilidade</label>
                        <select id="name-board" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-purple-400 focus:border-purple-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800">
                            <option selected="" class="">Selecione a Visibilidade do seu Quadro</option>
                            <option value="TV">TV/Monitors</option>
                            <option value="PC">PC</option>
                            <option value="GA">Gaming/Console</option>
                            <option value="PH">Phones</option>
                        </select>
                    </div>
                    <div class="col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descrição Sobre o Quadro</label>
                        <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-purple-400 focus:border-purple-200 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="Escreva a descrição do seu quadro aqui"></textarea>
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
