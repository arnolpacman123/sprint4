<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        {{ __('Agregar pregunta') }}
    </x-jet-danger-button>
    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Agregar pregunta
        </x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Enunciado de la pregunta"></x-jet-label>
                <x-jet-input type="text" class="w-full" wire:model.defer="enunciado">
                </x-jet-input>
            </div>
            <div class="mb-4">
                <x-jet-label for="tipo_pregunta" value="Tipo de pregunta"></x-jet-label>
                <select class="form-control w-full" name="tipo_pregunta" id="tipo_pregunta" wire:model="tipo_pregunta">
                    <option value="" disabled>Seleccione un tipo de pregunta</option>
                    <option value="CERRADA">CERRADA</option>
                    <option value="ABIERTA">ABIERTA</option>
                </select>
            </div>
            @if ($tipo_pregunta === 'CERRADA')
                <div class="mb-4">
                    <x-jet-label for="tipo_seleccion" value="Tipo de selección"></x-jet-label>
                    <select class="form-control w-full" name="tipo_seleccion" id="tipo_seleccion"
                        wire:model.defer="tipo_seleccion">
                        <option value="" disabled>Seleccione un tipo de selección</option>
                        <option value="SIMPLE">SIMPLE</option>
                        <option value="MÚLTIPLE">MÚLTIPLE</option>
                    </select>
                </div>
            @elseif ($tipo_pregunta === 'ABIERTA')
                <div class="mb-4">
                    <x-jet-label for="tipo_entrada" value="Tipo de entrada"></x-jet-label>
                    <select class="form-control w-full" name="tipo_entrada" id="tipo_entrada"
                        wire:model.defer="tipo_entrada">
                        <option value="" disabled>Seleccione un tipo de entrada</option>
                        <option value="NUMÉRICA">NUMÉRICA</option>
                        <option value="ALFABÉTICA">ALFABÉTICA</option>
                    </select>
                </div>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-jet-button class="mr-3" wire:click="$set('open', false)">
                Cancelar
            </x-jet-button>
            <x-jet-danger-button wire:click="savePregunta" wire:loading.attr="disabled" class="disabled:opacity-25">
                Agregar pregunta
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
