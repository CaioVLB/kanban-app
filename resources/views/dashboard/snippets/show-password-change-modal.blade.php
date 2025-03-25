<x-modal name="show-password-change-modal" :show="true" maxWidth="md">
  <!-- Modal content -->
  <div class="relative bg-white dark:bg-gray-700" x-data>
    <!-- Modal header -->
    <div class="flex items-center justify-between px-4 py-3 border-b dark:border-gray-600">
      <h3 class="text-lg font-semibold text-gray-900 dark:text-white truncate" title="{{ auth()->user()->name }}">
        {{ auth()->user()->name }}
      </h3>
      <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" x-on:click="show = false; modalClose = true">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
        <span class="sr-only">Close modal</span>
      </button>
    </div>
    <!-- Modal body -->
    <div x-data="{ isLoading: false }" class="flex flex-col items-center p-6">
      <h2 class="text-xl font-semibold truncate text-gray-900 dark:text-white mb-4">Alteração de Senha Necessária</h2>
      <p class="text-justify dark:text-white mb-6">Sua senha ainda é a padrão. Por favor, altere-a para continuar usando o sistema com segurança.</p>
      <div class="flex justify-center">
        <button
          :disabled="isLoading"
          @click="isLoading = true; setTimeout(() => window.location.href = '{{ route('profile.edit') }}', 100)"
          class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700"
        >
            <span x-show="isLoading" x-transition>
                <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
                </svg>
            </span>
          <span x-show="!isLoading">Alterar Senha</span>
        </button>
      </div>
    </div>
  </div>
</x-modal>
