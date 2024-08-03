<div x-data="{ openSideBar: false }">
    @include('layouts.navigation')
    <div class="flex">
        @include('layouts.sidebar', ['openSideBar' => 'openSideBar'])
        <div class="w-full h-screen overflow-y-auto transition-all duraction-200 bg-gray-100 dark:bg-gray-900">
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
