<div x-data="client_addresses()" class="flex-grow">
  @include('client.forms.dashboard.client-categories.address-form')
  <div class="flex flex-col max-h-[380px] max-h-[380px]:overflow-scroll scroll-smooth overflow-x-hidden gap-y-1.5 pe-2 mt-6">
    @forelse($addresses as $address)
      <div class="flex justify-center items-center border border-gray-200 rounded-lg shadow bg-white p-2 gap-2 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div class="w-full grid lg:grid-cols-4 md:grid-cols-4 grid-cols-1 gap-x-4 gap-y-1 lg:py-1 px-2">
          <div class="flex flex-col lg:col-span-3 md:col-span-3 col-span-full">
            <label class="text-start text-gray-600 dark:text-gray-400">Descrição</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white" title="{{ $address->description }}">{{ $address->description }}</span>
          </div>
          <div class="flex flex-col lg:col-span-1 md:col-span-1 col-span-full">
            <label class="text-start text-gray-600 dark:text-gray-400">CEP</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white" title="{{ $address->zipcode }}">{{ $address->zipcode }}</span>
          </div>
          <div class="flex flex-col col-span-full">
            <label class="text-start text-gray-600 dark:text-gray-400">Endereço</label>
            <span class="text-start text-gray-900 font-bold truncate dark:text-white"
                  title="{{ $address->street }} -  {{ $address->number }}, {{ $address->neighborhood }}, {{ $address->city->city }} - {{ $address->state->abbreviation }}">
              {{ $address->street }} -  {{ $address->number }}, {{ $address->neighborhood }}, {{ $address->city->city }} - {{ $address->state->abbreviation }}
            </span>
          </div>
        </div>
        <x-danger-button
          data_id="{{ $address->id }}"
          data_content="{{ $address->street }} - {{ $address->number }}, {{ $address->neighborhood }}, {{ $address->city->city }} - {{ $address->state->abbreviation }}"
          :title="'Excluir telefone'"
          onclick="openModal($el)"
          class="flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" class="h-5 w-5 fill-red-800 dark:hover:fill-red-900" viewBox="0 0 256 256">
            <path d="M216,48H40a8,8,0,0,0,0,16h8V208a16,16,0,0,0,16,16H192a16,16,0,0,0,16-16V64h8a8,8,0,0,0,0-16ZM192,208H64V64H192ZM80,24a8,8,0,0,1,8-8h80a8,8,0,0,1,0,16H88A8,8,0,0,1,80,24Z"></path>
          </svg>
        </x-danger-button>
      </div>
    @empty
      <div class="border rounded-lg shadow bg-yellow-100 p-3 mx-2 mt-2 dark:border-yellow-800 dark:bg-yellow-600">
        <p class="py-1 px-1 text-center text-yellow-700 dark:text-yellow-100">Este cliente ainda não possui endereço cadastrado.</p>
      </div>
    @endforelse
  </div>
  @include('client.snippets.dashboard.client-categories.delete-address-modal', ['show' => true])
</div>
