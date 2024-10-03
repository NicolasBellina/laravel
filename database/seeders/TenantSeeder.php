<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tenant::create([
            'property_id' => 1, // Assurez-vous que cette propriété existe
            'name' => 'John Doe',
            'phone' => '1234567890',
            'email' => 'john@example.com',
            'address' => '123 Main St',
            'bank_account' => 'FR7612345678901234567890123',
        ]);
    }
}
