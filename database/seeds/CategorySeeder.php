<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Featured', 'Protest', 'Crackdown', 'Violence', 'Death', 'War Victims'];
        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
