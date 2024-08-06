@props([
  'id_button' => '',
  'modal_id' => (string) 'modal_id',
  'class' => 'inline-flex items-center py-2.5 px-5 text-sm font-bold text-purple-600 focus:outline-none bg-purple-100 rounded-lg border border-purple-200 hover:bg-purple-200 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-purple-600 dark:text-purple-200 dark:border-gray-800 dark:hover:text-white dark:hover:bg-purple-700',
  '_disabled' => false
])

<button type="button" id="{{$id_button}}" class="{{ $class }}" @click="$dispatch('open-modal', '{{ $modal_id }}' )"  @disabled($_disabled)>
    {{ $slot }}
</button>
