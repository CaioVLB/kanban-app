<div class="w-full">
  <div x-show="!isEditingTitle" class="flex gap-4">
    <span class="text-lg font-semibold text-gray-900 truncate dark:text-white" x-text="card.title"></span>
    <button @click="isEditingTitle = true" class="bg-gray-300 hover:bg-gray-400 text-white p-2 rounded-full dark:bg-gray-600 dark:hover:bg-gray-800">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
      </svg>
    </button>
  </div>
  <form x-show="isEditingTitle" class="flex gap-4" @submit.prevent="saveTitle()">
    <textarea x-model="card.title" @blur="isEditingTitle = false" class="w-full h-16 max-h-16 overflow-y-auto scroll-smooth bg-gray-50 border border-gray-300 text-gray-900 resize-none rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"></textarea>
    <div class="flex items-center justify-center">
      <button @click="isEditingTitle = false" class="bg-green-600 hover:bg-green-700 text-white p-2 rounded-full">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
        </svg>
      </button>
    </div>
  </form>
</div>
