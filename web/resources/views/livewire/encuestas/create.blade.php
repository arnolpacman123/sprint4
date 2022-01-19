<div>
    <x-jet-button wire:click="$set('open', true)">
        Crear nueva encuesta
    </x-jet-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear nueva encuesta
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Título de la encuesta"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="titulo"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripción de la encuesta"></x-jet-label>
                <textarea class="form-control w-full" rows="3" wire:model.defer="descripcion"></textarea>
            </div>
            <div class="mb-4">
                <x-jet-label value="Fecha de vigencia de la encuesta"></x-jet-label>
                <x-datepicker wire:model.defer="fecha_vigencia"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Límite de respuestas"></x-jet-label>
                <x-jet-input type="number" min="0" class="w-full" wire:model.defer="limite_respuestas"></x-jet-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-jet-button>
            <x-jet-danger-button wire:click="save" wire:loading.attr="disabled" class="disabled:opacity-25">
                Crear encuesta
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
