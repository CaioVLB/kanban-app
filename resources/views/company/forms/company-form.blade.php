<div x-data="{ isLoading: false }" class="w-full mt-4 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
  <form method="POST" action="{{ isset($managerAndYourCompany) ? route('company.update', $managerAndYourCompany->id) : route('company.store') }}" @submit.prevent="isLoading = true; $el.submit()">
    @csrf
    @if(isset($managerAndYourCompany))
      @method('PUT')
    @endif
    <div class="grid grid-cols-6 gap-4">
      <!-- Company Name -->
      <div class="col-span-full md:col-span-4">
        <x-input-label for="company_name" :value="__('Nome da empresa')" />
        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                      :value="$managerAndYourCompany->company->name ?? old('company_name')" required autofocus autocomplete="off" />
        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
      </div>

      <!-- Cnpj -->
      <div class="col-span-full md:col-span-2" x-data>
        <x-input-label for="cnpj" :value="__('CNPJ')" />
        <x-text-input id="cnpj" class="block mt-1 w-full" type="text" name="cnpj"
                      :value="$managerAndYourCompany->company->cnpj ?? old('cnpj')" autofocus autocomplete="off" x-mask="**.***.***/****-99"/>
        <x-input-error :messages="$errors->get('cnpj')" class="mt-2" />
      </div>

      <!-- Corporate Name -->
      <div class="col-span-full md:col-span-4">
        <x-input-label for="corporate_name" :value="__('Razão Social')" />
        <x-text-input id="corporate_name" class="block mt-1 w-full" type="text" name="corporate_name"
                      :value="$managerAndYourCompany->company->corporate_name ?? old('corporate_name')" required autofocus autocomplete="off" />
        <x-input-error :messages="$errors->get('corporate_name')" class="mt-2" />
      </div>

      <!-- Hire of Date -->
      <div class="col-span-full md:col-span-2">
        <x-input-label for="hire_date" :value="__('Data de contratação')" />
        <x-text-input id="hire_date" class="block mt-1 w-full" type="date" name="hire_date"
                      :value="$managerAndYourCompany->company->hire_date ?? old('hire_date')" required autofocus autocomplete="off" />
        <x-input-error :messages="$errors->get('hire_date')" class="mt-2" />
      </div>

      <!-- Name -->
      <div class="col-span-full md:col-span-4">
        <x-input-label for="name" :value="__('Nome do resposável')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                      :value="$managerAndYourCompany->name ?? old('name')" required autofocus autocomplete="off" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <!-- cpf -->
      <div class="col-span-full md:col-span-2" x-data>
        <x-input-label for="cpf" :value="__('CPF')" />
        <x-text-input id="cpf" class="block mt-1 w-full" type="text" name="cpf"
                      :value="$managerAndYourCompany->cpf ?? old('cpf')" required autofocus autocomplete="off" x-mask="999.999.999-99"/>
        <x-input-error :messages="$errors->get('cpf')" class="mt-2" />
      </div>

      <!-- Email Address -->
      <div class="col-span-full {{ isset($managerAndYourCompany) ? 'md:col-span-3' : 'md:col-span-2' }}">
        <x-input-label for="email" :value="__('E-mail')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                      :value="$managerAndYourCompany->email ?? old('email')" required autocomplete="off" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <!-- Active or Inactive Company -->
      @if(isset($managerAndYourCompany))
        <div class="col-span-full md:col-span-3">
          <x-input-label for="status_company" :value="__('Status da empresa')" />
          <select id="status_company" name="status_company"
                  class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
                  required>
            <option value="1" {{ $managerAndYourCompany->company->active == 1 ? 'selected' : '' }}>Ativa</option>
            <option value="0" {{ $managerAndYourCompany->company->active == 0 ? 'selected' : '' }}>Inativa</option>
          </select>
          <x-input-error :messages="$errors->get('status_company')" class="mt-2" />
        </div>
      @endif

      <!-- Password -->
      <div class="col-span-full {{ isset($managerAndYourCompany) ? 'md:col-span-3' : 'md:col-span-2' }}">
        <x-input-label for="password" :value="__('Password')" />
        <x-password-input :required="!isset($managerAndYourCompany)" :placeholder="!isset($managerAndYourCompany) ? 'Defina a senha de acesso' : 'Deixe em branco para manter a senha atual'" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <!-- Confirm Password -->
      <div class="col-span-full {{ isset($managerAndYourCompany) ? 'md:col-span-3' : 'md:col-span-2' }}">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-password-input id="password_confirmation" name="password_confirmation" :required="!isset($managerAndYourCompany)"
                          :placeholder="!isset($managerAndYourCompany) ? 'Confirme a senha de acesso' : 'Deixe em branco para manter a senha atual'"/>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
      </div>

      @if(!isset($managerAndYourCompany))
        <div class="col-span-full flex flex-col">
          <label class="text-start text-gray-600 dark:text-gray-400">Será um colaborador?</label>
          <div class="flex items-center">
            <label class="inline-flex items-center me-2 cursor-pointer">
              <input type="checkbox" name="is_collaborator" class="sr-only peer" value="true">
              <div class="relative w-11 h-6 mt-1 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-yellow-400"></div>
            </label>
            <label class="text-start text-gray-600 dark:text-gray-400">habilite essa opção caso o responsável dessa empresa atue como colaborador.</label>
          </div>
        </div>
      @endif
    </div>
    <div class="flex items-center justify-center mt-4">
      <button type="submit"
              x-bind:disabled="isLoading"
              class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <span x-show="isLoading" x-transition>
          <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
          </svg>
        </span>
        <span x-show="!isLoading">{{ isset($managerAndYourCompany) ? 'Salvar Alterações' : 'Cadastrar Empresa' }}</span>
      </button>
    </div>
  </form>
</div>
