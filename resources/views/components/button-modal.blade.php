@props([
  'id_button' => '',
  'onclick' => '',
  'class' => 'inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700',
  '_disabled' => false
])
<!-- adicionar uma verificação para o @click somente aparecer se eu digitar o id da modal modal_id ? ... : ... -->
<button type="button" id="{{$id_button}}" class="{{ $class }}" @click="{{ $onclick }}"  @disabled($_disabled)>
    {{ $slot }}
</button>
