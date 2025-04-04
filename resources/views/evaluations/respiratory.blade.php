<x-evaluation-layout
  :client="$client"
  :collaborators="$collaborators"
  :evaluation="$evaluation"
  :evolutions="$evolutions ?? null"
  title="FICHA DE AVALIAÇÃO RESPIRATÓRIA"
  type="respiratory">
  <div class="col-span-full print:break-inside-avoid">
    <label for="hospitalization" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between print:text-black print:dark:text-black">Internação Anterior - Causa <small class="print:text-black print:dark:text-black">(Quanto Tempo?)</small></label>
    <textarea id="hospitalization" name="hospitalization" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->respiratory->hospitalization ?? old('hospitalization') }}</textarea>
  </div>
  <div class="col-span-full print:break-inside-avoid">
    <label for="family_historic" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Histórico Familiar</label>
    <textarea id="family_historic" name="family_historic" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->respiratory->family_historic ?? old('family_historic') }}</textarea>
  </div>
</x-evaluation-layout>
