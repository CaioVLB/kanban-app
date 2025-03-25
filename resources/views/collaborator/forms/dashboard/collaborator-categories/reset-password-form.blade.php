<form method="POST" action="{{ route('collaborator.resetPassword', ['user_id' => $collaborator->user->id]) }}" @submit.prevent="isLoadingResetPassword = true; $el.submit()" class="flex flex-col gap-4">
  @csrf
  @method('PATCH')
  <div>
    <x-input-label for="password" :value="__('Password')" />
    <x-password-input :placeholder="'Defina a nova senha de acesso'"/>
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
  </div>
  <div>
    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
    <x-password-input id="password_confirmation" name="password_confirmation" :placeholder="'Confirme a nova senha de acesso'"/>
    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
  </div>
  <div class="flex justify-center items-center mt-2">
    <button type="submit"
            x-bind:disabled="isLoadingResetPassword"
            class="inline-flex justify-center gap-1 py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <span x-show="isLoadingResetPassword" x-transition>
          <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
          </svg>
        </span>
      <span x-show="!isLoadingResetPassword" class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 lucide lucide-key-round">
            <path d="M2.586 17.414A2 2 0 0 0 2 18.828V21a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h1a1 1 0 0 0 1-1v-1a1 1 0 0 1 1-1h.172a2 2 0 0 0 1.414-.586l.814-.814a6.5 6.5 0 1 0-4-4z"/><circle cx="16.5" cy="7.5" r=".5" fill="currentColor"/>
          </svg>
          <span>Alterar Senha</span>
        </span>
    </button>
  </div>
</form>
