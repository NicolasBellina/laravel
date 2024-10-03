<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">Liste des boxs</h1>
                    <a href="{{ route('properties.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg">
                        Ajouter un box
                    </a>
                    
                    <table class="min-w-full">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Titre</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Prix</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Superficie (m²)</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Volume (m³)</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($properties as $property)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $property->title }}</td>
                                    <td class="py-2 px-4 border-b">{{ $property->price }} €</td>
                                    <td class="py-2 px-4 border-b">{{ $property->area_m2 }} m²</td>
                                    <td class="py-2 px-4 border-b">{{ $property->volume_m3 }} m³</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('properties.edit', $property) }}" class="text-blue-600 hover:text-blue-900 mr-2">Modifier</a>
                                        <form action="{{ route('properties.destroy', $property) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bien ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>