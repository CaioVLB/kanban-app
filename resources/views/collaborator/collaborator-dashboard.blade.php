<x-app-layout>
  <div class="pt-3 pb-12">
    <div class="max-w-7xl w-full flex items-center ms-2 mb-3 px-2 gap-4">
      <a href="{{ route('collaborators.index') }}" class="inline-flex items-center p-2.5 text-amber-600 focus:outline-none bg-amber-200 rounded-full border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-big-left-dash">
          <path d="M19 15V9"/><path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/>
        </svg>
      </a>
      <h1 class="font-bold text-gray-500 dark:text-white">Retornar à lista de colaboradores</h1>
    </div>
    <div class="max-w-7xl grid grid-cols-1 xl:grid-cols-6 lg:grid-cols-6 md:grid-cols-1 mx-auto lg:gap-4 gap-y-4 px-4">
      <div class="col-span-6 flex flex-col gap-y-4">
        @include('collaborator.snippets.dashboard.collaborator_information.collaborator-information')
      </div>
      <div class="col-span-6">
        <div class="grid grid-cols-3 gap-x-3 gap-y-4">
          <div x-data="{ insertedFiles: [] }"
               class="lg:col-span-2 col-span-full flex flex-col items-start  bg-white shadow rounded-lg p-4 dark:bg-gray-800">
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                   class="h-6 w-6 fill-gray-900 dark:fill-white mr-2" viewBox="0 0 256 256">
                <path
                  d="M214.61,198.62a32,32,0,1,0-45.23,0,40,40,0,0,0-17.11,23.32,8,8,0,0,0,5.67,9.79A8.15,8.15,0,0,0,160,232a8,8,0,0,0,7.73-5.95C170.56,215.42,180.54,208,192,208s21.44,7.42,24.27,18.05a8,8,0,1,0,15.46-4.11A40,40,0,0,0,214.61,198.62ZM192,160a16,16,0,1,1-16,16A16,16,0,0,1,192,160Zm40-72v32a8,8,0,0,1-16,0V88H130.67a16.12,16.12,0,0,1-9.6-3.2L93.33,64H40V200h80a8,8,0,0,1,0,16H40a16,16,0,0,1-16-16V64A16,16,0,0,1,40,48H93.33a16.12,16.12,0,0,1,9.6,3.2L130.67,72H216A16,16,0,0,1,232,88Z"></path>
              </svg>
              <h2 class="text-xl font-bold text-gray-900 dark:text-white">Carregar Arquivos</h2>
            </div>
            <template x-if="insertedFiles.length === 0">
              <div class="md:flex">
                <div class="w-full">
                  <img src="{{ asset("images/vetores/upload-file.png")}}" data-retina="true"
                       alt="Imagem que retrata uma mulher carregando arquivos para o sistema"
                       class="max-w-full h-[200px] mx-auto opacity-60">
                </div>
                <div class="p-3 mx-0 mt-2">
                  <p class="py-1 px-1 mb-6 text-start text-gray-600 dark:text-gray-100">Até o momento, este colaborador
                    não possui arquivos carregados. Sinta-se à vontade para adicionar quando necessário.</p>
                  <div class="flex justify-center items-center">
                    <label for="file-upload"
                           class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700 cursor-pointer">
                      <svg class="w-5 h-5 me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                           stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z"/>
                      </svg>
                      Carregar Primeiro Arquivo
                    </label>
                    <input class="hidden" id="file-upload" type="file">
                  </div>
                </div>
              </div>
            </template>
          </div>
          @include('collaborator.snippets.dashboard.collaborator-notes.list-notes')
        </div>
      </div>
    </div>
    @if(session()->get('success') || $errors->first())
      <div x-data="{ show: true, init() { setTimeout(() => this.show = false, 4000) } }" x-show="show"
           x-transition:enter="transform ease-out duration-300 transition"
           x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
           x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
           x-transition:leave="transform ease-in duration-100 transition"
           x-transition:leave-start="opacity-100"
           x-transition:leave-end="opacity-0"
           class="fixed top-4 right-4 z-50 max-w-xs w-full {{ session()->get('success') ? 'bg-green-200 border-green-300 text-green-700' : 'bg-red-200 border-red-300 text-red-700' }} border text-sm font-bold p-4 rounded-lg shadow-lg">
        <span>{{ session()->get('success') ? session()->get('success') : $errors->first() }}</span>
      </div>
    @endif
  </div>
</x-app-layout>
