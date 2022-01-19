<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-jet-section-title>
        <x-slot name="title">{{ $seccion->titulo }}</x-slot>
        <x-slot name="description">{{ $seccion->descripcion }}</x-slot>
    </x-jet-section-title>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6">
                    <x-jet-label class="cursor-pointer" for="titulo" value="{{ __('Título') }}" />
                    <x-jet-input autocomplete="off" id="titulo" type="text" class="mt-1 block w-full"
                        wire:model.defer="seccion.titulo" />
                </div>
                <div class="col-span-6">
                    <x-jet-label class="cursor-pointer" for="descripcion" value="{{ __('Descripción') }}" />
                    <textarea id="descripcion" class="form-control w-full" rows="3"
                        wire:model.defer="seccion.descripcion"></textarea>
                </div>
            </div>
        </div>
        <div
            class="flex items-center px-4 py-3 bg-gray-50 sm:px-6 shadow {{ $preguntas->count() ? '' : 'sm:rounded-bl-md sm:rounded-br-md' }}">
            @livewire('preguntas.create', ['seccion' => $seccion], key($seccion->_id))
            <x-jet-section-border />
            <x-jet-button class="bg-green-500 ml-4" wire:loading.attr="disabled" wire:click="update">
                {{ __('Actualizar') }}
            </x-jet-button>

        </div>
        @if ($preguntas->count())
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <div class="w-full mx-auto p-5 bg-white rounded-lg shadow">
                    <div class="flex items-center justify-between">
                        <div class="w-full">
                            <h2 class="section-heading text-center">
                                Preguntas
                            </h2>
                        </div>
                    </div>
                    <x-jet-section-border />
                    @foreach ($preguntas as $pregunta)
                        <div class="mt-2 space-y-8">
                            <div class="flex">
                                <span
                                    class="inline-flex justify-center items-center w-6 h-6 rounded bg-green-400 text-white font-medium text-sm text-center">
                                    {{ $loop->index + 1 }}
                                </span>
                                <p class="ml-4 md:ml-6">
                                    {{ $pregunta->enunciado }} - Tipo de pregunta: {{ $pregunta->tipo_pregunta }}
                                </p>
                            </div>
                            @if ($pregunta->tipo_pregunta === 'CERRADA')
                                @livewire('opciones.create', ['pregunta' => $pregunta], key($pregunta->_id))
                            @endif
                            @foreach ($pregunta->opciones as $opcion)
                                <div class="flex items-start mt-3">
                                    <span
                                        class="inline-flex justify-center items-center w-6 h-6 rounded bg-gray-200 text-gray-800 font-medium text-sm">
                                        {{ $loop->index + 1 }}
                                    </span>
                                    <p class="ml-4 md:ml-6 text-gray-800">
                                        {{ $opcion->valor }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        <x-jet-section-border />
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
