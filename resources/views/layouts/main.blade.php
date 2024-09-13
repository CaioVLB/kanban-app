<div x-data="{ openSideBar: false }">
    @include('layouts.navigation')
    <div class="max-h-content flex">
        @include('layouts.sidebar', ['openSideBar' => 'openSideBar'])
        <div class="w-full overflow-y-auto transition-all duration-200 bg-gray-100 dark:bg-gray-900">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
