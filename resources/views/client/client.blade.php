<x-app-layout>
    <div class="py-12">
        <div x-data="{ openModal: false, clients: [1] }" class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-2">
            <div class="w-full flex justify-between items-center mb-4 px-2">
                <h1 class="font-bold text-gray-500 dark:text-white">Gerenciador de Clientes</h1>
                <x-button-modal modal_id="create-client">
                    <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    Cadastrar Novo Cliente
                </x-button-modal>
            </div>
            <template x-if="clients.length === 1">
                <div class="w-full flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-4 mx-2 mb-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-8 w-8 fill-gray-700 dark:fill-white mr-2" viewBox="0 0 256 256">
                        <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                    </svg>
                    <div class="w-full grid grid-cols-3 gap-4 sm:grid-cols-2 lg:grid-cols-4 py-2 px-4">
                        <div class="flex flex-col">
                            <label class="text-start text-gray-600">Nome do Cliente</label>
                            <span class="text-start text-gray-900 font-bold dark:text-white">
                                Caio Vitor Lima Brito
                            </span>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-start text-gray-600">Telefone</label>
                            <span class="text-start text-gray-900 font-bold dark:text-white">
                                (69) 992348050
                            </span>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-start text-gray-600">Email</label>
                            <span class="text-start text-gray-900 font-bold dark:text-white">
                                caiovitor@exclusivebee.com.br
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('client-dashboard') }}" class="flex items-center justify-center p-2 bg-amber-200 rounded-lg text-amber-600 border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </a>
                </div>
            </template>
            <template x-if="clients.length === 1">
                <div class="w-full flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-4 mx-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-8 w-8 fill-gray-700 dark:fill-white mr-2" viewBox="0 0 256 256">
                        <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                    </svg>
                    <div class="w-full grid grid-cols-3 gap-4 sm:grid-cols-2 lg:grid-cols-4 py-2 px-4">
                        <div class="flex flex-col">
                            <label class="text-start text-gray-600">Nome do Cliente</label>
                            <span class="text-start text-gray-900 font-bold dark:text-white">
                                Anderson Krautheim
                            </span>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-start text-gray-600">Telefone</label>
                            <span class="text-start text-gray-900 font-bold dark:text-white">
                                (48) 991349442
                            </span>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-start text-gray-600">Email</label>
                            <span class="text-start text-gray-900 font-bold dark:text-white">
                                andersonkrautheim@exclusivebee.com.br
                            </span>
                        </div>
                    </div>
                    <a href="{{ route('client-dashboard') }}" class="flex items-center justify-center p-2 bg-amber-200 rounded-lg text-amber-600 border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </a>
                </div>
            </template>
            <template x-if="clients.length === 0">
                <div class="w-full flex justify-center items-center border rounded-lg shadow bg-yellow-100 p-4 mx-2 dark:border-yellow-800 dark:bg-yellow-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-yellow-700 dark:text-yellow-100 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                    <span class="py-2 px-4 text-start text-yellow-700 dark:text-yellow-100">
                        Até o momento, você não tem nenhum cliente cadastrado. Utilize o botão acima para adicionar novos clientes e começar a gerenciar suas informações.
                    </span>
                </div>
            </template>
        </div>
    </div>

    <template x-if="true">
		@include('client.snippets.client-modal')
	</template>

</x-app-layout>

{{-- <script>
    function setup() {
        return {
            openModal: false,
            clients: [],
            newClient: { name: '', email: '', phone: '' },
            addClient() {
                this.clients.push({ ...this.newClient, id: Date.now() });
                this.newClient = { name: '', email: '', phone: '' };
                this.openModal = false;
            }
        }
        console.log(clients)
    }
</script> --}}
