<?php

use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\User::class)->create([
            'name' => 'jhonny de farias',
            'email' => 'admin@gmail.com',
            'password' => Hash::make("secret"),
            'admin' => true
        ]);

        factory(App\User::class)->create([
            'name' => 'cliente 1',
            'email' => 'cliente@gmail.com',
            'password' => Hash::make("secret"),
            'admin' => false
        ]);
    }
}
