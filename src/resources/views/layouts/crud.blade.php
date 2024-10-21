<x-event-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>
    <div class="py-4">
        <div class="w-full mx-auto ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-4 bg-white border-b border-gray-200">
                    <!-- Mostrar mensajes de éxito y error -->
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">¡Éxito!</strong>
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                            role="alert">
                            <strong class="font-bold">¡Error!</strong>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
</x-event-layout>
