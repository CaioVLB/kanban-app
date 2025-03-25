<x-app-layout>
  <div class="flex flex-wrap justify-center max-w-7xl mx-auto py-12 px-4 md:px-2">
    <div class="w-full sm:max-w-lg mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
      <form method="POST" action="{{ route('register') }}">
        @csrf

        <x-input-error :messages="session()->get('error')" class="align-middle mt-2" />

        <!-- Company Name -->
        <div>
          <x-input-label
            for="company_name"
            :value="__('Nome da empresa')" />
          <x-text-input
            id="company_name"
            class="block mt-1 w-full"
            type="text" name="company_name"
            :value="old('company_name')"
            required autofocus autocomplete="off" />
          <x-input-error
            :messages="$errors->get('company_name')"
            class="mt-2" />
        </div>

        <!-- Hire of Date -->
        <div class="mt-4">
          <x-input-label
            for="hire_date"
            :value="__('Data de contratação')" />
          <x-text-input
            id="hire_date"
            class="block mt-1 w-full"
            type="date" name="hire_date"
            :value="old('hire_date')"
            required autofocus autocomplete="off" />
          <x-input-error
            :messages="$errors->get('hire_date')"
            class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
          <x-input-label
            for="name"
            :value="__('Nome do resposável')" />
          <x-text-input
            id="name"
            class="block mt-1 w-full"
            type="text" name="name"
            :value="old('name')"
            required autofocus autocomplete="off" />
          <x-input-error
            :messages="$errors->get('name')"
            class="mt-2" />
        </div>

        <!-- cpf -->
        <div class="mt-4" x-data>
          <x-input-label
            for="cpf"
            :value="__('CPF')" />
          <x-text-input
            id="cpf"
            class="block mt-1 w-full"
            type="text" name="cpf"
            :value="old('cpf')"
            required autofocus autocomplete="off"
            x-mask="999.999.999-99"/>
          <x-input-error
            :messages="$errors->get('cpf')"
            class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
          <x-input-label
            for="email"
            :value="__('Email')" />
          <x-text-input
            id="email"
            class="block mt-1 w-full"
            type="email" name="email"
            :value="old('email')"
            required autocomplete="off" />
          <x-input-error
            :messages="$errors->get('email')"
            class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
          <x-input-label
            for="password"
            :value="__('Password')" />
          <x-text-input
            id="password"
            class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="new-password" />
          <x-input-error
            :messages="$errors->get('password')"
            class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
          <x-input-label
            for="password_confirmation"
            :value="__('Confirm Password')" />
          <x-text-input
            id="password_confirmation"
            class="block mt-1 w-full"
            type="password"
            name="password_confirmation"
            required autocomplete="new-password" />
          <x-input-error
            :messages="$errors->get('password_confirmation')"
            class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
          <!--<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
            {{ __('Already registered?') }}
          </a>-->

          <x-primary-button class="ms-4">
            Cadastrar Empresa
          </x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>
