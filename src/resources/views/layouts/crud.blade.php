<x-event-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <div class="py-4">
        <div class="w-full mx-auto">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-4 bg-white border-b border-gray-200">
                    {{ $slot }}
                    @if (isset($links))
                        <div class="mt-4">
                            {{ $links }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Estilos globales --}}
    <style>
        /* Estilos base para el cuerpo */
        body {
            background-color: #f0f4f8;
        }

        /* Contenedor principal */
        .max-w-7xl {
            max-width: 80rem;
        }

        /* Estilos comunes para botones */
        .action-btn,
        .delete-btn,
        .x-button {
            transition: all 0.2s ease-in-out;
        }

        .action-btn:hover,
        .delete-btn:hover,
        .x-button:hover {
            transform: scale(1.05);
        }

        /* Estilos para botones específicos */
        .x-button {
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            font-weight: 500;
            text-align: center;
            width: 6rem;
        }

        /* Colores comunes */
        .btn-primary {
            background-color: #0075B2;
        }

        .btn-primary:hover {
            background-color: #005C53;
        }

        /* Estilos para tablas */
        .table-header {
            background-color: #1E1E49;
            color: white;
        }

        /* Estilos para formularios */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(1, minmax(0, 1fr));
        }

        @media (min-width: 768px) {
            .form-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 1rem;
            }
        }
    </style>
</x-event-layout>
