<x-app-layout>
  <div class="py-12">
    <div class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-2">
      <div class="w-full flex items-center mb-3 px-2 gap-4">
        <a href="{{ route('companies.index')  }}" class="inline-flex items-center p-2.5 text-amber-600 focus:outline-none bg-amber-200 rounded-full border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-big-left-dash">
            <path d="M19 15V9"/><path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/>
          </svg>
        </a>
        <h1 class="font-bold text-gray-500 dark:text-white">Formulário para {{ isset($managerAndYourCompany) ? 'editar dados da empresa ' . $managerAndYourCompany->company->name : 'cadastro de empresa' }}</h1>
      </div>
      @include('company.forms.company-form')
    </div>
  </div>

  @if(session()->get('success') || $errors->first())
    <div x-data="{ show: true, init() { setTimeout(() => this.show = false, 4000) } }" x-show="show"
         x-transition:enter="transform ease-out duration-300 transition"
         x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
         x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
         x-transition:leave="transform ease-in duration-100 transition"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed top-4 right-4 z-50 max-w-xs w-full {{ session()->get('success') ? 'bg-green-200 border-green-300 text-green-700' : 'bg-red-200 border-red-300 text-red-700' }} border text-sm font-bold p-4 rounded-lg shadow-lg">
      <span>{{ session()->get('success') ? session()->get('success') : $errors->first() }}</span>
    </div>
  @endif
</x-app-layout>
