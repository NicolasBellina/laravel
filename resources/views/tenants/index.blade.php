<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Liste des locataires</h1>
            <a href="{{ route('tenants.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg">
                Ajouter un locataire
            </a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Nom</th>
                    <th class="py-2 px-4 border-b">Téléphone</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Adresse</th>
                    <th class="py-2 px-4 border-b">Compte bancaire</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tenants as $tenant)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $tenant->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->phone }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->address }}</td>
                        <td class="py-2 px-4 border-b">{{ $tenant->bank_account }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('tenants.edit', $tenant) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Modifier</a>
                            <form action="{{ route('tenants.destroy', $tenant) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>