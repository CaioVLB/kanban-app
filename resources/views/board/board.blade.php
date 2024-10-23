@push('styles')
  <link rel="stylesheet" href="{{ asset('css/board.css') }}">
@endpush

<x-app-layout>
  <div class="max-h-content flex gap-4 p-4 overflow-hidden" x-data="{ openSpaceBoardList: true }">
    @include('board.snippets.board-list')

    <section x-data="kanban_board()" class="relative flex-grow flex flex-col min-w-max bg-white/50 shadow rounded-lg dark:bg-gray-800">
      <header class="w-full shadow py-2 px-6">
        <h1 class="h-5 text-lg font-bold dark:text-white">Kanban Quadro Mensina</h1>
        <small class="w-1/2 truncate dark:text-white">Descrição do quadro</small>
      </header>
      <div class="relative flex flex-grow gap-2">
        <ol class="absolute flex flex-row overflow-x-auto overflow-y-hidden list-none select-none whitespace-nowrap p-2 mb-2 inset-0 scroll-smooth" x-ref="boardContainer">
          <template x-for="(column, columnIndex) in columns" :key="column.id">
            <li class="column block shrink-0 p-2 h-full w-[300px] whitespace-nowrap">
              <section class="max-h-full relative flex flex-col justify-between align-top box-border bg-black/25 rounded shadow whitespace-normal pb-2 dark:bg-gray-700">
                <header class="w-full flex justify-between gap-2 p-3">
                  <span class="w-full text-sm font-bold text-gray-900 truncate dark:text-white" x-bind:title="column.name" x-text="column.name"></span>
                  <button type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-ellipsis w-4 h-4 dark:stroke-white"><circle cx="12" cy="12" r="1"/><circle cx="19" cy="12" r="1"/><circle cx="5" cy="12" r="1"/></svg>
                  </button>
                </header>
                <ol class="column-body flex flex-col overflow-x-hidden overflow-y-auto list-none gap-y-1 mx-[2px] px-1 py-3">
                  <template x-for="(card, index) in column.cards" :key="card.id">
                    <li class="card" draggable="true">
                      <div @click="$dispatch('open-card', card)" class="min-h-9 rounded bg-white border border-gray-400 shadow cursor-pointer p-2 hover:bg-gray-100 hover:border-2 dark:bg-white/25 dark:border-gray-400 dark:hover:bg-white/50">
                        <span class="max-h-[80px] inline-block overflow-y-auto overflow-scroll overflow-x-hidden scroll-smooth break-words text-sm font-medium mb-1 px-1" x-text="card.title"></span>
                        <div class="flex justify-between gap-2">
                          <div class="max-w-[249px] w-full inline-flex items-center justify-start overflow-x-auto gap-1.5">
                            <span title="Cartão com prioridade alta">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="#FF0000" class="h-5 w-5 dark:fill-red-600" viewBox="0 0 256 256">
                                    <path d="M183.89,153.34a57.6,57.6,0,0,1-46.56,46.55A8.75,8.75,0,0,1,136,200a8,8,0,0,1-1.32-15.89c16.57-2.79,30.63-16.85,33.44-33.45a8,8,0,0,1,15.78,2.68ZM216,144a88,88,0,0,1-176,0c0-27.92,11-56.47,32.66-84.85a8,8,0,0,1,11.93-.89l24.12,23.41,22-60.41a8,8,0,0,1,12.63-3.41C165.21,36,216,84.55,216,144Zm-16,0c0-46.09-35.79-85.92-58.21-106.33L119.52,98.74a8,8,0,0,1-13.09,3L80.06,76.16C64.09,99.21,56,122,56,144a72,72,0,0,0,144,0Z"></path>
                                </svg>
                            </span>
                            <span class="inline-flex items-center gap-1" title="Itens da Checklist">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-square-check-big"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"/><path d="m9 11 3 3L22 4"/></svg>
                                      <span class="text-xs font-bold">4/4</span>
                                  </span>
                            <span class="inline-flex items-center gap-1" title="20/09/2024 às 18:30h">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                      </svg>
                                      <span class="text-xs font-bold">20/09</span>
                                  </span>
                            <span title="6 comentários">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square-text">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M13 8H7"/><path d="M17 12H7"/>
                                      </svg>
                                  </span>
                            <span title="Este cartão tem uma descrição.">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                                      </svg>
                                  </span>
                            <span title="4 anexos">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                      </svg>
                                  </span>
                          </div>
                          <div>
                                  <span title="Caio Vitor Lima Brito">
                                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                          <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                  </span>
                          </div>
                        </div>
                      </div>
                    </li>
                  </template>
                </ol>
                <footer class="pt-3 px-2 pb-1">
                  <button @click="column.addCard = !column.addCard" type="button" class="w-full inline-flex items-center justify-center bg-white/25 rounded-lg gap-2 p-1 font-medium hover:bg-white/75 hover:shadow dark:text-white dark:bg-gray-700 dark:shadow dark:hover:bg-white/25" :class=" column.addCard ? 'hidden' : 'block'">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                    </svg>
                    Adicionar um cartão
                  </button>
                  <div class="w-full bg-black/25 border-gray-600 rounded shadow p-4" :class=" column.addCard ? 'block' : 'hidden'">
                    <form @submit.prevent="createCard(columnIndex)">
                      @csrf
                      <input
                        type="text"
                        autocomplete="off"
                        aria-label="campo para nomear o cartão"
                        class="border border-gray-300 text-gray-900 text-sm rounded shadow-sm focus:ring-amber-400 focus:border-amber-200 w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
                        placeholder="Digite o nome do cartão..."
                        x-model="column.cardTitle"
                        required
                      >
                      <div class="flex items-center mt-2 gap-2">
                        <button type="submit"
                                class="w-full bg-amber-200 border-amber-300 font-semibold text-amber-600 hover:bg-amber-300 hover:border-gray-300 hover:text-amber-700 rounded-lg shadow gap-2 py-1.5 px-2 focus:outline-none dark:bg-amber-600 dark:text-amber-200 dark:hover:text-white dark:border-amber-700 dark:hover:bg-amber-700">
                          Criar cartão
                        </button>
                        <button @click="resetCardForm(columnIndex)"
                                type="button"
                                class="w-full bg-white/25 border-gray-300 font-semibold rounded-lg shadow gap-2 py-1.5 px-2 focus:outline-none hover:bg-white/75 dark:text-white dark:bg-gray-700 dark:hover:bg-white/25 dark:border-gray-700">
                          Cancelar
                        </button>
                      </div>
                    </form>
                  </div>
                </footer>
              </section>
            </li>
          </template>

          <div class="block shrink-0 p-2 h-full w-[300px] whitespace-nowrap">
            <div class="w-full relative group box-border" :class=" addColumn ? 'hidden' : 'block'">
              <button @click="addColumn = !addColumn" class="w-full flex justify-center items-center bg-amber-200 border-amber-300 text-amber-600 hover:bg-amber-300 hover:border-gray-300 hover:text-amber-700 rounded-lg shadow gap-2 p-2 focus:outline-none transition-transform duration-300 ease-in-out transform group-hover:scale-105 z-10 dark:bg-amber-600 dark:text-amber-200 dark:hover:text-white dark:border-amber-700 dark:hover:bg-amber-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5 dark:stroke-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                </svg>
                <span class="font-semibold dark:text-white" x-text="columns.length === 0 ? 'Criar primeira etapa' : 'Adicionar outra etapa'"></span>
              </button>
            </div>
            <div class="w-full bg-gray-300 border-gray-600 rounded shadow p-4 dark:bg-gray-700" :class=" addColumn ? 'block' : 'hidden'">
              <form @submit.prevent="createColumn()">
                @csrf
                <input
                  type="text"
                  autocomplete="off"
                  aria-label="campo para nomear a etapa"
                  class="border border-gray-300 text-gray-900 text-sm rounded shadow-sm focus:ring-amber-400 focus:border-amber-200 w-full p-2.5 dark:bg-gray-700 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
                  placeholder="Digite o nome da etapa..."
                  x-model="columnName"
                  required
                >
                <div class="flex items-center mt-2 gap-2">
                  <button type="submit"
                          class="w-full bg-amber-200 border-amber-300 font-semibold text-amber-600 hover:bg-amber-300 hover:border-gray-300 hover:text-amber-700 rounded-lg shadow gap-2 py-1.5 px-2 focus:outline-none dark:bg-amber-600 dark:text-amber-200 dark:hover:text-white dark:border-amber-700 dark:hover:bg-amber-700">
                    Criar etapa
                  </button>
                  <button @click="resetColumnForm"
                          type="button" class="w-full bg-white/25 border-gray-300 font-semibold rounded-lg shadow gap-2 py-1.5 px-2 focus:outline-none hover:bg-white/75 dark:text-white dark:bg-gray-700 dark:hover:bg-white/25 dark:border-gray-700">
                    Cancelar
                  </button>
                </div>
              </form>
            </div>
          </div>
        </ol>
      </div>
      <div x-data="edit_card()" @open-card.window="open($event.detail)" @save-card.window="updateCard($event.detail)">
        <template x-if="true">
          @include('board.snippets.card-modal')
        </template>
      </div>
    </section>
  </div>
</x-app-layout>
