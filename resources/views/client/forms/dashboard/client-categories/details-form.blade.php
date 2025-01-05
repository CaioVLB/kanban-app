<form x-data="client_details({{ json_encode($client) }}, {{ $client->age }})" action="{{ route('client.update', $client->id) }}" method="POST" @submit.prevent="isLoading = true; $el.submit()">
  @csrf
  @method('PUT')
  <div class="flex-grow grid grid-cols-6 gap-4 mb-6">
    <div class="col-span-full">
      <label for="name" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nome</label>
      <input type="text" id="name" name="name" value="{{ $client->name }}" autocomplete="name"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" required>
    </div>
    <div class="xl:col-span-3 lg:col-span-2 md:col-span-3" x-data>
      <label for="cpf" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">CPF</label>
      <input type="text" id="cpf" name="cpf" value="{{ $client->cpf }}"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" x-mask="999.999.999-99" required>
    </div>
    <div class="col-span-2">
      <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Data de Nascimento</label>
      <input type="date" id="birthdate" name="birthdate" x-model="birthdate" @blur="updateAge"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="xl:col-span-1 lg:col-span-2  md:col-span-1">
      <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Idade</label>
      <input type="text" id="age" x-model="age" class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" readonly>
    </div>
    <div class="col-span-full grid grid-cols-2 gap-4" x-show="isMinor || legalResponsible || cpfLegalResponsible" x-cloak>
      <div class="col-span-full text-center" x-show="'{{ !$client->legal_responsible || !$client->cpf_legal_responsible }}'">
        <span class="py-1 text-yellow-700 dark:text-yellow-100">Lembre-se de preencher os campos do responsável legal, pois são necessários.</span>
      </div>
      <div class="col-span-1">
        <label for="legal_responsible" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Responsável Legal/Financeiro</label>
        <input type="text" id="legal_responsible" name="legal_responsible" x-model="legalResponsible"
               class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" :required="isMinor ? true : false">
      </div>
      <div class="col-span-1">
        <div class="xl:col-span-3 lg:col-span-2 md:col-span-3" x-data>
          <label for="cpf_legal_responsible" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">CPF do Responsável Legal/Financeiro</label>
          <input type="text" id="cpf_legal_responsible" name="cpf_legal_responsible" x-model="cpfLegalResponsible"
                 class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" x-mask="999.999.999-99" :required="isMinor ? true : false">
        </div>
      </div>
    </div>
    <div class="col-span-3">
      <label for="gender" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Gênero</label>
      <select id="gender" name="gender"
              class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
        <option selected disabled hidden value="">Selecione uma opção</option>
        <option value="Feminino" {{ $client->gender === 'Feminino' ? 'selected' : '' }}>Feminino</option>
        <option value="Masculino" {{ $client->gender === 'Masculino' ? 'selected' : '' }}>Masculino</option>
        <option value="Outro" {{ $client->gender === 'Outro' ? 'selected' : '' }}>Outro</option>
        <option value="Não informado" {{ $client->gender === 'Não informado' ? 'selected' : '' }}>Não informado</option>
      </select>
    </div>
    <div class="col-span-3">
      <label for="nationality" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Nacionalidade</label>
      <input type="text" id="nationality" name="nationality" value="{{ $client->nationality }}"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-3">
      <label for="marital_status" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Estado Civil</label>
      <select id="marital_status" name="marital_status"
              class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
        <option selected disabled hidden value="">Selecione uma opção</option>
        <option value="Casado" {{ $client->marital_status === 'Casado' ? 'selected' : '' }}>Casado</option>
        <option value="Divorciado" {{ $client->marital_status === 'Divorciado' ? 'selected' : '' }}>Divorciado</option>
        <option value="Viúvo" {{ $client->marital_status === 'Viúvo' ? 'selected' : '' }}>Viúvo</option>
        <option value="Solteiro" {{ $client->marital_status === 'Solteiro' ? 'selected' : '' }}>Solteiro</option>
        <option value="União estável" {{ $client->marital_status === 'União estável' ? 'selected' : '' }}>União estável</option>
      </select>
    </div>
    <div class="col-span-3">
      <label for="occupation" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Profissão</label>
      <input type="text" id="occupation" name="occupation" value="{{ $client->occupation }}"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-3">
      <label for="main_phone_number" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Telefone</label>
      <select id="main_phone_number" name="main_phone_number" aria-labelledby="phone-select-label"
              class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
              required>
        <option selected disabled hidden value="">Selecione um telefone principal</option>
        @foreach($phones as $phone)
          <option value="{{ $phone->id }}" {{ $phone->main ? 'selected' : '' }}>{{$phone->identifier}} - {{$phone->phone_number}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-span-3">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
      <input type="email" id="email" name="email" value="{{ $client->email }}" autocomplete="email"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" required>
    </div>
    <div class="col-span-full">
      <label for="main_address" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Endereço</label>
      <select id="main_address" name="main_address" aria-labelledby="address-select-label"
              class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
        <option selected disabled hidden value="">Selecione um endereço principal</option>
        @forelse($addresses as $address)
          <option value="{{ $address->id }}" {{ $address->main ? 'selected' : '' }}>{{ $address->street }} - {{ $address->number }}, {{ $address->neighborhood }}, {{ $address->city->city }} - {{ $address->state->abbreviation }}, {{$address->zipcode}}, Brasil</option>
        @empty
          <option disabled>Nenhum endereço cadastrado</option>
        @endforelse
      </select>
    </div>
  </div>
  <footer class="flex justify-center items-center mt-auto">
    <button type="submit"
            x-bind:disabled="isLoading"
            class="inline-flex justify-center gap-1 py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <span x-show="isLoading" x-transition>
          <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
          </svg>
        </span>
      <span x-show="!isLoading" class="flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 lucide lucide-user-round-pen" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M2 21a8 8 0 0 1 10.821-7.487"/><path d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/><circle cx="10" cy="8" r="5"/></svg>
        <span>Atualizar Informações</span>
      </span>
    </button>
  </footer>
</form>
