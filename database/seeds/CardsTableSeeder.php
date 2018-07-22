<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cards')->insert([
    		'term' => 'Euchre',
    		'definition' => 'A trick-taking card game played with standard playing cards',
            'deck_id' => 1,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);

        DB::table('cards')->insert([
    		'term' => 'Monopoly',
    		'definition' => 'A board game about buying and trading property',
            'deck_id' => 1,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);

    	DB::table('cards')->insert([
    		'term' => 'Baseball',
    		'definition' => 'A bat-and-ball game played between two opposing teams',
            'deck_id' => 1,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);

    	DB::table('cards')->insert([
    		'term' => 'Dungeons & Dragons',
    		'definition' => 'A roleplaying game set in a fantasy world',
            'deck_id' => 1,
    		'created_at' => Carbon::now(),
    		'updated_at' => Carbon::now()
    	]);
    }
}
