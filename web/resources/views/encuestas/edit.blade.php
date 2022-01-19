<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$encuesta->titulo}}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('encuestas.update', ['encuesta' => $encuesta->_id]) }}">
                    @method('PUT')
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="titulo" class="block font-medium text-sm text-gray-700">Título</label>
                            <input type="text" name="titulo" id="titulo"
                                   class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('titulo', $encuesta->titulo) }}"/>
                            @error('titulo')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="descripcion" class="block font-medium text-sm text-gray-700">Descripción</label>
                            <textarea type="text" name="descripcion" id="descripcion"
                                      class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('descripcion', $encuesta->descripcion) }}</textarea>
                            @error('descripcion')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="fecha_vigencia" class="block font-medium text-sm text-gray-700">Fecha de
                                vigencia</label>
                            <input type="text" id="fecha_vigencia" name="fecha_vigencia"
                                   class="form-input rounded-md shadow-sm mt-1 block w-full" value="{{ old('fecha_vigencia', $encuesta->incrementDay()) }}">
                            @error('fecha_vigencia')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <script>
                            var picker = new Pikaday({
                                    field: document.getElementById('fecha_vigencia'),
                                    format: 'YYYY-M-D',
                                    toString(date, format) {
                                        // you should do formatting based on the passed format,
                                        // but we will just return 'D/M/YYYY' for simplicity
                                        let day = date.getDate();
                                        let month = date.getMonth() + 1;
                                        const year = date.getFullYear();
                                        if (day < 10)
                                        {
                                            day = `0${day}`;
                                        }
                                        if (month < 10)
                                        {
                                            month = `0${month}`;
                                        }
                                        return `${year}-${month}-${day}`;
                                    },
                                    i18n: {
                                        previousMonth: 'Previous Month',
                                        nextMonth: 'Next Month',
                                        months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                        weekdays: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                                        weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb']
                                    },
                                }
                            );
                        </script>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Actualizar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
