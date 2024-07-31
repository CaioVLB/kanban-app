<div class="h-screen overflow-y-auto transition-all duraction-200 bg-white dark:bg-gray-800" :class="openSideBar ? 'w-48' : 'w-0'">
    <div class="w-full h-auto flex justify-center p-2 bg-white dark:bg-gray-800">
        <!-- Logo -->
        <div class="shrink-0 flex items-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
            </a>
        </div>
    </div>
    <div class="p-3">
        <ul>
            <li>Board</li>
            <li>Clientes</li>
        </ul>
    </div>
</div>
