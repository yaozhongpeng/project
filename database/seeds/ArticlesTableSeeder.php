<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 向 articles 表填充数据
        for ($i=1; $i < 10; $i++) { 
        	DB::table('articles')->insert([
            	'title'=>str_random(10),
            	'descr'=>bcrypt('secret'),
                'thumb'=>'https://php217laravel.oss-cn-beijing.aliyuncs.com/1566175507.png',
                'editor'=>'admin'
            ]);
        }
    }
}
