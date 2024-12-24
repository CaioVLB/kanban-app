<form x-data="{ isLoading: false }" action="{{ route('client.addresses.store', $client->id) }}" method="POST" @submit.prevent="isLoading = true; $el.submit()">
  @csrf
  <div class="grid grid-cols-12 gap-y-4">
    <div class="col-span-full md:col-span-8 lg:col-span-12 md:mr-2 lg:mr-0">
      <label for="description" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Descrição</label>
      <input type="text" id="description" name="description" autocomplete="name" value="{{ old('description') }}"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Ex.: nome do responsável pelo endereço" required>
    </div>
    <div class="col-span-full md:col-span-4 lg:col-span-3 md:ml-2 lg:ml-0 lg:mr-2" x-data>
      <label for="zipcode" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">CEP</label>
      <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" autocomplete="postal-code" autofocus
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" x-mask="99999-999" required>
    </div>
    <div class="col-span-full md:col-span-5 lg:col-span-6 md:mr-2 lg:mx-2">
      <label for="street" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Logradouro</label>
      <input type="text" id="street" name="street" value="{{ old('street') }}" autocomplete="address-line1"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="Rua/avenida/estrada" required>
    </div>
    <div class="col-span-full md:col-span-2 lg:col-span-3 md:mx-2 lg:ml-2 lg:mr-0">
      <label for="number" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Número</label>
      <input type="text" id="number" name="number" value="{{ old('number') }}"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800" placeholder="N° da residência" required>
    </div>
    <div class="col-span-full md:col-span-5 lg:col-span-6 md:ml-2 lg:mr-2 lg:ml-0">
      <label for="neighborhood" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Bairro</label>
      <input type="text" id="neighborhood" name="neighborhood" value="{{ old('neighborhood') }}" autocomplete="neighborhood-address"
             class="w-full border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800">
    </div>
    <div class="col-span-full md:col-span-5 lg:col-span-6 md:mr-2 lg:ml-2 lg:mr-0">
      <label for="state" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Estado/UF</label>
      <select id="state" name="state" x-on:change="fetchCities($event.target.value)"
              class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
              required>
        <option selected disabled hidden value="">Selecione um estado</option>
        @foreach($states as $state)
          <option value="{{ $state->id }}">{{ $state->state }} ({{ $state->abbreviation }})</option>
        @endforeach
      </select>
    </div>
    <div class="col-span-full md:col-span-5 lg:col-span-9 md:ml-2 md:mr-2 lg:ml-0">
      <label for="city" class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">Cidade</label>
      <div class="relative">
        <select id="city" name="city"
                :disabled="searching || cities.length === 0"
                class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md shadow-sm focus:ring-amber-400 focus:border-amber-200 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-amber-400 dark:focus:border-amber-800"
                required>
          <template x-if="searching">
            <option value="" disabled selected>Carregando as cidades...</option>
          </template>
          <template x-for="city in cities" :key="city.id">
            <option :value="city.id" x-text="city.city"></option>
          </template>
        </select>
        <div x-show="searching" class="absolute inset-y-0 right-0 flex items-center pr-10">
          <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
          </svg>
        </div>
      </div>
    </div>
    <div class="col-span-full md:col-span-2 lg:col-span-3 flex items-end md:ml-2">
      <button type="submit"
              x-bind:disabled="isLoading"
              class="inline-flex justify-center w-full gap-1 py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700">
        <span x-show="isLoading" x-transition>
          <svg class="animate-spin h-5 w-5 text-amber-600 dark:text-amber-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 100 8v4a8 8 0 01-8-8z"></path>
          </svg>
        </span>
        <span x-show="!isLoading">Cadastrar</span>
      </button>
    </div>
  </div>
</form>

