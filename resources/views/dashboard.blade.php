<x-app-layout>
    <div class="py-12">
        <div class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-0">
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="w-[20%] relative group box-border py-1 px-2">
                <x-button-modal modal_id="create-board" class="w-full flex flex-col justify-center items-center p-8 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="dark:fill-white" viewBox="0 0 256 256">
                        <path d="M216,48H40a8,8,0,0,0-8,8V208a16,16,0,0,0,16,16H88a16,16,0,0,0,16-16V160h48v16a16,16,0,0,0,16,16h40a16,16,0,0,0,16-16V56A8,8,0,0,0,216,48ZM88,208H48V128H88Zm0-96H48V64H88Zm64,32H104V64h48Zm56,32H168V128h40Zm0-64H168V64h40Z"></path>
                    </svg>
                    <span class="font-normal dark:text-white">Criar Novo Quadro</span>
                </x-button-modal>
            </div>

            <div class="w-[20%] max-h-[80px] relative group box-border py-1 px-2">
                <a href="#" class="w-full flex flex-col justify-between py-2 px-4 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
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
</x-app-layout>
