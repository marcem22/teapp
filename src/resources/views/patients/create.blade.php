<x-crud-layout>
    <x-slot name="title">
        {{ __('Nuevo Paciente') }}
    </x-slot>

    <!-- Bloque para mostrar errores globales -->
    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
            <p class="font-bold">{{ __('Hay algunos problemas con tu entrada.') }}</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-validation-errors class="mb-4" />

    <div class="max-w-7xl mx-auto p-6 bg-gray-50 shadow-md rounded-lg mt-4">
        <h1 class="text-2xl font-bold text-[#1E1E49] mb-4">{{ __('Nuevo Paciente') }}</h1>

        <form action="{{ route('patients.store') }}" method="POST" class="space-y-4" novalidate>
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Código -->
                <div>
                    <x-label for="codigo" :value="__('Código')" />
                    <x-input id="codigo" class="block mt-1 w-full" type="text" name="codigo" :value="old('codigo')" required autofocus />
                    <x-input-error for="codigo" class="mt-2" />
                </div>

                <!-- Apellidos -->
                <div>
                    <x-label for="apellidos" :value="__('Apellidos')" />
                    <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required />
                    <x-input-error for="apellidos" class="mt-2" />
                </div>

                <!-- Nombres -->
                <div>
                    <x-label for="nombres" :value="__('Nombres')" />
                    <x-input id="nombres" class="block mt-1 w-full" type="text" name="nombres" :value="old('nombres')" required />
                    <x-input-error for="nombres" class="mt-2" />
                </div>

                <!-- DNI -->
                <div>
                    <x-label for="dni" :value="__('DNI')" />
                    <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required />
                    <x-input-error for="dni" class="mt-2" />
                </div>

                <!-- Fecha de nacimiento -->
                <div>
                    <x-label for="nacimiento" :value="__('Fecha de nacimiento')" />
                    <x-input id="nacimiento" class="block mt-1 w-full" type="date" name="nacimiento" :value="old('nacimiento')" required />
                    <x-input-error for="nacimiento" class="mt-2" />
                </div>

                <!-- Sexo -->
                <div>
                    <x-label for="sexo" :value="__('Sexo')" />
                    <select name="sexo" required class="block mt-1 w-full">
                        <option value="" disabled {{ old('sexo') == '' ? 'selected' : '' }}>Seleccionar...</option>
                        <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>Masculino</option>
                        <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>Femenino</option>
                    </select>
                    <x-input-error for="sexo" class="mt-2" />
                </div>

                <!-- Teléfono -->
                <div>
                    <x-label for="telefono" :value="__('Teléfono')" />
                    <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required />
                    <x-input-error for="telefono" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    <x-input-error for="email" class="mt-2" />
                </div>

                <!-- Dirección -->
                <div>
                    <x-label for="direccion" :value="__('Dirección')" />
                    <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required />
                    <x-input-error for="direccion" class="mt-2" />
                </div>

                <!-- Observaciones -->
                <div class="col-span-2">
                    <x-label for="observaciones" :value="__('Observaciones')" />
                    <textarea name="observaciones" rows="4" class="block mt-1 w-full">{{ old('observaciones') }}</textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-4 mt-6">
                <x-button type="submit" class="bg-[#0075B2] hover:bg-[#005C53]">
                    {{ __('Guardar') }}
                </x-button>
                <x-button href="{{ route('patients.index') }}" class="bg-gray-300 text-[#1E1E49] hover:bg-gray-400">
                    {{ __('Volver') }}
                </x-button>
            </div>
        </form>
    </div>

    <style>
        body {
            background-color: #f0f4f8;
        }

        .max-w-7xl {
            max-width: 80rem;
        }

        .x-button {
            transition: all 0.2s ease-in-out;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: 500;
            text-align: center;
            width: 6rem;
        }

        .x-button:hover {
            transform: scale(1.05);
        }
    </style>
</x-crud-layout>

