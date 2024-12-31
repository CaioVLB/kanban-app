<div x-data="collaborator_files()" class="w-full lg:col-span-2 col-span-full flex flex-col items-start bg-white shadow rounded-lg p-4 dark:bg-gray-800">
  <div class="w-full flex justify-between">
    <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
           class="h-6 w-6 fill-gray-900 dark:fill-white mr-2" viewBox="0 0 256 256">
        <path
          d="M214.61,198.62a32,32,0,1,0-45.23,0,40,40,0,0,0-17.11,23.32,8,8,0,0,0,5.67,9.79A8.15,8.15,0,0,0,160,232a8,8,0,0,0,7.73-5.95C170.56,215.42,180.54,208,192,208s21.44,7.42,24.27,18.05a8,8,0,1,0,15.46-4.11A40,40,0,0,0,214.61,198.62ZM192,160a16,16,0,1,1-16,16A16,16,0,0,1,192,160Zm40-72v32a8,8,0,0,1-16,0V88H130.67a16.12,16.12,0,0,1-9.6-3.2L93.33,64H40V200h80a8,8,0,0,1,0,16H40a16,16,0,0,1-16-16V64A16,16,0,0,1,40,48H93.33a16.12,16.12,0,0,1,9.6,3.2L130.67,72H216A16,16,0,0,1,232,88Z"></path>
      </svg>
      <h2 class="text-xl font-bold text-gray-900 dark:text-white">Arquivos do Colaborador</h2>
    </div>
    @if(count($files) > 0)
      <div class="flex items-center">
        <x-button-modal onclick="openModalUploadFile()"
                        class="inline-flex items-center py-2 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700 cursor-pointer">
          <svg class="w-5 h-5 me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
               stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z"/>
          </svg>
          Novo Arquivo
        </x-button-modal>
      </div>
    @endif
  </div>
  <div class="w-full flex flex-col max-h-[460px] max-h-[460px]:overflow-scroll scroll-smooth gap-y-0.5 mt-2 p-1">
    @forelse($files as $file)
      <div x-data="{ isLoading: false }" class="grid grid-cols-6 h-auto max-h-[90px] box-border p-1.5 mt-1.5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="grid grid-cols-5 col-span-5 gap-4 py-1 p-2">
          <div class="flex flex-col col-span-2">
            <label class="text-start text-sm text-gray-600 dark:text-gray-400">Descrição</label>
            <span class="text-start text-sm text-gray-900 font-bold truncate dark:text-white" title="{{ $file->content }}">{{ $file->content }}</span>
          </div>
          <div class="flex flex-col col-span-2">
            <label class="text-start text-sm text-gray-600 dark:text-gray-400">Nome do Arquivo</label>
            <span class="text-start text-sm text-gray-900 font-bold truncate dark:text-white" title="{{ $file->original_name }}">{{ $file->original_name }}</span>
          </div>
          <div class="flex flex-col col-span-1 relative group">
            <label class="text-start text-sm text-gray-600 dark:text-gray-400">Detalhes</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 stroke-gray-900 dark:stroke-white lucide lucide-folder-clock">
              <circle cx="16" cy="16" r="6"/><path d="M7 20H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h3.9a2 2 0 0 1 1.69.9l.81 1.2a2 2 0 0 0 1.67.9H20a2 2 0 0 1 2 2"/><path d="M16 14v2l1 1"/>
            </svg>
            <!-- Tooltip -->
            <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-64 p-2 bg-gray-600 text-white text-xs rounded shadow-lg hidden group-hover:block z-50">
              Arquivo carregado por <b>{{ $file->createdBy->name }}</b> na data {{ $file->created_at }}
            </div>
          </div>
        </div>
        <div class="flex col-span-1 gap-2 py-1">
          <x-button-modal onclick="openModalViewFile({{ $file->id }}, '{{ $file->original_name }}', '{{$file->content}}')" :title="'Visualizar imagem'" class="flex items-center justify-center p-2 bg-blue-200 rounded-lg border border-blue-300 hover:bg-blue-300 hover:border-blue-400 dark:bg-blue-600 dark:border-blue-700 dark:hover:bg-blue-700 dark:hover:border-blue-800">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-5 w-5 fill-blue-400 dark:fill-blue-200 dark:hover:fill-blue-300">
              <path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path>
            </svg>
          </x-button-modal>
          <a type="button" href="{{ route('collaborator.files.download', $file->id) }}" title="Baixar arquivo" class="flex items-center justify-center p-2 bg-green-200 rounded-lg text-green-600 border border-green-300 hover:bg-green-300 hover:text-green-700 dark:bg-green-600 dark:text-green-200 dark:border-green-700 dark:hover:text-white dark:hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 lucide lucide-image-down">
              <path d="M10.3 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10l-3.1-3.1a2 2 0 0 0-2.814.014L6 21"/><path d="m14 19 3 3v-5.5"/><path d="m17 22 3-3"/><circle cx="9" cy="9" r="2"/>
            </svg>
          </a>
          <x-danger-button onclick="openModalDeleteFile({{ $file->id }}, '{{ $file->original_name }}')" :title="'Excluir arquivo'" class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
              <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
            </svg>
          </x-danger-button>
        </div>
      </div>
    @empty
      <div class="md:flex">
        <div class="w-full">
          <img src="{{ asset("images/vetores/upload-file.png")}}" data-retina="true"
               alt="Imagem que retrata uma mulher subindo arquivos para o sistema"
               class="max-w-full h-[200px] mx-auto opacity-60">
        </div>
        <div class="p-3 mx-0 mt-2">
          <p class="py-1 px-1 mb-6 text-start text-gray-600 dark:text-gray-100">Até o momento, este colaborador não possui
            arquivos carregados. Sinta-se à vontade para adicionar quando necessário.</p>
          <div class="flex justify-center items-center">
            <x-button-modal onclick="openModalUploadFile()"
                            class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700 cursor-pointer">
              <svg class="w-5 h-5 me-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z"/>
              </svg>
              Carregar Primeiro Arquivo
            </x-button-modal>
          </div>
        </div>
      </div>
    @endforelse
  </div>
  @include('collaborator.snippets.dashboard.collaborator-files.files-modal', ['show' => true])
  @include('collaborator.snippets.dashboard.collaborator-files.view-file-modal', ['show' => true])
  @include('collaborator.snippets.dashboard.collaborator-files.delete-file-modal', ['show' => true])
</div>
