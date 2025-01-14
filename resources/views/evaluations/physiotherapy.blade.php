<x-evaluation-layout :client="$client" :collaborators="$collaborators" title="FICHA DE AVALIAÇÃO FISIOTERAPIA" type="physiotherapy">
  <div class="col-span-full md:col-span-4">
    <label for="characteristic" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Praticante de Atividade Física?</label>
    <select id="characteristic" name="characteristic"
            class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
      <option selected disabled hidden value="">Selecione uma opção</option>
      <option value="1">Sim</option>
      <option value="0">Não</option>
    </select>
  </div>
  <div class="col-span-full md:col-span-8">
    <label for="main_complaint" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">
      Detalhamento
      <small class="text-[11px] text-gray-700 dark:text-gray-300">(Especificar tipo de atividade, quantas vezes por semana e duração)</small>
    </label>
    <textarea id="main_complaint" name="main_complaint" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
  </div>
  <div class="col-span-full">
    <label for="associated_diseases" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Doenças Associadas</label>
    <textarea id="associated_diseases" name="associated_diseases" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
  </div>
  <div class="col-span-full">
    <label for="family_historic" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Histórico Familiar</label>
    <textarea id="family_historic" name="family_historic" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
  </div>
</x-evaluation-layout>
