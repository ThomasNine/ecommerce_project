<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name'=>'userone',
            'email'=>'userone@a.com',
            'password'=>Hash::make('password')
        ]);
        Admin::create([
            'name'=>'admin',
            'email'=>'admin@a.com',
            'password'=>Hash::make('password')
        ]);
        $category =['T shirt','Hat','Electronic','Mobile','Earphone'];
        foreach ($category as $a) {
            Category::create([
                'slug'=> Str::slug($a),
                'name'=>$a,
                'mm_name'=>'မြန်မာ',
                'image'=>'category.jpg'
            ]);
        }
        $brand =['Apple','Samsung','Huawei'];
        foreach ($brand as $a) {
            Brand::create([
                'slug'=> Str::slug($a),
                'name'=>$a,
            ]);
        }
        $color =['Red','Green','Blue','Black'];
        foreach ($color as $a) {
            Color::create([
                'slug'=> Str::slug($a),
                'name'=>$a,
            ]);
        }
        $supplier =['Mg Mg','Aung','Ko Ko','Ko Black'];
        foreach ($supplier as $a) {
        Supplier::create([
            'slug'=>Str::slug($a),
            'name'=>$a,
            'image'=>'supplier.png',
        ]);
    }
    }
}
