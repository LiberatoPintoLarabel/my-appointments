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
        'name' => 'Paciente test',
        'email' => 'patient@programasymas.com',
        'password' => bcrypt('123123'), // password
        'role' => 'patient'

        ]); 

         User::create([
        'name' => 'Médico Test',
        'email' => 'doctor@programasymas.com',
        'password' => bcrypt('123123'), // password
        'role' => 'doctor'
        ]);

        factory(User::class, 50)->states('patient')->create();
    }
}
