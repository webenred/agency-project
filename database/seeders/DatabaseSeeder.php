<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();
        // \App\Models\Hotel::factory(100)->create();
        // $agence = \App\Models\Agency::find(1);
        // $agence->coordinates()->create([
        //     'name' => 'Siége Social',
        //     'coordinates' => json_encode([
        //         'phone' => '+213 770638523',
        //         'email' => 'contact@best-tour.dz'
        //     ]),
        //     'address' => '67 rue mohemed cheraga',
        //     'city' => 'Alger,' . ' Algérie',
        //     'zip' => '16002'
        // ]);

        // $agence->coordinates()->create([
        //     'name' => 'Agence Oran',
        //     'coordinates' => json_encode([
        //         'phone' => '+213 770638753',
        //         'email' => 'commercial-oran@best-tour.dz'
        //     ]),
        //     'address' => '02 rue ltam bark',
        //     'city' => 'les Andalous,' . ' Oran',
        //     'zip' => '31089'
        // ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
