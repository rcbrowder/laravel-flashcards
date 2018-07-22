<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DecksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('decks')->insert([
    		'name' => 'Games',
    		'user_id' => 3,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);
    }
}
