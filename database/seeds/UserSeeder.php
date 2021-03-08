<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            User::create([
                'name' => 'Super User',
                'email' => 'superuser@mail.com',
                'password' => bcrypt('superuser')
            ]);
        });
    }
}
