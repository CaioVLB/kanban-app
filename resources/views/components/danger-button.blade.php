@props([
  'onclick' => ''
])

<button @click="{{ $onclick }}" {{ $attributes->merge(['type' => 'submit', 'class' => 'flex items-center justify-center p-2 bg-red-200 rounded-lg border border-red-400 shadow hover:bg-red-300 dark:bg-red-400 dark:border-red-500 transition ease-in-out duration-150']) }}>
  {{ $slot }}
</button>
