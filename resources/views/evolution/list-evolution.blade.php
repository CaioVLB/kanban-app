<div x-data="evolution({{ $evaluation->id }})" class="max-w-7xl mx-auto gap-x-4 gap-y-2 w-full bg-white shadow rounded-lg p-6 mt-6 dark:text-gray-400 dark:bg-gray-800">
  <div class="w-full grid grid-cols-3 flex-wrap items-center mb-4 px-2 gap-4">
    <div class="col-span-1"></div>
    <h1 class="col-span-1 text-center font-bold text-gray-500 dark:text-white print:text-black print:dark:text-black">EVOLUÇÃO DO PACIENTE</h1>
    <div class="flex justify-end items-center md:col-span-1 col-span-full gap-4">
      <button type="button" @click="handleEvolutionPrint()" title="Imprimir avaliação" class="flex items-center justify-center p-1.5 bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 dark:bg-amber-600 dark:border-amber-700 dark:hover:bg-amber-700 print:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-6 w-6 fill-amber-600 dark:fill-amber-200">
          <path d="M214.67,72H200V40a8,8,0,0,0-8-8H64a8,8,0,0,0-8,8V72H41.33C27.36,72,16,82.77,16,96v80a8,8,0,0,0,8,8H56v32a8,8,0,0,0,8,8H192a8,8,0,0,0,8-8V184h32a8,8,0,0,0,8-8V96C240,82.77,228.64,72,214.67,72ZM72,48H184V72H72ZM184,208H72V160H184Zm40-40H200V152a8,8,0,0,0-8-8H64a8,8,0,0,0-8,8v16H32V96c0-4.41,4.19-8,9.33-8H214.67c5.14,0,9.33,3.59,9.33,8Zm-24-52a12,12,0,1,1-12-12A12,12,0,0,1,200,116Z"></path>
        </svg>
      </button>
      <x-button-modal onclick="openModalEvolution('create')" class="col-span-1 w-auto inline-flex justify-center items-center py-2 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <svg class="me-1 w-5 h-5 min-w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
        </svg>
        Nova Evolução
      </x-button-modal>
    </div>
  </div>
  @forelse($evolutions as $index => $evolution)
    <div class="flex justify-between h-auto box-border p-1.5 mt-2 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
      <div class="w-full grid grid-cols-5 gap-4 py-1 p-2">
        <div class="flex flex-col md:col-span-1 col-span-full">
          <label class="text-start text-sm text-gray-600 dark:text-gray-400">Data da Evolução</label>
          <span class="text-start text-sm text-gray-900 font-bold truncate dark:text-white">{{ $evolution->dateForPreview  }}</span>
        </div>
        <div class="flex flex-col md:col-span-2 col-span-full">
          <label class="text-start text-sm text-gray-600 dark:text-gray-400">Descrição do Caso</label>
          <span class="text-start text-sm text-gray-900 font-bold truncate dark:text-white" title="{{ $evolution->observations }}">{{ $evolution->observations }}</span>
        </div>
        <div class="flex flex-col md:col-span-2 col-span-full">
          <label class="text-start text-sm text-gray-600 dark:text-gray-400">Próximas Etapas</label>
          <span class="text-start text-sm text-gray-900 font-bold truncate dark:text-white" title="{{ $evolution->next_steps }}">{{ $evolution->next_steps ?? '---' }}</span>
        </div>
      </div>
      <div class="flex md:flex-row flex-col items-center justify-center gap-2 py-1">
        <button type="button" @click="detailsVisible[{{ $index }}] = !detailsVisible[{{ $index }}]" class="flex items-center justify-center p-2">
          <svg x-show="!detailsVisible[{{ $index }}]" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-gray-800 dark:fill-gray-200" viewBox="0 0 256 256">
            <path d="M205.66,149.66l-72,72a8,8,0,0,1-11.32,0l-72-72a8,8,0,0,1,11.32-11.32L120,196.69V40a8,8,0,0,1,16,0V196.69l58.34-58.35a8,8,0,0,1,11.32,11.32Z"></path>
          </svg>
          <svg x-show="detailsVisible[{{ $index }}]" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-gray-800 dark:fill-gray-200" viewBox="0 0 256 256">
            <path d="M205.66,117.66a8,8,0,0,1-11.32,0L136,59.31V216a8,8,0,0,1-16,0V59.31L61.66,117.66a8,8,0,0,1-11.32-11.32l72-72a8,8,0,0,1,11.32,0l72,72A8,8,0,0,1,205.66,117.66Z"></path>
          </svg>
        </button>
        <x-button-modal onclick="openModalEvolution('edit', {{ $evolution->id }}, '{{ $evolution->evolution_date }}', '{{ $evolution->observations }}', '{{ $evolution->next_steps }}')" :title="'Editar evolução'" class="flex items-center justify-center p-2 bg-amber-200 rounded-lg text-amber-600 border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
          </svg>
        </x-button-modal>
        <x-danger-button onclick="openModalDeleteEvolution({{ $evolution->id }})" :title="'Excluir evolução'" class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
            <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
          </svg>
        </x-danger-button>
      </div>
    </div>
    <div x-show="detailsVisible[{{ $index }}]" x-collapse id="evolution_print_{{ $index }}" class="mt-2 bg-gray-50 dark:bg-gray-700 p-4 rounded-lg border border-gray-300 dark:border-gray-800">
      <div class="w-full mb-2">
        <p class="text-sm text-gray-600 dark:text-gray-400">Data da Evolução</p>
        <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $evolution->dateForPreview  }}</p>
      </div>
      <div class="w-full mb-2">
        <p class="text-sm text-gray-600 dark:text-gray-400">Descrição do Caso</p>
        <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $evolution->observations }}</p>
      </div>
      <div class="w-full">
        <p class="text-sm text-gray-600 dark:text-gray-400">Próximas Etapas</p>
        <p class="text-sm font-bold text-gray-900 dark:text-white">{{ $evolution->next_steps ?? '---' }}</p>
      </div>
    </div>
  @empty
    <div class="flex justify-center items-center border rounded-lg shadow bg-yellow-100 p-4 mx-2 dark:border-yellow-800 dark:bg-yellow-600">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 min-w-6 text-yellow-700 dark:text-yellow-100">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
      </svg>
      <span class="py-2 px-4 text-start text-yellow-700 dark:text-yellow-100">
        Até o momento, o paciente não tem nenhuma evolução registrada para essa avaliação. Utilize o botão acima para adicionar novos pacientes e começar a gerenciar suas informações.
      </span>
    </div>
  @endforelse
  @include('evolution.snippets.evolution-modal', ['show' => true])
  @include('evolution.snippets.delete-evolution-modal', ['show' => true])
</div>
