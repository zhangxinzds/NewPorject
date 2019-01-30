<?php

use Illuminate\Database\Seeder;

class UserAddSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	for ($i=0; $i < 5; $i++) { 
	         DB::table('user')->insert([
	            'name' => str_random(10),
	            'password' => Hash::make('123456'),
	            'header' => 'dfsladsfjlkafjdaklsfa',
	            'addtime' => time(),
	            'level' => '0',
	            'status' => '1',
	        ]);
    	}
    }
}
