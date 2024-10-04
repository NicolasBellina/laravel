<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-4">Détails du locataire</h1>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <p><strong>Nom:</strong> {{ $tenant->name }}</p>
                <p><strong>Téléphone:</strong> {{ $tenant->phone }}</p>
                <p><strong>Email:</strong> {{ $tenant->email }}</p>
                <p><strong>Adresse:</strong> {{ $tenant->address }}</p>
                <p><strong>Compte bancaire:</strong> {{ $tenant->bank_account }}</p>
                <p><strong>Propriété:</strong> {{ $tenant->property->title }}</p> <!-- Assurez-vous que la relation est définie -->
                <a href="{{ route('tenants.index') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg">Retour à la liste</a>
            </div>
        </div>
    </div>
</x-app-layout>
