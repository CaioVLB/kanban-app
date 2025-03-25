<x-app-layout>
  <div class="py-12">
    <div x-data="collaborator({{ json_encode($collaborators) }}, {{ json_encode($papers) }})" class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-2">
      <div class="w-full flex justify-between items-center mb-4 px-2">
        <h1 class="font-bold text-gray-500 dark:text-white">Gestão dos Colaboradores</h1>
        <x-button-modal onclick="openModal()">
          <svg class="w-5 h-5 me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
          Novo Colaborador
        </x-button-modal>
      </div>
      <template x-for="collaborator in collaborators" :key="collaborator.id">
        <div class="w-full flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-4 mx-2 mb-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-8 w-8 fill-gray-700 dark:fill-white mr-2" viewBox="0 0 256 256">
            <path d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
          </svg>
          <div class="w-full grid gap-4 grid-cols-1 md:grid-cols-3 lg:grid-cols-3 lg:py-1 px-4">
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">Nome do Colaborador</label>
              <span class="text-start text-gray-900 font-bold truncate dark:text-white" :title="collaborator.name" x-text="collaborator.name"></span>
            </div>
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">CPF</label>
              <span class="text-start text-gray-900 font-bold truncate dark:text-white" :title="collaborator.cpf" x-text="collaborator.cpf"></span>
            </div>
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">Telefone</label>
              <span class="text-start text-gray-900 font-bold truncate dark:text-white" x-text="collaborator.phone_number"></span>
            </div>
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">E-mail</label>
              <span class="text-start text-gray-900 font-bold truncate dark:text-white" :title="collaborator.email" x-text="collaborator.email"></span>
            </div>
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">Cargo</label>
              <span class="text-start text-gray-900 font-bold truncate dark:text-white" :title="collaborator.paper" x-text="collaborator.paper"></span>
            </div>
            <div class="flex flex-col col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">Status</label>
              <span class="text-start text-gray-900 font-bold truncate dark:text-white" x-text="collaborator.active"></span>
            </div>
          </div>
          <a :href="'{{ route('collaborator.show', '') }}' + '/' + collaborator.id" class="flex items-center justify-center p-2 bg-amber-200 rounded-lg text-amber-600 border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
          </a>
        </div>
      </template>
      <template x-if="collaborators.length === 0">
        <div class="w-full flex justify-center items-center border rounded-lg shadow bg-yellow-100 p-4 mx-2 dark:border-yellow-800 dark:bg-yellow-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-yellow-700 dark:text-yellow-100 mr-3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
          </svg>
          <span class="py-2 px-4 text-start text-yellow-700 dark:text-yellow-100">
           Até o momento, você não tem nenhum colaborador cadastrado. Utilize o botão acima para adicionar novos colaboradores e começar a gerenciar suas informações.
          </span>
        </div>
      </template>
      @include('collaborator.snippets.collaborator-modal', ['show' => true])
      <template x-if="success || errors.error">
        <div x-show="success || errors.error"
             x-transition:enter="transform ease-out duration-300 transition"
             x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
             x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
             x-transition:leave="transform ease-in duration-100 transition"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed top-4 right-4 z-50 max-w-xs w-full border text-sm font-bold p-4 rounded-lg shadow-lg"
            :class="success ? 'bg-green-200 border-green-300 text-green-700' : 'bg-red-200 border-red-300 text-red-700'">
          <span x-text="success || errors.error"></span>
        </div>
      </template>
    </div>
  </div>
</x-app-layout>
