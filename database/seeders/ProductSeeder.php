<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            ['code' => 'FDD0001', 'category_id' => 1, 'name' => 'Nivea Men Cool Kick', 'unit' => 'pcs', 'stock' => 100, 'price' => 20000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/1f/ca/32/1fca321cf8d3596c2440bb4391da0b47.jpg'],
            ['code' => 'FDD0002', 'category_id' => 1, 'name' => 'Pepsodent Action', 'unit' => 'pcs', 'stock' => 150, 'price' => 18000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/b4/c2/e9/b4c2e9ea1ebf67cd8fd6b212147c0301.jpg'],
            ['code' => 'DRK0001', 'category_id' => 2, 'name' => 'Qtela Barbeque 185 Gram', 'unit' => 'pcs', 'stock' => 200, 'price' => 10000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/69/74/ae/6974ae1066316cbb2bdcccbf391702d8.jpg'],
            ['code' => 'DRK0002', 'category_id' => 2, 'name' => 'Cimory Yogurt drink bluberry', 'unit' => 'pcs', 'stock' => 180, 'price' => 12000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/18/c3/08/18c308b46a43c4fbe9a1ee3ee38c1f79.jpg'],
            ['code' => 'SKC0001', 'category_id' => 3, 'name' => 'Glow Recipe AHA Night treatment', 'unit' => 'pcs', 'stock' => 120, 'price' => 95500.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/af/e0/a1/afe0a1724c8ae64ce2a7e7c8f6373f20.jpg'],
            ['code' => 'SKC0002', 'category_id' => 3, 'name' => 'Tree Hut Watermelon', 'unit' => 'pcs', 'stock' => 130, 'price' => 63000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/0b/86/81/0b86811f01215adcb4f01ef982c359ea.jpg'],
            ['code' => 'FDD0003', 'category_id' => 1, 'name' => 'Pop Mie mini ayam bawang', 'unit' => 'set', 'stock' => 50, 'price' => 25000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/91/3f/fc/913ffc82c08b7170d5a1f85fcc19acd1.jpg'],
            ['code' => 'FDD0004', 'category_id' => 1, 'name' => 'Chitato Sapi Panggang', 'unit' => 'set', 'stock' => 60, 'price' => 13000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/a9/3e/4a/a93e4aa6870d972f895522cee3627c38.jpg'],
            ['code' => 'DRK0003', 'category_id' => 2, 'name' => 'Le Mineral', 'unit' => 'pcs', 'stock' => 140, 'price' => 3500.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/52/c7/9d/52c79dee506694318cad896e0873548b.jpg'],
            ['code' => 'DRK0004', 'category_id' => 2, 'name' => 'Teh Pucuk Harum', 'unit' => 'pcs', 'stock' => 200, 'price' => 3500.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/b9/c5/98/b9c598f981ef226a5a316484f07192aa.jpg'],
            ['code' => 'SKC0003', 'category_id' => 3, 'name' => 'Garnier Micellar cleansing water', 'unit' => 'litre', 'stock' => 300, 'price' => 32000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/67/32/89/673289b5655aa10532f6354b244603e4.jpg'],
            ['code' => 'SKC0004', 'category_id' => 3, 'name' => 'Nivea Smoothness lip care', 'unit' => 'litre', 'stock' => 150, 'price' => 40000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/b3/b4/ba/b3b4ba6c778225bb3d06393049576f07.jpg'],
            ['code' => 'FDD0005', 'category_id' => 1, 'name' => 'Chiki Balls cheese', 'unit' => 'box', 'stock' => 90, 'price' => 10000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/90/e2/ab/90e2ab05cf221f413d021f1af789eae2.jpg'],
            ['code' => 'FDD0006', 'category_id' => 1, 'name' => 'Pocky Strawberry', 'unit' => 'box', 'stock' => 100, 'price' => 14000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/8c/01/94/8c0194f224b547503d92dd6434518e43.jpg'],
            ['code' => 'DRK0005', 'category_id' => 2, 'name' => 'Mogu-mogu Peach', 'unit' => 'set', 'stock' => 200, 'price' => 9000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/94/66/06/9466068879ae6a4faaea2f4c6f5f8644.jpg'],
            ['code' => 'DRK0006', 'category_id' => 2, 'name' => 'Yakult', 'unit' => 'pack', 'stock' => 150, 'price' => 20000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/38/ad/6a/38ad6a0b25595a373d96f7793d761f84.jpg'],
            ['code' => 'SKC0005', 'category_id' => 3, 'name' => 'Vaseline lip therapy rosy lips', 'unit' => 'pcs', 'stock' => 250, 'price' => 45500.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/18/af/f6/18aff64021af7c7bd2db04df21403879.jpg'],
            ['code' => 'SKC0006', 'category_id' => 3, 'name' => 'Nivea sun protect and hidrate', 'unit' => 'pcs', 'stock' => 200, 'price' => 37000.00,'store_id' => 1, 'image_url' => 'https://i.pinimg.com/736x/7b/55/95/7b559545f63c0a9b61a687e721aa7130.jpg'],
        ]);
    }
}
