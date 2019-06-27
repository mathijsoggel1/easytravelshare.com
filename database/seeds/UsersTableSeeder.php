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
        DB::table('users')->insert([
	        'id' => '1',
            'name' => 'mathijsoggel',
            'bio' =>"This page will be a central hub for all my travel related content. The list on the left shows where i'm currently at and on the right is an overview of all travel related blog posts. I will update this page with more content and stories while i'm traveling :)",
            'email' => 'mathijsoggel@gmail.com',
            'trip_name' => 'Digital nomad try-out',
            'trip_start' => '2018-09-01',
            'trip_end' => '2018-11-03',
            'avatar' => 'me.jpg',
            'instagram' => 'mathijs.oggel',
            'password' => bcrypt('test'),
            'is_private' => 0,
            'is_premium' => 0,
        ]);
        
        DB::table('users')->insert([
	        'id' => '2',
            'name' => 'jane-doe',
            'bio' =>"During this trip i went to some cool places in SE asia. This will be my second trip as a solo traveler and i'm looking forward to it! First i will travel to Jakarta via a 2 day stopover in Singapore. After exploring Indonesia, Vietnam is the next destination. With a short visit to Bangkok after Vietnam i plan to fly back home at the end of march",
            'email' => 'jane-doe@gmail.com',
            'trip_name' => 'Backpacking across asia ',
            'trip_start' => '2019-02-16',
            'trip_end' => '2019-03-31',
            'avatar' => 'jd-pf.png',
            'instagram' => 'instagram',
            'password' => bcrypt('test'),
            'is_private' => 0,
            'is_premium' => 1,
        ]);
    }
}
