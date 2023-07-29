<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post')->insert([
            'title'=>Str::random(20),
            'description'=>" Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, consequuntur nulla cupiditate delectus laudantium debitis iste voluptate ducimus. Quas vitae error modi nemo voluptatibus reiciendis fugiat consectetur ab temporibus sit?
            ",
        ]);
    }
}
