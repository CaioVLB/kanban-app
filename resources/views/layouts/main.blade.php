<div x-data="{ openSideBar: false }">
  @include('layouts.navigation')
  <div class="max-h-content flex">
    @include('layouts.sidebar', ['openSideBar' => 'openSideBar'])
    <div class="w-full overflow-y-auto transition-all duration-200 bg-gray-100 dark:bg-gray-900">
      <!-- alert about impersonating -->
      @if(session()->has('impersonate'))
        <div class="flex items-center justify-center bg-indigo-600 py-2.5 gap-x-2 w-full">
          <span class="text-white">Você está se passando por <strong>{{ auth()->user()->name }}</strong>.</span>
          <a class="text-white text-sm underline hover:text-blue-300" href="{{ route('leaveImpersonating') }}">Voltar para o meu perfil</a>
        </div>
      @endif
      <!-- Page Content -->
      <main>
        {{ $slot }}
      </main>
    </div>
  </div>
</div>
