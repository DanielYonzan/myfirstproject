<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<11;$i++) {
            DB::table('users')->insert([
                'name' => $i.Str::random(10),
                'email' => $i.Str::random(10) . '@gmail.com',
                'password' => bcrypt('secret'),
            ]);
        }
    }
}
