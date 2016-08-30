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
        $users = [
            [
                'name' => 'Luiz Henrique',
                'email' => 'luizhrqas@gmail.com',
                'password' => \Hash::make('relogio123')
            ]
        ];

        foreach($users as $user) {
            \App\User::create($user);
        }
        
    }
}
