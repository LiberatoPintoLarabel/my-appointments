<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name' => 'Juan Ramos',
        'email' => 'hola@programasymas.com',
        'password' => bcrypt('123123'), // password
        'role' => 'admin'
		]);

         User::create([
        'name' => 'Paciente 1',
        'email' => 'patient@programasymas.com',
        'password' => bcrypt('123123'), // password
        'role' => 'patient'

        ]); 

         User::create([
        'name' => 'Médico 1',
        'email' => 'doctor@programasymas.com',
        'password' => bcrypt('123123'), // password
        'role' => 'doctor'
        ]);

        factory(User::class, 50)->create();
    }
}
