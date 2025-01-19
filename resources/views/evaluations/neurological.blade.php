<x-evaluation-layout :client="$client" :collaborators="$collaborators" :evaluation="$evaluation" title="FICHA DE AVALIAÇÃO NEURO" type="neuro">
  <div class="col-span-full md:col-span-6">
    <label for="physical_assessment" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Avaliação Física</label>
    <textarea id="physical_assessment" name="physical_assessment" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('physical_assessment') }}</textarea>
  </div>
  <div class="col-span-full md:col-span-6">
    <label for="inspection_assessment" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Inspeção</label>
    <textarea id="inspection_assessment" name="inspection_assessment" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('inspection_assessment') }}</textarea>
  </div>
  <h2 class="col-span-full font-bold text-gray-500 dark:text-white">Palpação</h2>
  <div class="col-span-full md:col-span-6">
    <label for="muscle_trophism_characteristic" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Trofismo</label>
    <textarea id="muscle_trophism_characteristic" name="muscle_trophism_characteristic" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('muscle_trophism_characteristic') }}</textarea>
  </div>
  <div class="col-span-full md:col-span-6">
    <label for="muscle_tone_characteristic" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Tonus</label>
    <textarea id="muscle_tone_characteristic" name="muscle_tone_characteristic" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('muscle_tone_characteristic') }}</textarea>
  </div>
</x-evaluation-layout>
