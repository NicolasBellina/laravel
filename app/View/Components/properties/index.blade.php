<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Liste des boxs</h1>
            <a href="{{ route('properties.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">
                Ajouter un box
            </a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Titre</th>
                    <th class="py-2 px-4 border-b">Prix</th>
                    <th class="py-2 px-4 border-b">Superficie (m²)</th>
                    <th class="py-2 px-4 border-b">Volume (m³)</th>
                    <th class="py-2 px-4 border-b">Nombre de chambres</th>
                    <th class="py-2 px-4 border-b">Nombre de salles de bain</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @if($properties->isEmpty())
                    <tr>
                        <td colspan="7" class="py-2 px-4 border-b text-center">Aucune propriété disponible.</td>
                    </tr>
                @else
                    @foreach($properties as $property)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $property->title }}</td>
                            <td class="py-2 px-4 border-b">{{ $property->price }} €</td>
                            <td class="py-2 px-4 border-b">{{ $property->area_m2 }} m²</td>
                            <td class="py-2 px-4 border-b">{{ $property->volume_m3 }} m³</td>
                            <td class="py-2 px-4 border-b">{{ $property->bedrooms }}</td>
                            <td class="py-2 px-4 border-b">{{ $property->bathrooms }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('properties.edit', $property) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg mr-2 text-sm">
                                    <i class="fas fa-edit mr-1"></i>Modifier
                                </a>
                                <form action="{{ route('properties.destroy', $property) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
                                        <i class="fas fa-trash-alt mr-1"></i>Supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>