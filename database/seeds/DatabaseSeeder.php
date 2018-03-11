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

        // Creamos un usuario con unos datos concretos
        DB::table('users')->insert([
            'name' => 'Jesús Navarro',
            'username' => 'jmnavarro',
            'email' => 'jesmanapa@gmail.com',
            'password' => bcrypt('admin')
        ]);

        DB::table('users')->insert([
            'name' => 'Carlos Barrero',
            'username' => 'cbarrero',
            'email' => 'informatica@interhanse.com',
            'password' => bcrypt('admin')
        ]);

        //Rellenamos la tabla con 3 usuarios más aleatorios
        factory(App\User::class, 3)->create();

        //Leemos el fichero con las frases y las metemos en la BD asignándole un usuario aleatorio
        $archivo = fopen(url('/biblioteca/contenido.txt'),'r');

        while ($linea = fgets($archivo)) {
            DB::table('texts')->insert([
                'user_id' => rand(1, 5),
                'text' => utf8_encode($linea)
            ]);
        }

        fclose($archivo);
    }
}
