<x-modal x-data="{ show: false }" name="modal-role" :show="false" maxWidth="sm" @open-modal.window="show = true">
    @include('role.partials.role-form')
</x-modal>
