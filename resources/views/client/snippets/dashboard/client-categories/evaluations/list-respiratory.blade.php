<div x-data="client_evaluations()" class="flex-grow">
  @if(count($respiratory) > 0)
    <div class="flex items-center justify-end">
      <x-button-modal onclick="openModalEvaluation('create', {{ $client->id }}, 'respiratory', 'respiratória')" class="inline-flex items-center py-2 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700 cursor-pointer">
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
        <div class="w-full grid grid-cols-6 gap-x-4 gap-y-1 lg:py-1 px-2">
          <div class="flex flex-col md:col-span-4 col-span-full">
            <label class="text-start text-sm text-gray-600 dark:text-gray-400">Avaliação</label>
            <span class="text-start text-sm text-gray-900 font-bold truncate dark:text-white" title="{{ $resp->evaluation_name }}">{{ $resp->evaluation_name }}</span>
          </div>
          <div class="flex flex-col md:col-span-2 col-span-full relative group">
            <label class="text-start text-sm text-gray-600 dark:text-gray-400">Detalhes</label>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-6 w-6 fill-gray-900 dark:fill-white">
              <path d="M136,72v43.05l36.42-18.21a8,8,0,0,1,7.16,14.31l-48,24A8,8,0,0,1,120,128V72a8,8,0,0,1,16,0Zm-8,144a88,88,0,1,1,88-88,8,8,0,0,0,16,0A104,104,0,1,0,128,232a8,8,0,0,0,0-16Zm103.73,5.94a8,8,0,1,1-15.46,4.11C213.44,215.42,203.46,208,192,208s-21.44,7.42-24.27,18.05A8,8,0,0,1,160,232a8.15,8.15,0,0,1-2.06-.27,8,8,0,0,1-5.67-9.79,40,40,0,0,1,17.11-23.32,32,32,0,1,1,45.23,0A40,40,0,0,1,231.73,221.94ZM176,176a16,16,0,1,0,16-16A16,16,0,0,0,176,176Z"></path>
            </svg>
            <!-- Tooltip -->
            <div class="absolute top-0 left-1/3 transform -translate-x-1/2 w-60 p-2 bg-gray-600 text-white text-xs rounded shadow-lg hidden group-hover:block z-50 cursor-default">
              Avaliação realizada na data <b>{{ $resp->date }}</b>.
              @if($resp->collaborator)
                Profissional responsável: <b>{{ $resp->collaborator->user->name }}</b>
              @endif
            </div>
          </div>
        </div>
        <div class="flex md:flex-row flex-col gap-2">
          <a href="{{ route('client.evaluation.evolutions', ['client_id' => $client->id, 'type' => $resp->type, 'evaluation_id' => $resp->id]) }}" title="Evolução do paciente"
             class="flex items-center justify-center p-2 bg-green-200 rounded-lg text-green-600 border border-green-300 hover:bg-green-300 hover:text-green-700 dark:bg-green-600 dark:text-green-100 dark:border-green-700 dark:hover:text-white dark:hover:bg-green-700">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 lucide lucide-file-clock">
              <path d="M16 22h2a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v3"/><path d="M14 2v4a2 2 0 0 0 2 2h4"/><circle cx="8" cy="16" r="6"/><path d="M9.5 17.5 8 16.25V14"/>
            </svg>
          </a>
          <x-button-modal onclick="openModalEvaluation('edit', {{ $client->id }}, '{{ $resp->type }}', 'respiratória', {{ $resp->id }}, '{{ $resp->evaluation_name }}')" class="flex items-center justify-center p-2 bg-amber-200 rounded-lg text-amber-600 border border-amber-400 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
              <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
            </svg>
          </x-button-modal>
          <x-danger-button onclick="openModalDeleteEvaluation({{ $resp->id }}, '{{ $resp->type }}', '{{ $resp->evaluation_name }}')" :title="'Excluir avaliação'" class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
              <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
            </svg>
          </x-danger-button>
        </div>
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
            <x-button-modal onclick="openModalEvaluation('create', {{ $client->id }}, 'respiratory', 'respiratória')" class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700 cursor-pointer">
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
  @include('client.snippets.dashboard.client-categories.evaluations.delete-evaluation-modal', ['show' => true])
</div>

