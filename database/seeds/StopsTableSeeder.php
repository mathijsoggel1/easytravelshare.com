<?php

use Illuminate\Database\Seeder;

class StopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stops')->insert([
            'user_id' => '1',
            'name' => 'Amsterdam',
            'countrycode' => 'NL',
            'arrival' => '2018-9-1',
            
        ]);
        DB::table('stops')->insert([
            'user_id' => '1',
            'name' => 'Taghazout',
            'countrycode' => 'MA',
            'arrival' => '2018-9-1',
            
        ]);
        
        DB::table('stops')->insert([
            'user_id' => '2',
            'name' => 'Leaving home',
            'countrycode' => 'NL',
            'arrival' => '2019-2-16',
            
        ]);
        
        DB::table('stops')->insert([
            'user_id' => '2',
            'name' => 'Layover',
            'countrycode' => 'SG',
            'arrival' => '2019-2-17',
            
        ]);
        
        DB::table('stops')->insert([
            'user_id' => '2',
            'name' => 'Jakarta & Bali',
            'countrycode' => 'ID',
            'arrival' => '2019-2-19',
            
        ]);
        
        DB::table('stops')->insert([
            'user_id' => '2',
            'name' => 'Vietnam',
            'countrycode' => 'VN',
            'arrival' => '2019-3-06',
            
        ]);
        
        DB::table('stops')->insert([
            'user_id' => '2',
            'name' => 'Bangkok',
            'countrycode' => 'TH',
            'arrival' => '2019-3-19',
            
        ]);
        
        DB::table('stops')->insert([
            'user_id' => '2',
            'name' => 'Back to home',
            'countrycode' => 'NL',
            'arrival' => '2019-3-23',
            
        ]);
    }
}
