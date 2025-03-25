<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center py-2.5 px-5 text-sm font-bold text-amber-600 focus:outline-none bg-amber-200 rounded-lg border border-amber-300 hover:bg-amber-300 hover:text-amber-700 dark:bg-amber-600 dark:text-amber-200 dark:border-amber-700 dark:hover:text-white dark:hover:bg-amber-700 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
