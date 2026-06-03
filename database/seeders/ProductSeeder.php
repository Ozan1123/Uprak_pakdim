<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID kategori secara dinamis dari database untuk menghindari error foreign key
        $fashionId = \App\Models\Category::where('slug', 'fashion')->value('id');
        $olahragaId = \App\Models\Category::where('slug', 'olahraga')->value('id');
        $dekorasiId = \App\Models\Category::where('slug', 'dekorasi')->value('id');
        $elektronikId = \App\Models\Category::where('slug', 'elektronik')->value('id');

        Product::insert([
            [
                'category_id' => $fashionId,
                'name' => 'Cardigan',
                'slug' => 'cardigan',
                'description' => 'Cardigan rajut korean style',
                'price' => 185000,
                'stock' => 15,
                'is_active' => 1
            ],
            [
                'category_id' => $fashionId,
                'name' => 'Tas Shoulder',
                'slug' => 'tas-shoulder',
                'description' => 'Tas wanita shoulder bag',
                'price' => 240000,
                'stock' => 10,
                'is_active' => 1
            ],
            [
                'category_id' => $olahragaId,
                'name' => 'Yoga Mat Pastel',
                'slug' => 'yoga-mat-pastel',
                'description' => 'Matras yoga anti slip',
                'price' => 120000,
                'stock' => 20,
                'is_active' => 1
            ],
            [
                'category_id' => $olahragaId,
                'name' => 'Tumbler Gym',
                'slug' => 'tumbler-gym',
                'description' => 'Botol minum olahraga',
                'price' => 75000,
                'stock' => 25,
                'is_active' => 1
            ],
            [
                'category_id' => $dekorasiId,
                'name' => 'Lampu Tidur',
                'slug' => 'lampu-tidur',
                'description' => 'Lampu tidur warm white',
                'price' => 95000,
                'stock' => 12,
                'is_active' => 1 
            ],
            [
                'category_id' => $dekorasiId,
                'name' => 'Cermin',
                'slug' => 'cermin',
                'description' => 'Cermin dekorasi kamar',
                'price' => 210000,
                'stock' => 8,
                'is_active' => 1
            ],
            [
                'category_id' => $elektronikId,
                'name' => 'Televisi',
                'slug' => 'televisi',
                'description' => 'Televisi LED 32 inch',
                'price' => 350000,
                'stock' => 18,
                'is_active' => 1
            ],
            [
                'category_id' => $elektronikId,
                'name' => 'Laptop Asus',
                'slug' => 'laptop-asus',
                'description' => 'Laptop gaming dengan spesifikasi tinggi',
                'price' => 15000000,
                'stock' => 5,
                'is_active' => 1
            ],
            [
                'category_id' => $elektronikId,
                'name' => 'Power Bank',
                'slug' => 'power-bank',
                'description' => 'Power bank kapasitas besar untuk pengisian cepat',
                'price' => 150000,
                'stock' => 30,
                'is_active' => 1
            ]
        ]);
    }
}
