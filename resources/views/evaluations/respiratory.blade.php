<x-evaluation-layout :client="$client" :collaborators="$collaborators" title="FICHA DE AVALIAÇÃO RESPIRATÓRIA" type="respiratory">
  <div class="col-span-full md:col-span-6">
    <label for="associated_diseases" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Doenças Anteriores</label>
    <textarea id="associated_diseases" name="associated_diseases" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
  </div>
  <div class="col-span-full md:col-span-6">
    <label for="associated_diseases" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Hábitos e Vícios</label>
    <textarea id="associated_diseases" name="associated_diseases" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
  </div>
  <div class="col-span-full">
    <label for="family_historic" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Histórico Familiar</label>
    <textarea id="family_historic" name="family_historic" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
  </div>
</x-evaluation-layout>
