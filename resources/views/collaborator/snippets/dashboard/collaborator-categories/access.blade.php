<div x-data="collaborator_access({{ $collaborator->user->is_active }})" class="flex-grow grid grid-cols-2 gap-x-5 gap-y-4">
  <div class="col-span-1">
    <h2 class="font-medium text-gray-500 dark:text-white mb-4">Alterar Senha de Acesso do Colaborador</h2>
    @include('collaborator.forms.dashboard.collaborator-categories.reset-password-form')
  </div>

  <div class="flex flex-col col-span-1 gap-4">
    <label class="text-start font-medium text-gray-500 dark:text-white">Colaborador Ativo?</label>
    <div class="flex flex-col gap-2">
      <label class="inline-flex items-center gap-3 cursor-pointer">
        <input type="checkbox" class="sr-only peer" id="is_active_collaborator_{{ $collaborator->user->id }}" :disabled="isLoadingModifyStatus"
               @change="modifyStatus({{ $collaborator->user->id }}, {{ $collaborator->user->is_active }})" {{ $collaborator->user->is_active === 1 ? 'checked' : '' }}>
        <div class="relative w-11 h-6 mt-1 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400"></div>
        <label x-show="!isLoadingModifyStatus" class="text-start text-sm font-bold text-gray-600 dark:text-gray-400" id="is_active_collaborator_label" x-text="isActiveCollaborator ? 'SIM' : 'NÃO'"></label>
        <span x-show="isLoadingModifyStatus" x-transition>
          <svg class="animate-spin h-6 w-6 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
          </svg>
        </span>
      </label>
      <label x-show="!isLoadingModifyStatus" class="text-start text-gray-600 dark:text-gray-400" x-text="paragraph"></label>
      <div x-show="isLoadingModifyStatus" x-transition role="status" class="mt-2 motion-reduce:animate-pulse">
        <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-500 mb-2.5"></div>
        <div class="h-2 w-48 bg-gray-200 rounded-full dark:bg-gray-500 mb-2.5"></div>
      </div>
    </div>
  </div>
</div>
