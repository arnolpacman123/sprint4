<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$encuesta->titulo}}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        <div>
            <h1 class="text-center">{{ $encuesta->descripcion }}</h1>
            @foreach($encuesta->secciones as $seccion)
                @livewire('form-seccion', ['encuesta' => $encuesta, 'i' => ($loop->index+1), 'seccion' => $seccion], key(($loop->index+1)))
            @endforeach
        </div>
    </div>
</x-app-layout>
