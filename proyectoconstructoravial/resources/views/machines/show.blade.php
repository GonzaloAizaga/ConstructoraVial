<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Máquinas</title>
    <style>

        .btn-warning {
            background-color: #f44336;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.1s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .btn-warning:hover {
            background-color: #d32f2f;
            transform: scale(1.03);
        }

        .btn-warning:active {
            transform: scale(0.98);
        }

        .table-custom {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }

        .table-custom th,
        .table-custom td {
            border: 1px solid #ccc;
            padding: 12px 16px;
            text-align: left;
        }

        .table-custom thead {
            background-color: #4CAF50;
            color: white;
        }

        .table-custom tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table-custom tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
            padding: 10px 18px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background-color 0.3s ease, transform 0.1s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        .btn-success:hover {
            background-color: #218838;
            transform: scale(1.03);
        }

        .btn-success:active {
            transform: scale(0.97);
        }

        .btn-info {
    background-color: #2196f3;
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
}

    .btn-info:hover {
        background-color: #1976d2;
        transform: scale(1.03);
    }

    .btn-info:active {
        transform: scale(0.97);
    }

    </style>
</head>
<body>

  <x-app-layout>
    
    <div class="flex justify-center items-start bg-transparent py-10">
        <div class="w-full max-w-4xl p-6 shadow-md">
            <h1 class="text-2xl font-semibold text-center mb-6 text-white">Máquinas Registradas</h1>
            <div style="display: flex; justify-content: flex-end; margin-bottom: 16px;">
                <a href="{{ route('machines.create')}}" class="btn-success">
                 + Agregar Máquina
                </a>
            </div>
            
            <p id="no-data-message" class="text-center font-medium text-gray-400 text-lg" style="display: none;">
            No se han registrado máquinas.
            </p>


            <table id="machines-table" class="table-custom min-w-full table-auto border-collapse">
                <thead>
                    <tr class="bg-green-500 text-black text-center"> 
                        <th class="py-3 px-6 text-left">ID</th>
                        <th class="py-3 px-6 text-left">Número de serie</th>
                        <th class="py-3 px-6 text-left">Tipo de Máquina</th>
                        <th class="py-3 px-6 text-left">Marca</th>
                        <th class="py-3 px-6 text-left">Kilómetros</th>
                        <th class="py-3 px-6 text-left">Fecha de Registro</th>
                        <th class="py-3 px-6 text-left">Acciones</th> 
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($machines as $machine)
                        <tr class="border-b">
                            <td class="py-3 px-6">{{ $machine->id }}</td>
                            <td class="py-3 px-6">{{ $machine->serial_number }}</td>
                            <td class="py-3 px-6">{{ $machine->machines_type->name }}</td>
                            <td class="py-3 px-6">{{ $machine->model }}</td>
                            <td class="py-3 px-6">{{ $machine->kilometers }}</td>
                            <td class="py-3 px-6">{{ $machine->created_at->format('d/m/Y') }}</td>
                            <td class="py-4 px-6 whitespace-nowrap">
                                <div class="flex items-center gap-2">
                                    
                                    <form action="{{ route('machines.info', $machine->id) }}" class="btn-info" method="GET">
                                        <button type="submit">Info</button>
                                    </form>

                                    <form action="{{ route('machines.destroy', $machine->id) }}" method="POST" class="flex">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-warning" onclick="return confirm('¿Estás seguro de eliminar esta máquina?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const table = document.getElementById("machines-table");
    const message = document.getElementById("no-data-message");
    const tbody = table.querySelector("tbody");

    // Verifica si hay al menos una fila en el tbody
    const hasData = tbody.querySelectorAll("tr").length > 0;

    if (!hasData) {
      table.style.display = "none";
      message.style.display = "block";
    }
  });
</script>


</body>
</html>
