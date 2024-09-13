<x-app-layout>
    <div class="max-h-content flex gap-4 p-4 overflow-hidden" x-data="{ openSpaceBoardList: true }">
        <aside class="flex flex-col bg-white shadow rounded-lg transition-width duration-500 overflow-y-auto overflow-x-hidden dark:bg-gray-800" :class="openSpaceBoardList ? 'w-64 p-4' : 'w-12 h-min px-1 py-2'">
            <div class="flex items-center justify-center">
                <button @click="openSpaceBoardList = !openSpaceBoardList">
                    <svg class="w-6 h-6 rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <!-- Ícone para minimizar -->
                        <polyline x-show="openSpaceBoardList" points="4 14 10 14 10 20"/>
                        <polyline x-show="openSpaceBoardList" points="20 10 14 10 14 4"/>
                        <line x-show="openSpaceBoardList" x1="14" x2="21" y1="10" y2="3"/>
                        <line x-show="openSpaceBoardList" x1="3" x2="10" y1="21" y2="14"/>
                        <!-- Ícone para maximizar -->
                        <polyline x-show="!openSpaceBoardList" points="15 3 21 3 21 9"/>
                        <polyline x-show="!openSpaceBoardList" points="9 21 3 21 3 15"/>
                        <line x-show="!openSpaceBoardList" x1="21" x2="14" y1="3" y2="10"/>
                        <line x-show="!openSpaceBoardList" x1="3" x2="10" y1="21" y2="14"/>
                    </svg>
                </button>
                <span class="w-full text-center font-bold" :class="{'hidden' : !openSpaceBoardList}">SEUS QUADROS</span>
            </div>
        </aside>

        <!-- Coluna para exibir os cards do quadro Kanban -->
        <section class="flex-grow flex flex-col bg-white shadow rounded-lg p-4 overflow-x-auto dark:bg-gray-800">
            <div class="min-w-max">
                coluna onde aparecerá os cards do quadro kanban
            </div>
        </section>
    </div>
</x-app-layout>