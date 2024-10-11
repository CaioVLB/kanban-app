<x-app-layout>
  <div class="py-12">
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
          <div
            class="lg:col-span-1 col-span-full bg-white dark:bg-gray-800 shadow rounded-lg p-4 flex flex-col items-start">
            <div class="flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                   stroke="currentColor" class="h-5 w-5 text-gray-900 dark:text-white mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"/>
              </svg>
              <h2 class="text-xl font-bold text-gray-900 dark:text-white">Anotações</h2>
            </div>
            <div class="mt-2 w-full">
              <form method="POST">
                @csrf
                <div class="flex">
                  <input type="text" name="annotation-collaborator" id="annotation-collaborator" autocomplete="off"
                         class="border border-gray-300 text-gray-900 text-sm rounded-s-md shadow-sm focus:ring-amber-400 focus:border-amber-200 w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
                         placeholder="Escreva anotações sobre o seu colaborador" required>
                  <button type="submit"
                          class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-e-lg border border-s-0 border-amber-300 hover:bg-amber-300 hover:text-amber-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                  </button>
                </div>
              </form>
              <div class="flex flex-col max-h-[460px] max-h-[460px]:overflow-scroll scroll-smooth overflow-x-hidden gap-y-0.5 mt-2">
                <form>
                  @csrf
                  <div class="w-full box-border h-[80px] flex gap-2 py-2 px-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <span class="w-full max-h-auto max-h-auto:overflow-scroll overflow-x-hidden scroll-smooth inline-block break-words font-bold dark:text-white">
                      Colaborador responsável pelo gerenciamento dos clientes
                    </span>
                    <x-danger-button class="flex items-center justify-center my-[10px] p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
                      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-6 w-6 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
                        <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
                      </svg>
                    </x-danger-button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
