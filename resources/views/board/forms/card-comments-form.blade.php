<div class="w-full my-2">
  <div class="flex flex-col gap-y-2">
    <div class="flex items-center gap-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-message-square-text dark:stroke-white">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/><path d="M13 8H7"/><path d="M17 12H7"/>
      </svg>
      <span class="text-lg font-semibold text-gray-900 dark:text-white">Comentários</span>
    </div>
    <form class="flex gap-2" @submit.prevent="saveComment()">
      <input x-model="form.comment" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Escrever um comentário...">
      <div title="Salvar comentário">
        <button type="submit" class="bg-green-600 border-green-700 hover:bg-green-700 hover:border-green-800 text-white rounded-full shadow p-2 focus:outline-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send-horizontal dark:stroke-white">
            <path d="M3.714 3.048a.498.498 0 0 0-.683.627l2.843 7.627a2 2 0 0 1 0 1.396l-2.842 7.627a.498.498 0 0 0 .682.627l18-8.5a.5.5 0 0 0 0-.904z"/><path d="M6 12h16"/>
          </svg>
        </button>
      </div>
    </form>
  </div>
</div>
