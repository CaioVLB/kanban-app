<!-- Modal content -->
<div class="relative bg-white dark:bg-gray-700">
    <!-- Modal header -->
    <div class="flex items-center justify-between px-4 py-3 border-b dark:border-gray-600">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Cadastrar Cliente
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
                <label for="name-client" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome do Cliente</label>
                <input type="text" name="name-client" id="name-client" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-purple-400 focus:border-purple-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="Nome do seu cliente" required="">
            </div>
            <div class="col-span-2" x-data>
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                <input type="text" name="telephone" id="telephone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-purple-400 focus:border-purple-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="(XX) XXXX-XXXX" x-mask="(99) 99999-9999" required="">
            </div>
            <div class="col-span-2" x-data>
                <div class="col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-purple-400 focus:border-purple-200 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-purple-400 dark:focus:border-purple-800" placeholder="exemplo@exemplo.com" required="">
                </div>
            </div>
        </div>
        <button type="submit" class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-purple-600 focus:outline-none bg-purple-100 rounded-lg border border-purple-200 hover:bg-purple-200 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-purple-600 dark:text-purple-200 dark:border-gray-800 dark:hover:text-white dark:hover:bg-purple-700">
            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
            Criar Novo Cliente
        </button>
    </form>
</div>