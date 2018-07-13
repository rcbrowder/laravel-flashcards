<?php

use Illuminate\Database\Seeder;

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
            'term' => 'Mitochondria',
            'definition' => 'The powerhouse of the cell.'
        ]);

        DB::table('cards')->insert([
            'term' => 'I am.',
            'definition' => 'Who is an absolute genius?'
        ]);
    }
}
