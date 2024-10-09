<x-event-layout>
    <x-slot name="title">Pacientes</x-slot>

    <div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded-lg mt-4 patients-container">
        <h1 class="page-title text-2xl font-bold text-[#1E1E49] mb-4">{{ $title }}</h1> <!-- Reducido el margen a mb-4 -->

        <div class="flex justify-end mb-4"> <!-- Reducido el margen a mb-4 -->
            <a href="{{ route('patients.create') }}"
                class="new-patient-btn inline-block bg-[#0075B2] text-white py-2 px-4 rounded hover:bg-[#005C53] transition duration-200">
                Nuevo paciente
            </a>
        </div>

        <table class="patients-table min-w-full bg-white border border-gray-300 rounded-lg mb-4"> <!-- Reducido el margen a mb-4 -->
            <thead class="bg-[#1E1E49] text-white">
                <tr>
                    <th class="py-2 px-4 border-b">Código</th>
                    <th class="py-2 px-4 border-b">Apellidos</th>
                    <th class="py-2 px-4 border-b">Nombres</th>
                    <th class="py-2 px-4 border-b">DNI</th>
                    <th class="py-2 px-4 border-b">Fecha de nacimiento</th>
                    <th class="py-2 px-4 border-b">Sexo</th>
                    <th class="py-2 px-4 border-b">Teléfono</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $patient)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $patient->codigo }}</td>
                        <td class="py-2 px-4 border-b">{{ $patient->apellidos }}</td>
                        <td class="py-2 px-4 border-b">{{ $patient->nombres }}</td>
                        <td class="py-2 px-4 border-b">{{ $patient->dni }}</td>
                        <td class="py-2 px-4 border-b">{{ $patient->nacimiento }}</td>
                        <td class="py-2 px-4 border-b">{{ $patient->sexo }}</td>
                        <td class="py-2 px-4 border-b">{{ $patient->telefono }}</td>
                        <td class="py-2 px-4 border-b">{{ $patient->email }}</td>
                        <td class="py-2 px-4 border-b">
                            <div class="flex items-center gap-2"> <!-- Reducido el espacio en gap a 2 -->
                                <a href="{{ route('patients.show', $patient) }}"
                                    class="action-btn view-btn bg-[#A7D3E0] text-[#1E1E49] py-1 px-2 rounded hover:bg-[#9ABB50] inline-flex items-center justify-center w-8 h-8"
                                    title="Ver">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{ route('patients.edit', $patient) }}"
                                    class="action-btn edit-btn bg-[#EA9423] text-white py-1 px-2 rounded hover:bg-[#0075B2] inline-flex items-center justify-center w-8 h-8"
                                    title="Editar">
                                    <i class="fa-solid fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="delete-btn bg-red-600 text-white py-1 px-2 rounded hover:bg-red-700 inline-flex items-center justify-center w-8 h-8"
                                        title="Eliminar">
                                        <i class="fa-solid fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="flex justify-end mt-4 pagination"> <!-- Reducido el margen a mt-4 -->
            {{ $patients->links() }}
        </div>
    </div>

    <style>
        .patients-container {
            padding: 1.5rem; /* Ajustar el padding según sea necesario */
        }

        .page-title {
            margin-bottom: 1rem; /* Reducido el margen */
        }

        .new-patient-btn {
            text-decoration: none;
        }

        .patients-table {
            margin-bottom: 1rem; /* Ajustado el margen */
        }

        .patients-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .patients-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .patients-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .pagination {
            margin-top: 1.5rem; /* Reducido el margen */
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
        }

        .pagination .page-link {
            color: #0075B2;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
        }

        .pagination .page-item.active .page-link {
            background-color: #0075B2;
            color: white;
        }

        .action-btn,
        .delete-btn {
            transition: all 0.2s ease-in-out;
            text-decoration: none;
        }

        .action-btn:hover,
        .delete-btn:hover {
            transform: translateY(-1px);
        }
    </style>
</x-event-layout>
