<x-crud-layout>
    <x-slot name="title">Editar Paciente</x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mt-4">
        <h1 class="text-2xl font-bold text-[#1E1E49] mb-6">{{ $title }}</h1>

        <form action="{{ route('patients.update', $patient) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="codigo" class="block text-sm font-medium text-[#042940]">Código</label>
                    <input type="text" name="codigo" value="{{ $patient->codigo }}" required
                           class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                </div>

                <div>
                    <label for="apellidos" class="block text-sm font-medium text-[#042940]">Apellidos</label>
                    <input type="text" name="apellidos" value="{{ $patient->apellidos }}" required
                           class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                </div>

                <div>
                    <label for="nombres" class="block text-sm font-medium text-[#042940]">Nombres</label>
                    <input type="text" name="nombres" value="{{ $patient->nombres }}" required
                           class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                </div>

                <div>
                    <label for="dni" class="block text-sm font-medium text-[#042940]">DNI</label>
                    <input type="text" name="dni" value="{{ $patient->dni }}" required
                           class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                </div>

                <div>
                    <label for="nacimiento" class="block text-sm font-medium text-[#042940]">Fecha de nacimiento</label>
                    <input type="date" name="nacimiento" value="{{ $patient->nacimiento }}" required
                           class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                </div>

                <div>
                    <label for="sexo" class="block text-sm font-medium text-[#042940]">Sexo</label>
                    <select name="sexo" required
                            class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                        <option value="M" @if ($patient->sexo == 'M') selected @endif>Masculino</option>
                        <option value="F" @if ($patient->sexo == 'F') selected @endif>Femenino</option>
                    </select>
                </div>

                <div>
                    <label for="telefono" class="block text-sm font-medium text-[#042940]">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $patient->telefono }}" required
                           class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-[#042940]">Email</label>
                    <input type="email" name="email" value="{{ $patient->email }}" required
                           class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                </div>

                <div>
                    <label for="direccion" class="block text-sm font-medium text-[#042940]">Dirección</label>
                    <input type="text" name="direccion" value="{{ $patient->direccion }}" required
                           class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">
                </div>

                <div class="col-span-2">
                    <label for="observaciones" class="block text-sm font-medium text-[#042940]">Observaciones</label>
                    <textarea name="observaciones" rows="4"
                              class="mt-1 p-2 border border-gray-300 rounded w-full focus:outline-none focus:ring-2 focus:ring-[#0075B2]">{{ $patient->observaciones }}</textarea>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-[#0075B2] text-white px-4 py-2 rounded hover:bg-[#005C53] transition duration-200">
                    Guardar
                </button>
            </div>
        </form>
    </div>

    <style>
        .max-w-7xl {
            max-width: 80rem;
        }
    </style>
</x-crud-layout>
