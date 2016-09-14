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
                'email' => 'contato@iprovida.org.br',
                'password' => \Hash::make('@lbz2316')
            ]
        ];

        foreach($users as $user) {
            \App\User::create($user);
        }
        
    }
}
