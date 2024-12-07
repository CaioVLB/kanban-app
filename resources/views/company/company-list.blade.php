<x-app-layout>
  <div class="py-12">
    <div x-data="company()" class="flex flex-wrap justify-start max-w-7xl mx-auto px-4 md:px-2">
      <div class="w-full flex justify-between flex-wrap items-center mb-4 px-2 gap-4">
        <h1 class="font-bold text-gray-500 dark:text-white">Empresas</h1>
        <a href="{{ route('company.create') }}" class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <svg class="me-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
          </svg>
          Nova Empresa
        </a>
      </div>
      @forelse($managersAndTheirCompanies as $managerAndYourCompany)
        <div class="w-full flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-4 mx-2 mb-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-8 w-8 fill-gray-700 dark:fill-white mr-2" viewBox="0 0 256 256">
            <path d="M248,208H232V96a8,8,0,0,0,0-16H184V48a8,8,0,0,0,0-16H40a8,8,0,0,0,0,16V208H24a8,8,0,0,0,0,16H248a8,8,0,0,0,0-16ZM216,96V208H184V96ZM56,48H168V208H144V160a8,8,0,0,0-8-8H88a8,8,0,0,0-8,8v48H56Zm72,160H96V168h32ZM72,80a8,8,0,0,1,8-8H96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,80Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H128A8,8,0,0,1,120,80ZM72,120a8,8,0,0,1,8-8H96a8,8,0,0,1,0,16H80A8,8,0,0,1,72,120Zm48,0a8,8,0,0,1,8-8h16a8,8,0,0,1,0,16H128A8,8,0,0,1,120,120Z"></path>
          </svg>
          <div class="w-full grid lg:grid-cols-8 md:grid-cols-5 gap-4 py-1 px-4" x-data>
            <div class="flex flex-col lg:col-span-2 md:col-span-2">
              <label class="text-start text-gray-600 dark:text-gray-400">Nome da empresa</label>
              <span class="text-start text-gray-900 font-bold dark:text-white truncate" :title="'{{ $managerAndYourCompany->company->name }}'">{{ $managerAndYourCompany->company->name }}</span>
            </div>
            <div class="flex flex-col lg:col-span-2 md:col-span-3">
              <label class="text-start text-gray-600 dark:text-gray-400">Responsável</label>
              <span class="text-start text-gray-900 font-bold dark:text-white truncate" :title="'{{ $managerAndYourCompany->name }}'">{{ $managerAndYourCompany->name }}</span>
            </div>
            <div class="flex flex-col lg:col-span-2 md:col-span-2">
              <label class="text-start text-gray-600 dark:text-gray-400">E-mail</label>
              <span class="text-start text-gray-900 font-bold dark:text-white truncate" :title="'{{ $managerAndYourCompany->email }}'">{{ $managerAndYourCompany->email }}</span>
            </div>
            <div class="flex flex-col lg:col-span-1 md:col-span-2">
              <label class="text-start text-gray-600 dark:text-gray-400">Contratação</label>
              <span class="text-start text-gray-900 font-bold dark:text-white">{{ date('d/m/Y', strtotime($managerAndYourCompany->company->hire_date)) }}</span>
            </div>
            <div class="flex flex-col lg:col-span-1 md:col-span-1">
              <label class="text-start text-gray-600 dark:text-gray-400">Status</label>
              <span class="text-start text-gray-900 font-bold dark:text-white">{{ $managerAndYourCompany->company->active === 1  ? 'Ativa' : 'Inativa'}}</span>
            </div>
          </div>
          <div class="flex md:flex-row flex-col gap-2">
            <a type="button" href="{{ route('impersonate', $managerAndYourCompany->id) }}" title="Acessar conta do responsável" class="flex items-center justify-center p-2 bg-blue-200 rounded-lg border border-blue-300 hover:bg-blue-300 hover:border-blue-400 dark:bg-blue-500 dark:border-blue-600 dark:hover:bg-blue-600 dark:hover:border-blue-700">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-6 w-6 fill-blue-400 dark:fill-blue-200 dark:hover:fill-blue-300">
                <path d="M247.31,124.76c-.35-.79-8.82-19.58-27.65-38.41C194.57,61.26,162.88,48,128,48S61.43,61.26,36.34,86.35C17.51,105.18,9,124,8.69,124.76a8,8,0,0,0,0,6.5c.35.79,8.82,19.57,27.65,38.4C61.43,194.74,93.12,208,128,208s66.57-13.26,91.66-38.34c18.83-18.83,27.3-37.61,27.65-38.4A8,8,0,0,0,247.31,124.76ZM128,192c-30.78,0-57.67-11.19-79.93-33.25A133.47,133.47,0,0,1,25,128,133.33,133.33,0,0,1,48.07,97.25C70.33,75.19,97.22,64,128,64s57.67,11.19,79.93,33.25A133.46,133.46,0,0,1,231.05,128C223.84,141.46,192.43,192,128,192Zm0-112a48,48,0,1,0,48,48A48.05,48.05,0,0,0,128,80Zm0,80a32,32,0,1,1,32-32A32,32,0,0,1,128,160Z"></path>
              </svg>
            </a>
            <a type="button" href="{{ route('company.edit', $managerAndYourCompany->id) }}" title="Editar dados da empresa" class="flex items-center justify-center p-2 bg-amber-200 rounded-lg text-amber-600 border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
              </svg>
            </a>
            <x-danger-button onclick="openModal({{ $managerAndYourCompany->company->id }}, '{{ $managerAndYourCompany->company->name }}')" :title="'Excluir empresa'" class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-6 w-6 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
                <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
              </svg>
            </x-danger-button>
          </div>
        </div>
      @empty
        <div class="w-full flex justify-center items-center border rounded-lg shadow bg-yellow-100 p-4 mx-2 gap-2 dark:border-yellow-800 dark:bg-yellow-600">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-6 w-6 text-yellow-700 dark:text-yellow-100 md:block hidden">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
          </svg>
          <span class="py-2 px-4 text-start text-yellow-700 dark:text-yellow-100">
            Até o momento, nenhum empresa foi cadastrada. Utilize o botão acima para cadastrar empresas.
          </span>
        </div>
      @endforelse
      @include('company.snippets.delete-company-modal', ['show' => true])
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
    </div>
  </div>
</x-app-layout>
