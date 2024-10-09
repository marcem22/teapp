<x-event-layout>
    <x-slot name="header">
        <h1 class="text-4xl font-bold mb-6 text-center text-gradient">Contador</h1>
    </x-slot>

    <main class="container mx-auto px-4 py-8 opacity-0 transition-opacity duration-500" id="main-content">
        <!-- Número mostrado en el centro -->
        <div class="flex flex-col items-center space-y-8">
            <span class="text-8xl font-bold text-black-600">{{ $número }}</span>

            <!-- Botones con estilos personalizados -->
            <div class="flex space-x-8">
                <x-button class="bg-green-500 hover:bg-green-600 transition duration-300"
                    onclick="location.href='{{ route('contador.inc', ['número' => $número]) }}'">
                    Incrementar
                </x-button>

                <x-button class="bg-red-500 hover:bg-red-600 transition duration-300"
                    onclick="location.href='{{ route('contador.dec', ['número' => $número]) }}'">
                    Decrementar
                </x-button>

                <x-button class="bg-blue-500 hover:bg-blue-600 transition duration-300"
                    onclick="location.href='{{ route('contador.reset', ['número' => $número]) }}'">
                    Reiniciar
                </x-button>

                <x-button class="bg-yellow-500 hover:bg-yellow-600 transition duration-300"
                    onclick="location.href='{{ route('contador.double', ['número' => $número]) }}'">
                    Duplicar
                </x-button>

                <x-button class="bg-purple-500 hover:bg-purple-600 transition duration-300"
                    onclick="location.href='{{ route('contador.set', ['número' => $número, 'valor' => 5]) }}'">
                    Restablecer a 5
                </x-button>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('main-content').classList.remove('opacity-0');
            document.getElementById('main-content').classList.add('opacity-100');
        });
    </script>
</x-event-layout>
