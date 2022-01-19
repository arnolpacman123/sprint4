<div>
    <x-jet-secondary-button class="mr-2 mb-2" wire:click="$set('open', true)">
        {{ __('Editar') }}
    </x-jet-secondary-button>
    <x-jet-danger-button>
        {{ __('Eliminar') }}
    </x-jet-danger-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Editar encuesta: {{ $encuesta->titulo }}
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Título de la encuesta"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model="encuesta.titulo"></x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label value="Descripción de la encuesta"></x-jet-label>
                <textarea class="form-control w-full" rows="3" wire:model="encuesta.descripcion"></textarea>
            </div>
            <div class="mb-4">
                <x-jet-label value="Fecha de vigencia de la encuesta"></x-jet-label>
                <x-datepicker wire:model="encuesta.fecha_vigencia"/>
            </div>
            <div class="mb-4">
                <x-jet-label value="Límite de respuestas"></x-jet-label>
                <x-jet-input type="number" min="0" class="w-full" wire:model="encuesta.limite_respuestas"></x-jet-input>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-jet-button>
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" class="disabled:opacity-25">
                Actualizar encuesta
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
