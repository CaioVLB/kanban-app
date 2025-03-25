@section('scripts')
  <script>
    window.routes = {
      evaluationList: {
        create: "{{ route('client.evaluations.evaluation', ['client_id' => ':id', 'type' => ':type']) }}",
        update: "{{ route('client.evaluations.updateEvaluationName', ['client_id' => ':client_id', 'evaluation_id' => ':evaluation_id', 'type' => ':type']) }}",
        delete: "{{ route('client.evaluations.destroy', ['evaluation_id' => ':id', 'type' => ':type']) }}",
      }
    };
  </script>
@endsection

<x-app-layout>
  <div class="pt-3 pb-12">
    <div class="max-w-7xl flex items-center mx-auto mb-3 px-2 gap-4">
      <a href="{{ route('clients.index') }}"
         class="inline-flex items-center p-2.5 text-amber-600 focus:outline-none bg-amber-200 rounded-full border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="lucide lucide-arrow-big-left-dash">
          <path d="M19 15V9"/>
          <path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/>
        </svg>
      </a>
      <h1 class="font-bold text-gray-500 dark:text-white">Retornar à lista dos pacientes</h1>
    </div>
    <div class="max-w-7xl grid grid-cols-1 xl:grid-cols-6 lg:grid-cols-6 md:grid-cols-1 mx-auto lg:gap-4 gap-y-4 px-4">
      <div class="col-span-4 flex flex-col gap-y-4">
        @include('client.snippets.dashboard.client-categories.list-menus')
        @include('client.snippets.dashboard.client-files.list-files')
      </div>
      <div class="col-span-2 flex flex-col gap-y-4">
        <div class="w-full flex flex-col items-start  bg-white shadow rounded-lg p-4 dark:bg-gray-800">
          <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000"
                 class="h-6 w-6 fill-gray-900 dark:fill-white mr-2" viewBox="0 0 256 256">
              <path
                d="M216,48H40a8,8,0,0,0-8,8V208a16,16,0,0,0,16,16H88a16,16,0,0,0,16-16V160h48v16a16,16,0,0,0,16,16h40a16,16,0,0,0,16-16V56A8,8,0,0,0,216,48ZM88,208H48V128H88Zm0-96H48V64H88Zm64,32H104V64h48Zm56,32H168V128h40Zm0-64H168V64h40Z"></path>
            </svg>
            <h2 class="text-xl font-bold text-gray-900 dark:text-white">Quadros Inseridos</h2>
          </div>
          <!--<div
            class="w-full flex flex-wrap max-h-[460px] max-h-[460px]:overflow-scroll scroll-smooth overflow-x-hidden gap-y-0.5 mt-2 px-0.5">
            <div class="w-full lg:w-full md:w-[50%] relative group box-border py-1 px-2">
              <a href="#"
                 class="w-full md:h-[122px] h-[90px] flex flex-col justify-between py-2 px-4 bg-white border border-gray-200 rounded-lg shadow transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <span
                  class="w-full max-h-[80px] inline-block overflow-scroll overflow-x-hidden scroll-smooth break-words font-bold dark:text-white">Planejamento de Desenvolvimento de Software Para Gestão de Processos</span>
                <div class="w-full flex justify-end gap-4">
                  <div class="flex justify-center items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#000000"
                         class="dark:fill-white" viewBox="0 0 256 256">
                      <path
                        d="M230.92,212c-15.23-26.33-38.7-45.21-66.09-54.16a72,72,0,1,0-73.66,0C63.78,166.78,40.31,185.66,25.08,212a8,8,0,1,0,13.85,8c18.84-32.56,52.14-52,89.07-52s70.23,19.44,89.07,52a8,8,0,1,0,13.85-8ZM72,96a56,56,0,1,1,56,56A56.06,56.06,0,0,1,72,96Z"></path>
                    </svg>
                    <span class="font-normal dark:text-white">10</span>
                  </div>
                  <div class="flex justify-center items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#FF0000"
                         class="dark:fill-red-600" viewBox="0 0 256 256">
                      <path
                        d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                    </svg>
                    <span class="font-normal dark:text-white">6</span>
                  </div>
                </div>
              </a>
            </div>
          </div>-->
          <div class="border rounded-lg shadow bg-yellow-100 p-3 mx-2 mt-2 dark:border-yellow-800 dark:bg-yellow-600">
            <p class="py-1 px-1 text-start text-yellow-700 dark:text-yellow-100">Até o momento, este paciente não está
              associado a nenhum quadro. Sinta-se à vontade para adicionar quando necessário.</p>
          </div>
        </div>
        @include('client.snippets.dashboard.client-notes.list-notes')
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
