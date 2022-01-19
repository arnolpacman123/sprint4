<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $encuesta->titulo }}
        </h2>
    </x-slot>
    <div class="mx-auto mt-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-jet-button wire:click="$set('open', true)">Agregar sección</x-jet-button>
            <x-jet-dialog-modal wire:model="open">
                <x-slot name="title">
                    Agregar sección
                </x-slot>
                <x-slot name="content">
                    <div class="mb-4">
                        <x-jet-label value="Título de la sección"></x-jet-label>
                        <x-jet-input type="text" class="w-full" wire:model.defer="titulo"></x-jet-input>
                    </div>
                    <div class="mb-4">
                        <x-jet-label value="Descripción de la sección"></x-jet-label>
                        <textarea class="form-control w-full" rows="3" wire:model.defer="descripcion"></textarea>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-jet-button class="mr-3" wire:click="$set('open', false)">
                        Cancelar
                    </x-jet-button>
                    <x-jet-danger-button wire:click="addSeccion" wire:loading.attr="disabled"
                        class="disabled:opacity-25">
                        Agregar sección
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
        </div>
    </div>
    <div class="mx-auto py-10">
        <div class="max-w-7xl mx-auto py-5 sm:px-6 lg:px-8">
            @foreach ($secciones as $seccion)
                @livewire('secciones.edit', ['seccion' => $seccion], key($seccion->_id))
                <x-jet-section-border />
            @endforeach
        </div>
    </div>
</div>
