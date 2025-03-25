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
</x-app-layout>
