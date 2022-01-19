<div>
    <x-jet-button wire:click="$set('open', true)">Agregar opción</x-jet-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar opción - Pregunta: {{ $pregunta->enunciado }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Valor de la opción"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="valor">
                </x-jet-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-jet-button>
            <x-jet-danger-button wire:click="saveOpcion" wire:loading.attr="disabled" class="disabled:opacity-25">
                Agregar opción
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
