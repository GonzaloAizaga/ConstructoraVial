<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GesMaq</title>
    <style>
        .boton-blanco {
            background-color: gray;
            color: black;
            font-weight: 600;
            border: 1px solidrgb(203, 211, 224); 
            border-radius: 0.375rem;
            padding: 0.5rem 1rem;
            display: inline-block;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.2s ease-in-out;
        }

        .boton-blanco:hover {
            background-color:rgb(147, 165, 201); /* gray-100 */
        }
        .btn-alert {
            background-color: #facc15;
            color: black;
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
            margin-bottom: 1rem;
            
        }
        .btn-alert:hover {
            background-color: #eab308;
        }

        .btn-alert:active {
            transform: scale(0.97);
        }

    </style>
</head>
<body>
<x-app-layout>
    <div class="hidden space-x-8 sm:ms-10 sm:flex" style="margin-top: 1.5rem;">
        <a href="{{ route('constructions.show') }}" class="boton-blanco">
            {{ __('Atrás') }}
        </a>
    </div>
    <div class="max-w-4xl mx-auto mb-12 px-6" style="margin-top: 50px;">
        <h2 class="text-2xl font-bold text-center mb-6 text-white">
                Información de la Obra
        </h2>
        <div class="bg-white shadow-lg rounded-lg p-6 text-gray-800 max-w-2xl mx-auto">
            <h2 class="text-2xl font-semibold mb-4 text-start">{{ $constructions->name }}</h2>

            <div class="text-lg divide-y divide-gray-300">
                <p class="py-2 ml-4"><span class="font-semibold">Inicio:</span> {{ $constructions->dateStart->format('d/m/Y') }}</p>
                <p class="py-2 ml-4"><span class="font-semibold">Fin:</span> {{ $constructions->dateFinish->format('d/m/Y') }}</p>
                <p class="py-2 ml-4"><span class="font-semibold">Provincia:</span> {{ $constructions->province->name ?? 'Sin provincia' }}</p>
                <form action="" class="ml-4 mt-4" method="GET">
                    <button type="submit" class="btn-alert">Editar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>
