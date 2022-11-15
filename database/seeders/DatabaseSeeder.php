<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('usuarios')->insert([
            'nome'=>'JefersonAdmin',
            'password'=>Hash::make(927769899367),
            'admin'=>true
        ]);
        DB::table('usuarios')->insert([
            'nome'=>'visitante',
            'password'=>Hash::make('visitante'),
            'admin'=>false
        ]);
    }
}
