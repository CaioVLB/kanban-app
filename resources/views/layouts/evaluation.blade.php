@props([
  'client' => '',
  'collaborators' => '',
  'evaluation' => '',
  'evolutions' => '',
  'title' => '',
  'type' => ''
])

@section('scripts')
  <script>
    window.routes = {
      evaluation: {
        update: "{{ route('client.evaluations.updateEvaluation', ['evaluation_id' => ':evaluation_id', 'type' => ':type']) }}",
        redirect: "{{ route('client.show', ['client_id' => ':client_id']) }}"
      },
      evolution: {
        create: "{{ route('client.evaluation.evolution.store', ['evaluation_id' => ':id']) }}",
        update: "{{ route('client.evaluation.evolution.update', ['evolution_id' => ':id']) }}",
        delete: "{{ route('client.evaluation.evolution.destroy', ['evolution_id' => ':id']) }}"
      }
    };
  </script>
@endsection

<x-app-layout>
  <div x-data="evaluation({{ json_encode($evaluation->weight) }})" class="pt-3 pb-12">
    <div class="max-w-7xl flex items-center mx-auto mb-3 gap-4 print:hidden">
      @if(!empty($evolutions))
        <a type="button" href="{{ route('client.show', ['client_id' => $client->id]) }}"
                        class="inline-flex items-center p-2.5 text-amber-600 focus:outline-none bg-amber-200 rounded-full border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="lucide lucide-arrow-big-left-dash">
            <path d="M19 15V9"/>
            <path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/>
          </svg>
        </a>
      @else
        <x-button-modal onclick="openModalConfirmEvaluation({{ $client->id }})"
                        class="inline-flex items-center p-2.5 text-amber-600 focus:outline-none bg-amber-200 rounded-full border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="lucide lucide-arrow-big-left-dash">
            <path d="M19 15V9"/>
            <path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/>
          </svg>
        </x-button-modal>
      @endif
      <h1 class="font-bold text-gray-500 dark:text-white">Retornar à ficha do paciente</h1>
    </div>
    <form :action="routes.update" method="POST" @submit.prevent="isLoadingAction = true; $el.submit()" id="evaluation_print" class="max-w-7xl mx-auto gap-x-4 gap-y-2 w-full bg-white shadow rounded-lg p-6 dark:text-gray-400 dark:bg-gray-800 print:shadow-none print:p-0">
      @csrf
      @method('PUT')
      <div class="flex justify-end items-center">
        <button type="button" @click="handlePrint()" title="Imprimir avaliação" class="flex items-center justify-center p-1.5 bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 dark:bg-amber-600 dark:border-amber-700 dark:hover:bg-amber-700 print:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256" class="h-6 w-6 fill-amber-600 dark:fill-amber-200">
            <path d="M214.67,72H200V40a8,8,0,0,0-8-8H64a8,8,0,0,0-8,8V72H41.33C27.36,72,16,82.77,16,96v80a8,8,0,0,0,8,8H56v32a8,8,0,0,0,8,8H192a8,8,0,0,0,8-8V184h32a8,8,0,0,0,8-8V96C240,82.77,228.64,72,214.67,72ZM72,48H184V72H72ZM184,208H72V160H184Zm40-40H200V152a8,8,0,0,0-8-8H64a8,8,0,0,0-8,8v16H32V96c0-4.41,4.19-8,9.33-8H214.67c5.14,0,9.33,3.59,9.33,8Zm-24-52a12,12,0,1,1-12-12A12,12,0,0,1,200,116Z"></path>
          </svg>
        </button>
      </div>
      <x-evaluation-header :client="$client" :title="$title"></x-evaluation-header>

      <div class="grid grid-cols-12 gap-4 my-4 print:mb-2 print:mt-4 print:gap-2">

        <div class="flex justify-center items-center col-span-full print:hidden">
          <h2 class="font-bold text-gray-500 dark:text-white my-2">
            @if(!empty($evolutions))
              OS CAMPOS ABAIXOS SÃO SOMENTE PARA VISUALIZAÇÃO
            @else
              PREENCHA OS CAMPOS ABAIXO
            @endif
          </h2>
        </div>
        <div class="flex flex-col md:col-span-4 col-span-full print:col-span-6">
          <label for="collaborator_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black print:bg-white">Profissional Responsável</label>
          @if(!empty($evolutions))
            <input id="collaborator_id" value="{{ isset($evaluation->collaborator) ? $evaluation->collaborator->user->name : 'Não informado' }}" readonly class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">
          @else
            <select id="collaborator_id" name="collaborator_id"
                    class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:dark:bg-white print:p-1.5 print:text-[11px]"
                    required>
              <option selected disabled hidden value="">Selecione o profissional</option>
              @foreach($collaborators as $collaborator)
                <option value="{{ $collaborator->id }}" {{ $evaluation->collaborator_id === $collaborator->id ? 'selected' : '' }}>{{ $collaborator->user->name }}</option>
              @endforeach
            </select>
          @endif
        </div>
        <div class="flex flex-col md:col-span-4 col-span-full print:col-span-4">
          <label for="evaluation_date" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Data da Avaliação</label>
          <input type="date" name="date" id="date" {{ !empty($evolutions) ? 'readonly' : '' }} value="{{ $evaluation->getDateForInput() ?? old('date') }}" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]" required>
        </div>
      </div>
      @if($type !== 'orthopedic')
        <div class="grid grid-cols-4 gap-4 mb-4 print:mb-2 print:gap-2">
          <div class="flex flex-col md:col-span-1 col-span-full print:col-span-1">
            <label for="height" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Altura</label>
            <div class="flex">
              <input type="text" name="height" id="height" autocomplete="off" {{ !empty($evolutions) ? 'readonly' : '' }}
                   x-mask="9.99" value="{{ $evaluation->height ?? old('height') }}" class="rounded-e-none block flex-1 min-w-0 w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">
              <span title="metro(s)" class="inline-flex items-center px-3 font-bold text-sm text-gray-800 bg-gray-200 border rounded-e-lg border-gray-300 border-s-0 rounded-s-none dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 print:text-black print:dark:text-black">
                m
              </span>
            </div>
          </div>
          <div class="flex flex-col md:col-span-1 col-span-full print:col-span-1">
            <label for="weight" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Peso</label>
            <div class="flex">
              <input type="text" name="weight" id="weight" autocomplete="off" {{ !empty($evolutions) ? 'readonly' : '' }}
                     x-model="form.weight" x-on:input="form.weight = formatWeight($event.target.value)"
                     value="{{ $evaluation->weight ?? old('weight') }}" class="rounded-e-none block flex-1 min-w-0 w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">
              <span title="kilos" class="inline-flex items-center px-3 font-bold text-sm text-gray-800 bg-gray-200 border rounded-e-lg border-gray-300 border-s-0 rounded-s-none dark:bg-gray-600 dark:text-gray-300 dark:border-gray-600 print:text-black print:dark:text-black">
                kg
              </span>
            </div>
          </div>
        </div>
      @endif
      <div class="grid grid-cols-12 gap-4 print:gap-2">
        @if($type === 'physiotherapy' || $type === 'neuro')
          <div class="col-span-full md:col-span-3 print:col-span-4">
            <label for="blood_pressure" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Pressão Arterial (P.A)</label>
            <input type="text" id="blood_pressure" name="blood_pressure" {{ !empty($evolutions) ? 'readonly' : '' }} value="{{ $evaluation->physiotherapy->blood_pressure ?? $evaluation->neurological->blood_pressure ?? old('blood_pressure') }}" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]"/>
          </div>
          @if($type === 'physiotherapy')
            <div class="col-span-full md:col-span-3 print:col-span-4">
              <label for="respiratory_rate" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Frequência Respiratória (F.R)</label>
              <input type="text" id="respiratory_rate" name="respiratory_rate" {{ !empty($evolutions) ? 'readonly' : '' }} value="{{ $evaluation->physiotherapy->respiratory_rate ?? old('respiratory_rate') }}" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]"/>
            </div>
          @endif
          <div class="col-span-full md:col-span-3 print:col-span-4">
            <label for="heart_rate" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Frequência Cardíaca (F.C)</label>
            <input type="text" id="heart_rate" name="heart_rate" {{ !empty($evolutions) ? 'readonly' : '' }} value="{{ $evaluation->physiotherapy->heart_rate ?? $evaluation->neurological->heart_rate ?? old('heart_rate') }}" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]"/>
          </div>
        @endif
        <div class="col-span-full">
          <label for="main_complaint" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Queixa Principal</label>
          <textarea id="main_complaint" name="main_complaint" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->main_complaint ?? old('main_complaint') }}</textarea>
        </div>
        @if($type === 'orthopedic')
          <div class="col-span-full md:col-span-4 print:col-span-4">
            <label for="pain_intensity" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Intensidade da Dor</label>
            @if(!empty($evolutions))
              <input id="pain_intensity" value="{{ $evaluation->orthopedic->pain_intensity }}" readonly class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">
            @else
              <select id="pain_intensity" name="pain_intensity"
                      class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:dark:bg-white print:p-1.5 print:text-[11px]">
                <option selected disabled hidden value="">Selecione uma opção</option>
                <option value="Baixa (0 a 5)">Baixa (0 a 5)</option>
                <option value="Media (5,1 a 7)">Media (5,1 a 7)</option>
                <option value="Alta (7,1 a 10)">Alta (7,1 a 10)</option>
              </select>
            @endif
          </div>
          <div class="col-span-full md:col-span-8 print:col-span-8">
            <label for="details_affected_local" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between print:text-black print:dark:text-black">
              Detalhamento
              <small class="text-[11px] text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black print:hidden">(Especificar local e lado acometido, período do dia e fatores de melhora e piora)</small>
            </label>
            <textarea id="details_affected_local" name="details_affected_local" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ old('details_affected_local') }}</textarea>
          </div>
        @endif
        <div class="col-span-full">
          <label for="history_current_disease" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">História da Doença Atual (HDA)</label>
          <textarea id="history_current_disease" name="history_current_disease" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->history_current_disease ?? old('history_current_disease') }}</textarea>
        </div>
        <div class="col-span-full print:break-inside-avoid">
          <label for="history_previous_disease" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">História Patológica Pregressa (HPP)</label>
          <textarea id="history_previous_disease" name="history_previous_disease" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->history_previous_disease ?? old('history_previous_disease') }}</textarea>
        </div>
        <div class="col-span-full print:break-inside-avoid">
          <label for="associated_diseases" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between print:text-black print:dark:text-black">Doenças Associadas</label>
          <textarea id="associated_diseases" name="associated_diseases" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->associated_diseases ?? old('associated_diseases') }}</textarea>
        </div>
        @if($type !== 'neuro')
          <div class="col-span-full md:col-span-4 print:col-span-4 print:break-inside-avoid">
            <label for="physical_activity" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Praticante de Atividade Física?</label>
            @if(!empty($evolutions))
              <input id="physical_activity" value="{{ $evaluation->physical_activity ? 'Sim' : 'Não' }}" readonly class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">
            @else
              <select id="physical_activity" name="physical_activity"
                      class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 print:text-black print:dark:text-black print:dark:bg-white print:p-1.5 print:text-[11px]">
                <option selected disabled hidden value="">Selecione uma opção</option>
                <option value="1" {{ $evaluation->physical_activity === 1 ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ $evaluation->physical_activity === 0 ? 'selected' : '' }}>Não</option>
              </select>
            @endif
          </div>
          <div class="col-span-full md:col-span-8 print:col-span-8 print:break-inside-avoid">
            <label for="details_physical_activity" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between print:text-black print:dark:text-black">
              Detalhamento
              <small class="text-[11px] text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black print:hidden">(Especificar tipo de atividade, quantas vezes por semana e duração)</small>
            </label>
            <textarea id="details_physical_activity" name="details_physical_activity" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->details_physical_activity ?? old('details_physical_activity') }}</textarea>
          </div>
        @endif
        <div class="col-span-full print:break-inside-avoid">
          <label for="habits_vices" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between print:text-black print:dark:text-black">Hábitos e Vícios</label>
          <textarea id="habits_vices" name="habits_vices" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->habits_vices ?? old('habits_vices') }}</textarea>
        </div>
        {{ $slot }}
        @if($type !== 'neuro')
          <div class="col-span-full print:break-inside-avoid">
            <label for="medications" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between print:text-black print:dark:text-black">Medicações em Uso</label>
            <textarea id="medications" name="medications" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->medications ?? old('medications') }}</textarea>
          </div>
          @if($type !== 'physiotherapy')
              <div class="col-span-full">
                <label for="complementary_exams" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between print:text-black print:dark:text-black">Exames Complementares</label>
                <textarea id="complementary_exams" name="complementary_exams" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->orthopedic->complementary_exams ?? $evaluation->respiratory->complementary_exams ?? old('complementary_exams') }}</textarea>
              </div>
          @endif
        @endif
        <div class="col-span-full print:break-inside-avoid">
          <label for="diagnosis" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 print:text-black print:dark:text-black">Hipótese Diagnóstica</label>
          <textarea id="diagnosis" name="diagnosis" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->diagnosis ?? old('diagnosis') }}</textarea>
        </div>
        <div class="col-span-full print:break-inside-avoid">
          <label for="additional_observations" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between print:text-black print:dark:text-black">Observações Adicionais</label>
          <textarea id="additional_observations" name="additional_observations" rows="3" {{ !empty($evolutions) ? 'readonly' : '' }} class="w-full text-wrap border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate print:text-black print:dark:text-black print:p-1.5 print:text-[11px]">{{ $evaluation->additional_observations ?? old('additional_observations') }}</textarea>
        </div>
      </div>
      @if(empty($evolutions))
        <div class="w-full flex items-center justify-center mt-4 print:hidden">
          <button type="submit"
                  x-bind:disabled="isLoadingAction"
                  @click="submitEvaluation({{ $evaluation->id }}, '{{ $evaluation->type }}')"
                  class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <span x-show="isLoadingAction" x-transition>
            <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
            </svg>
          </span>
            <span x-show="!isLoadingAction">Salvar Avaliação</span>
          </button>
        </div>
      @endif
    </form>
    @include('evaluations.snippets.confirm-action-modal')
    @if(!empty($evolutions))
      @include('evolution.list-evolution')
    @endif
  </div>
</x-app-layout>
