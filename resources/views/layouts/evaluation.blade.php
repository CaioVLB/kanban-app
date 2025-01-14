@props([
  'client' => '',
  'collaborators' => '',
  'title' => '',
  'type' => ''
])

<x-app-layout>
  <div class="pt-3 pb-12">
    <div class="max-w-7xl flex items-center mx-auto mb-3 px-2 gap-4">
      <a href="{{ route('client.show', $client->id) }}"
         class="inline-flex items-center p-2.5 text-amber-600 focus:outline-none bg-amber-200 rounded-full border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="lucide lucide-arrow-big-left-dash">
          <path d="M19 15V9"/>
          <path d="M15 15h-3v4l-7-7 7-7v4h3v6z"/>
        </svg>
      </a>
      <h1 class="font-bold text-gray-500 dark:text-white">Retornar à ficha do paciente</h1>
    </div>
    <div class="max-w-7xl mx-auto gap-x-4 gap-y-2 w-full bg-white shadow rounded-lg p-6 dark:text-gray-400 dark:bg-gray-800">
      <h1 class="text-center font-bold text-gray-500 dark:text-white">{{ $title }}</h1>
      <h2 class="font-bold text-gray-500 dark:text-white my-4">DADOS PESSOAIS</h2>
      <div class="grid grid-cols-12 gap-4">
        <div class="col-span-full">
          <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Nome do Paciente</span>
          <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">
            {{ $client->name }}
          </div>
        </div>
        @if($client->age < 18)
          <div class="col-span-full md:col-span-8">
            <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Responsável Legal</span>
            <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">
              {{ $client->legal_responsible }}
            </div>
          </div>
          <div class="col-span-full md:col-span-4">
            <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">CPF do Responsável Legal</span>
            <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
              {{ $client->cpf_legal_responsible }}
            </div>
          </div>
        @endif
        <div class="col-span-full md:col-span-2">
          <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Idade</span>
          <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
            {{ $client->age ?? 'NÃO INFORMADO' }}
          </div>
        </div>
        <div class="col-span-full md:col-span-2">
          <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</span>
          <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
            {{ $client->birthdate ? \Carbon\Carbon::parse($client->birthdate)->format('d/m/Y') : 'NÃO INFORMADO' }}
          </div>
        </div>
        <div class="col-span-full md:col-span-2">
          <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Gênero</span>
          <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
            {{ $client->gender ?? 'NÃO INFORMADO' }}
          </div>
        </div>
        <div class="col-span-full md:col-span-2">
          <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Estado Civil</span>
          <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
            {{ $client->marital_status ?? 'NÃO INFORMADO' }}
          </div>
        </div>
        <div class="col-span-full md:col-span-4">
          <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Profissão</span>
          <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">
            {{ $client->occupation ?? 'NÃO INFORMADO' }}
          </div>
        </div>
        <div class="col-span-full md:col-span-4">
          <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</span>
          <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
            {{ $client->phones[0]->phone_number }}
          </div>
        </div>
        <div class="col-span-full md:col-span-8">
          <span class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Endereço</span>
          <div class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">
            {{ $client->getFormattedAddress() }}
          </div>
        </div>
      </div>
      <div class="grid grid-cols-12 gap-4 my-4">
        <div class="flex justify-center items-center col-span-full">
          <h2 class="font-bold text-gray-500 dark:text-white my-2">PREENCHA OS CAMPOS ABAIXO</h2>
        </div>
        <div class="flex flex-col md:col-span-4 col-span-full">
          <label for="responsible_evaluation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Profissional Responsável</label>
          <select id="responsible_evaluation" name="responsible_evaluation"
                  class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
                  required>
            <option selected disabled hidden value="">Selecione o profissional</option>
            @foreach($collaborators as $collaborator)
              <option value="{{ $collaborator->id }}">{{ $collaborator->user->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col md:col-span-4 col-span-full">
          <label for="evaluation_date" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Data da Avaliação</label>
          <input type="date" name="evaluation_date" id="evaluation_date" value="{{ old('evaluation_date') }}" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" required>
        </div>
      </div>
      @if($type !== 'orthopedic')
        <div class="grid grid-cols-4 gap-4 mb-4">
          <div class="flex flex-col md:col-span-1 col-span-full">
            <label for="evaluation_date" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Altura</label>
            <input type="date" name="evaluation_date" id="evaluation_date" value="{{ old('evaluation_date') }}" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" required>
          </div>
          <div class="flex flex-col md:col-span-1 col-span-full">
            <label for="evaluation_date" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Peso</label>
            <input type="date" name="evaluation_date" id="evaluation_date" value="{{ old('evaluation_date') }}" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" required>
          </div>
        </div>
      @endif
      <div class="grid grid-cols-12 gap-4">
        @if($type === 'physiotherapy' || $type === 'neuro')
          <div class="col-span-full md:col-span-3">
            <label for="blood_pressure" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Pressão Arterial (P.A)</label>
            <input type="text" id="blood_pressure" name="blood_pressure" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"/>
          </div>
          @if($type === 'physiotherapy')
            <div class="col-span-full md:col-span-3">
              <label for="respiratory_rate" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Frequência respiratória (F.R)</label>
              <input type="text" id="respiratory_rate" name="respiratory_rate" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"/>
            </div>
          @endif
          <div class="col-span-full md:col-span-3">
            <label for="heart_rate" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Frequência cardíaca (F.C)</label>
            <input type="text" id="heart_rate" name="heart_rate" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"/>
          </div>
        @endif
        <div class="col-span-full">
          <label for="diagnosis" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Diagnóstico</label>
          <textarea id="diagnosis" name="diagnosis" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('diagnosis') }}</textarea>
        </div>
        <div class="col-span-full">
          <label for="main_complaint" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Queixa Principal</label>
          <textarea id="main_complaint" name="main_complaint" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
        </div>
        @if($type === 'orthopedic')
          <div class="col-span-full md:col-span-4">
            <label for="pain_intensity" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">Intensidade da Dor</label>
            <select id="pain_intensity" name="pain_intensity"
                    class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
              <option selected disabled hidden value="">Selecione uma opção</option>
              <option value="Alta">Alta</option>
              <option value="Média">Média</option>
              <option value="Baixa">Baixa</option>
            </select>
          </div>
          <div class="col-span-full md:col-span-8">
            <label for="notes_pain_intensity" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">
              Detalhamento
              <small class="text-[11px] text-gray-700 dark:text-gray-300">(Especificar local e lado acometido, período do dia e fatores de melhora e piora)</small>
            </label>
            <textarea id="notes_pain_intensity" name="notes_pain_intensity" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
          </div>
        @endif
        <div class="col-span-full">
          <label for="history_current_disease" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">História da Doença Atual (HDA)</label>
          <textarea id="history_current_disease" name="history_current_disease" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
        </div>
        <div class="col-span-full">
          <label for="history_previous_disease" class="block mb-1 text-sm font-medium text-gray-700 dark:text-gray-300">História Patológica Pregressa (HPP)</label>
          <textarea id="history_previous_disease" name="history_previous_disease" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
        </div>
        {{ $slot }}
        @if($type !== 'neuro')
          <div class="col-span-full">
            <label for="medications" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Medicações em Uso</label>
            <textarea id="medications" name="medications" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
          </div>
          @if($type !== 'physiotherapy')
              <div class="col-span-full">
                <label for="complementary_exams" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Exames Complementares</label>
                <textarea id="complementary_exams" name="complementary_exams" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
              </div>
          @endif
        @endif
          <div class="col-span-full">
            <label for="family_historic" class="mb-1 text-sm font-medium text-gray-700 dark:text-gray-300 flex justify-between">Observações Adicionais</label>
            <textarea id="family_historic" name="family_historic" rows="3" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800 truncate">{{ old('main_complaint') }}</textarea>
          </div>
      </div>
      <div class="w-full flex items-center justify-center mt-4" x-data="{ isLoading: false }">
        <button type="submit"
                x-bind:disabled="isLoading"
                class="inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
          <span x-show="isLoading" x-transition>
            <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
            </svg>
          </span>
          <span x-show="!isLoading">Salvar Avaliação</span>
        </button>
      </div>
    </div>
  </div>
</x-app-layout>
