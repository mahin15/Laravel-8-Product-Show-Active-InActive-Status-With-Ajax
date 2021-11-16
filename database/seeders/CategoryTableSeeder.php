<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryRecord=[
            ['id'=>1,'parent_id'=>0,'section_id'=>1,'name'=>'T shirt','image'=>'',
            'discount'=>0,'description'=>'T Shirt','url'=>'t-shirt',
            'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],

            ['id'=>2,'parent_id'=>1,'section_id'=>1,'name'=>'Casual T shirt','image'=>'',
            'discount'=>0,'description'=>'Casual T Shirt','url'=>'casual-t-shirt',
            'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1],

            ['id'=>3,'parent_id'=>1,'section_id'=>1,'name'=>'Formal T shirt','image'=>'',
            'discount'=>0,'description'=>'Formal T Shirt','url'=>'formal-t-shirt',
            'meta_title'=>'','meta_description'=>'','meta_keywords'=>'','status'=>1]
        ];
        Category::insert($categoryRecord);
    }
}
