<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Babak;

class BabakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            Babak::create([
                'name' => 'Wajib',
                'slug' => 'wajib'
            ], [
                'name' => 'Lemparan',
                'slug' => 'lemparan'
            ]);
        });
    }
}
