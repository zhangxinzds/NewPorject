<?php

use Illuminate\Database\Seeder;
class GoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 	public function run()
    {
    	for ($i=0; $i < 20; $i++) { 
	        DB::table('goods')->insert([
	        	'tid' => '2',
	            'name' => str_random(10),
	            'price' => '100',
	            'prevprice' => '120',
	            'pic' => 'jsadklfjlkadsjfklasd.jpg',
	            'descr' => '描述描述描述描述',
	            'status' => '1',
	            'company' => '苹果',
	            'stock' => '100',
	            'sale' => '10000',
	            'addtime' => '3423423',
	        ]);
        }	
    }
}
