@props([
  'client' => '',
  'title' => '',
])

<div>
  <h1 class="text-center font-bold text-gray-500 dark:text-white print:text-black print:dark:text-black">{{ $title }}</h1>
  <h2 class="font-bold text-gray-500 dark:text-white my-4 print:text-black print:dark:text-black print:text-sm print:my-2">DADOS PESSOAIS</h2>
  <div class="grid grid-cols-12 gap-4 print:gap-x-2 print:gap-y-1">
    <div class="col-span-full">
      <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Nome do Paciente</span>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
        {{ $client->name }}
      </div>
    </div>
    @if($client->age < 18)
      <div class="col-span-full md:col-span-8 print:col-span-7">
        <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Responsável Legal/Financeiro</span>
        <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
          {{ $client->legal_responsible }}
        </div>
      </div>
      <div class="col-span-full md:col-span-4 print:col-span-5">
        <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">CPF do Responsável Legal/Financeiro</span>
        <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
          {{ $client->cpf_legal_responsible }}
        </div>
      </div>
    @endif
    <div class="col-span-full md:col-span-2 print:col-span-4">
      <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Idade</span>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
        {{ $client->age ?? 'NÃO INFORMADO' }}
      </div>
    </div>
    <div class="col-span-full md:col-span-2 print:col-span-4">
      <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Data de Nascimento</span>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
        {{ $client->birthdate ? \Carbon\Carbon::parse($client->birthdate)->format('d/m/Y') : 'NÃO INFORMADO' }}
      </div>
    </div>
    <div class="col-span-full md:col-span-2 print:col-span-4">
      <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Gênero</span>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
        {{ $client->gender ?? 'NÃO INFORMADO' }}
      </div>
    </div>
    <div class="col-span-full md:col-span-2 print:col-span-3">
      <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Estado Civil</span>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
        {{ $client->marital_status ?? 'NÃO INFORMADO' }}
      </div>
    </div>
    <div class="col-span-full md:col-span-4 print:col-span-6">
      <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Profissão</span>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
        {{ $client->occupation ?? 'NÃO INFORMADO' }}
      </div>
    </div>
    <div class="col-span-full md:col-span-4 print:col-span-3">
      <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Telefone</span>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
        {{ $client->phones[0]->phone_number }}
      </div>
    </div>
    <div class="col-span-full md:col-span-8 print:col-span-full">
      <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Endereço</span>
      <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5  print:text-[11px]">
        {{ $client->getFormattedAddress() }}
      </div>
    </div>
  </div>
</div>
