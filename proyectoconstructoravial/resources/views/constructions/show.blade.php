<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obras</title>
    <style>
        .grid-container {
            display: grid;
            align-items: start;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            padding: 2rem;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 1.5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card.active {
            background-color: #d1fae5;
        }

        .card.inactive {
            background-color: #f3f4f6;
        }

        .card h2 {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card p {
            margin-bottom: 0.3rem;
            font-size: 0.95rem;
            color: #374151; 
        }

        .btn-info {
            background-color: #2196f3;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-info:hover {
            background-color: #1976d2;
        }

        .btn-warning {
            background-color: #f44336;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }
        .btn-warning:hover {
            background-color: #d32f2f;
        }

        
        .activeh1 {
            color: #d1fae5;       
            cursor: pointer;
            display: inline-block;
            margin-right: 0.5rem;
            font-size: 1.8rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <h1 class="text-2xl font-semibold text-center text-white mb-8" style="margin-top: 3rem; font-size: 2.5rem;">
                Obras
            </h1>    
            <div class="text-2xl font-semibold text-center text-white" style="margin-top: 1rem;" >
                <div class="flex justify-center mb-4" style="font-size: 3rem;">
                    <span class="activeh1">Activas</span>
                </div>
            </div>
            <div class="grid-container">
                @forelse($constructions as $construction)
                    <div class="card"
                         data-start="{{ $construction->dateStart->format('Y-m-d') }}"
                         data-end="{{ $construction->dateFinish->format('Y-m-d') }}"
                    >
                        <h2>{{ $construction->name }}</h2>
                        <p>Inicio: {{ $construction->dateStart->format('d/m/Y') }}</p>
                        <p>Fin:    {{ $construction->dateFinish->format('d/m/Y') }}</p>
                        <p>Provincia: {{ $construction->province->name ?? 'Sin provincia' }}</p>

                        <div class="flex items-center justify-end gap-2 ">
                            <form action="{{ route('constructions.info', $construction->id) }}" method="GET">
                                    <button type="submit" class="btn-info">Ver</button>
                            </form>

                            <form action="{{ route('constructions.destroy', $construction->id) }}" method="POST" onsubmit="return confirm('¿Seguro que querés eliminar esta obra?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-warning">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 col-span-full">
                        No hay obras registradas.
                    </p>
                @endforelse
            </div>
        </div>
    </x-app-layout>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const today = new Date();
            today.setHours(0, 0, 0, 0);

            document.querySelectorAll('.card').forEach(card => {
                const startDate = new Date(card.getAttribute('data-start'));
                const endDate   = new Date(card.getAttribute('data-end'));

                if (startDate <= today && today < endDate) {
                    card.classList.add('active');
                } else {
                    card.classList.add('inactive');
                }
            });

            document.querySelector('.activeh1').addEventListener('click', () => {
                document.querySelectorAll('.card').forEach(card => {
                    if (card.classList.contains('active')) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    </script>
</body>
</html>
