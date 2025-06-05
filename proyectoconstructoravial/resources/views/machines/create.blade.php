<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GesMaq</title>
    <style>
        .boton-blanco {
            background-color: gray;
            color: black;
            font-weight: 600;
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        .boton-blanco:hover {
            background-color: rgb(147, 165, 201);
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            padding: 0.5rem 1rem;
            font-size: 15px;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease, transform 0.1s ease;
            cursor: pointer;
            margin-top: 1rem;
            margin-bottom: 1rem;
            margin-left: 1rem;
        }

        .btn-success:hover {
           background-color: #218838;
        }

        .btn-alert:active {
            transform: scale(0.97);
        }
    </style>
</head>
<body>
<x-app-layout>
    <div class="hidden space-x-8 sm:ms-10 sm:flex mt-6">
        <a href="{{ route('machines.show') }}" class="boton-blanco">
            {{ __('Atrás') }}
        </a>
    </div>

    <div class="max-w-md mx-auto mt-10 px-6">
        <h2 class="text-2xl font-bold text-center mb-6 text-white">
            Crear nueva máquina
        </h2>
            @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 text-center" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

        <div class="bg-white shadow-lg rounded-lg p-8 text-gray-800" >
            <form action="{{ route('machines.store') }}" method="POST" style="margin-left: 1rem; margin-top: 1rem; margin-right: 1rem;">
                @csrf

                <div class="mb-5">
                    <label for="serial_number" class="block font-semibold mb-1">Número de serie</label>
                    <input type="text" id="serial_number" name="serial_number" class="w-full border border-gray-300 rounded px-4 py-2" required>
                </div>

                <div class="mb-5">
                    <label for="model" class="block font-semibold mb-1">Modelo</label>
                    <input type="text" id="model" name="model" class="w-full border border-gray-300 rounded px-4 py-2" required>
                </div>

                <div class="mb-5">
                    <label for="kilometers" class="block font-semibold mb-1">Kilómetros</label>
                    <input type="number" id="kilometers" name="kilometers" class="w-full border border-gray-300 rounded px-4 py-2" required>
                </div>

                <div class="mb-5">
                    <label for="id_machines_type" class="block font-semibold mb-1">Tipo de máquina</label>
                    <select id="id_machines_type" name="id_machines_type" class="w-full border border-gray-300 rounded px-4 py-2" required>
                        <option value="" disabled selected>Seleccionar tipo</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn-success">Guardar</button>
            </form>
        </div>
    </div>
</x-app-layout>
</body>
</html>
