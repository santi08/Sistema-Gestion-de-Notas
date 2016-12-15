<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_items')->insert([
            'nombre' => 'PARCIALES',
        ]);

        DB::table('tipo_items')->insert([
            'nombre' => 'TALLERES',
        ]);

        DB::table('tipo_items')->insert([
            'nombre' => 'QUICES',
        ]);

        DB::table('tipo_items')->insert([
            'nombre' => 'PROYECTOS',
        ]);

        DB::table('tipo_items')->insert([
            'nombre' => 'EXPOSICIONES',
        ]);

        DB::table('tipo_items')->insert([
            'nombre' => 'LABORATORIOS',
        ]);

         DB::table('tipo_items')->insert([
            'nombre' => 'OTROS',
        ]);
    }
}
