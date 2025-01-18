<div x-data="client_evaluations()" class="flex-grow">
  @if(count($respiratory) > 0)
    <div class="flex items-center justify-end">
      <x-button-modal onclick="openModalEvaluation({{ $client->id }}, 'respiratory', 'respiratória')" class="inline-flex items-center py-2 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
             class="w-5 h-5 me-1 lucide lucide-notepad-text">
          <path d="M8 2v4"/><path d="M12 2v4"/><path d="M16 2v4"/><rect width="16" height="18" x="4" y="4" rx="2"/><path d="M8 10h6"/><path d="M8 14h8"/><path d="M8 18h5"/>
        </svg>
        Nova Avaliação
      </x-button-modal>
    </div>
  @endif
  <div class="flex flex-col max-h-[380px] max-h-[380px]:overflow-scroll scroll-smooth overflow-x-hidden gap-y-1.5 pe-2 mt-3">
    @forelse($respiratory as $resp)
      <div class="flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="w-full grid grid-cols-5 gap-x-4 gap-y-1 lg:py-1 px-2">
          <div class="flex flex-col md:col-span-3 col-span-full">
            <label class="text-start text-gray-600 dark:text-gray-400">Avaliação</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white" title="{{ $resp->evaluation_name }}">{{ $resp->evaluation_name }}</span>
          </div>
          <div class="flex flex-col md:col-span-2 col-span-full">
            <label class="text-start text-gray-600 dark:text-gray-400">Data</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white">{{ $resp->date }}</span>
          </div>
        </div>
        <x-danger-button :title="'Excluir avaliação'" class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
            <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
          </svg>
        </x-danger-button>
      </div>
    @empty
      <div class="w-full">
        <div class="w-full">
          <img src="{{ asset("images/vetores/evaluation.png")}}" data-retina="true"
               alt="Imagem que retrata uma ficha de atendimento"
               class="max-w-full h-[200px] mx-auto opacity-60">
        </div>
        <div class="p-3 mx-0 mt-2">
          <p class="py-1 px-1 mb-6 text-center text-gray-600 dark:text-gray-100">Aqui você poderá ver todas as avaliações de fisioterapia respiratória deste paciente.</p>
          <div class="flex justify-center items-center">
            <x-button-modal onclick="openModalEvaluation({{ $client->id }}, 'respiratory', 'respiratória')" class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700 cursor-pointer">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                   stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                   class="w-5 h-5 me-1 lucide lucide-notepad-text">
                <path d="M8 2v4"/><path d="M12 2v4"/><path d="M16 2v4"/><rect width="16" height="18" x="4" y="4" rx="2"/><path d="M8 10h6"/><path d="M8 14h8"/><path d="M8 18h5"/>
              </svg>
              Iniciar Primeira Avaliação
            </x-button-modal>
          </div>
        </div>
      </div>
    @endforelse
  </div>
  @include('client.snippets.dashboard.client-categories.evaluations.create-evaluation-modal', ['show' => true])
</div>

