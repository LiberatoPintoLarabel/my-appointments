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
        'cedula' => '4200117',
        'address' => '',
        'phone' => '',
        'role' => 'admin'
		]);
        factory(User::class, 50)->create();
    }
}
