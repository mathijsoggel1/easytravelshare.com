<?php

use Illuminate\Database\Seeder;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title' => 'Travel plans',
            'content' =>"When everything goes according to plan I hope to finish my master study Information Sciences this summer. This will mean that my student life is over anymore from that moment and 'grown up life?' will start. But before diving into finding a job i have a plan that has been in the back of my head for more than 3 years and this is the right time to do it. 
<br><br>
In my freshman year at university I've read a blog post by a so called digital nomad. This is someone who doesn't live in a single place but instead travels the world while working remotely online. During that time i already had quite some experience with coding and building web apps so this lifestyle sounded like a dream to me. The freedom to live where you want while working online to support yourself seems great. 
<br><br>
But at the time i still had responsibilities that kept me here in Amsterdam, these included finishing my studies and my new passion, rowing. Both these two activities require a lot of discipline and structure to be completed successfully and therefore my plans to travel the world and finance it by working online stayed in the back of my head until now! During this winter I came to the realization that as of next summer I'm not bounded by my studies and that period in the year the rowing season is not a primary priority. So i seem to be presented with a unique opportunity to carry out this more than three year old plan of mine and i'm going to do so! While thinking about this I've set the goal for myself to leave Amsterdam for 2 or 3 months and visit more than 3 new countries I've never been to. I also want to finance the whole trip during the trip with online work while living out my backpack. This is a fun challenge for me and i'm excited to get started with this adventure. 
<br><br>
In order to finance the trip I plan to be working as a freelance web developer on projects for different clients. In order to do this legitimately i have registered a business at the dutch chamber of commerce. From now on I'm able to send invoices and my business is registered legally. On the contact page of this website this general business information can be found. So this means my shop is open! If you have a project for me, lets get in touch. 
<br><br>
During my trip I plan to use this blog to share my experiences with the world and write about things I learn along the way. The next months I'll start planning and preparing for the trip while finalizing my master thesis and racing at national regattas with rowing. Exiting times ahead!",
            'user_id' => '1',
            'headerimg' => 'post45.png',
            'created_at' => date("Y-m-d H:i:s"),
            
        ]);
        
        
        
        DB::table('posts')->insert([
            'title' => 'Travel plans',
            'content' =>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'user_id' => '2',
            'headerimg' => 'post45.png',
            'created_at' => date("Y-m-d H:i:s"),
            
        ]);
        
        DB::table('posts')->insert([
            'title' => 'In the air',
            'content' =>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'user_id' => '2',
            'headerimg' => 'jd2.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            
        ]);
        
        DB::table('posts')->insert([
            'title' => 'Two days in Singapore',
            'content' => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br><br> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'user_id' => '2',
            'headerimg' => 'jd3.jpg',
            'created_at' => date("Y-m-d H:i:s"),
            
        ]);
    }
}
