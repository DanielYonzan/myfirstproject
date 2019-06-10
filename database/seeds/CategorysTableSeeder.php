<?php

use Illuminate\Database\Seeder;

class CategorysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<10;$i++) {
            DB::table('categorys')->insert([
                'name' => $i.Str::random(10),
                'slug' => $i.Str::random(10),
                'rank' => rand(1,500),
                'description' => $i.Str::random(10)
            ]);
        }
    }
}
