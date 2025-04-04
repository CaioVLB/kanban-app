@section('scripts')
  <script>
    window.routes = {
      services: {
        create: "{{ route('services.store', ':id') }}",
        update: "{{ route('services.update', ':id') }}",
        delete: "{{ route('services.destroy', ':id') }}"
      }
    };
  </script>
@endsection

<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl flex items-center mx-auto mb-3 px-2 gap-4">
      <a href="{{ route('categories.index') }}"
         class="inline-flex items-center p-2.5 text-amber-600 focus:outline-none bg-amber-200 rounded-full border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="lucide lucide-arrow-big-left-dash">
          <path d="M19 15V9"/>
          <path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/>
        </svg>
      </a>
      <h1 class="font-bold text-gray-500 dark:text-white">Retornar à lista das especialidades</h1>
    </div>
    <div x-data="service({{ $category->id }})" class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-2">
      <div class="w-full flex justify-between flex-wrap items-center mb-4 px-2 gap-4">
        <h1 class="font-bold text-gray-500 dark:text-white">Serviços da Especialidade: {{ $category->name }}</h1>
        <x-button-modal onclick="openModalService('create')" class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <svg class="me-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
          </svg>
          Novo Serviço
        </x-button-modal>
      </div>
      @forelse($services as $service)
        <div class="w-full flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-4 mx-2 mb-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-8 w-8 mr-2 stroke-gray-900 dark:stroke-white lucide lucide-notebook-pen">
            <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4"/><path d="M2 6h4"/><path d="M2 10h4"/><path d="M2 14h4"/><path d="M2 18h4"/><path d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/>
          </svg>
          <div class="w-full grid md:grid-cols-4 grid-cols-1 gap-4 py-1 px-4">
            <div class="flex flex-col md:col-span-2 col-span-full">
              <label class="text-start text-gray-600 dark:text-gray-400">Serviço</label>
              <span class="text-start text-gray-900 font-bold dark:text-white truncate" :title="'{{ $service->name }}'">{{ $service->name }}</span>
            </div>
            <div class="flex flex-col md:col-span-1 col-span-full">
              <label class="text-start text-gray-600 dark:text-gray-400">Preço</label>
              <span class="text-start text-gray-900 font-bold dark:text-white truncate">
                {{ $service->price }}
              </span>
            </div>
            <div class="flex flex-col md:col-span-1 col-span-full">
              <label class="text-start text-gray-600 dark:text-gray-400">Disponível?</label>
              <label class="inline-flex items-center me-5 cursor-pointer">
                <input type="checkbox" class="sr-only peer" id="is_active_service_{{ $service->id }}" :disabled="isLoadingModifyStatus"
                       @change="modifyStatus({{ $service->id }}, {{ $service->is_active }})" {{ $service->is_active === 1 ? 'checked' : '' }}>
                <div class="relative w-11 h-6 mt-1 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400"></div>
              </label>
            </div>
          </div>
          <div class="flex md:flex-row flex-col gap-2">
            <x-button-modal onclick="openModalService('edit', {{ $service->id }}, '{{ $service->name }}', '{{ $service->price }}')" :title="'Editar serviço'" class="flex items-center justify-center p-2 bg-amber-200 rounded-lg text-amber-600 border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
              </svg>
            </x-button-modal>
            <x-danger-button onclick="openModalDeleteService({{ $service->id }}, '{{ $service->name }}')" :title="'Excluir serviço'" class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
                <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
              </svg>
            </x-danger-button>
          </div>
        </div>
      @empty
        <div class="w-full flex justify-center items-center border rounded-lg shadow bg-yellow-100 p-4 mx-2 gap-2 dark:border-yellow-800 dark:bg-yellow-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-yellow-700 dark:text-yellow-100 md:block hidden">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
          </svg>
          <span class="py-2 px-4 text-start text-yellow-700 dark:text-yellow-100">
            Até o momento, nenhum serviço foi cadastrado. Utilize o botão acima para cadastrar os serviços dessa especialidade.
          </span>
        </div>
      @endforelse

      @include('service.snippets.service-modal', ['show' => true])
      @include('service.snippets.delete-service-modal', ['show' => true])
    </div>
  </div>
</x-app-layout>
