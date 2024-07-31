@props([
  'id_button' => '',
  'modal_id' => (string) 'modal_id',
  'class' => 'py-2.5 px-5 me-2 mb-2 text-sm font-bold text-purple-600 focus:outline-none bg-purple-100 rounded-lg border border-purple-200 hover:bg-purple-100 hover:text-purple-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-purple-800 dark:text-purple-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-purple-700',
  'style' => '',
  'onclick' => '',
  '_disabled' => false
])

<button type="button" id="{{$id_button}}" class="{{ $class }}" data-bs-toggle="modal" data-bs-target="{{ "#".$modal_id }}" style="{{$style}}" onclick="{{$onclick}}" @disabled($_disabled)>
    {{ $slot }}
</button>
