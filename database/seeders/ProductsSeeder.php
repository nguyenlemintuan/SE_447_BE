<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('products')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('products')->insert([

            [
                'title' => 'iPhone 15 Pro Max',
                'slug' => 'iphone-15-pro-max',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg',
                'price' => 2000,
                'quantity' => 50,
                'brand' => 'Apple',
                'description' => 'Flagship Apple chip A17 Pro.',
                'specs' => json_encode(['storage' => '256GB', 'ram' => '8GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'iPhone 14 Pro',
                'slug' => 'iphone-14-pro',
                'images' => 'https://product.hstatic.net/1000329106/product/vang_c027cbfba10f4613a57747e6b03f65c2_master.jpg',
                'price' => 26990000,
                'quantity' => 40,
                'brand' => 'Apple',
                'description' => 'Dynamic Island display.',
                'specs' => json_encode(['storage' => '128GB', 'ram' => '6GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'samsung-galaxy-s24-ultra',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/307174/samsung-galaxy-s24-ultra-5g-600x600.jpg',
                'price' => 31990000,
                'quantity' => 30,
                'brand' => 'Samsung',
                'description' => 'AI flagship phone.',
                'specs' => json_encode(['storage' => '256GB', 'ram' => '12GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Samsung Galaxy S23',
                'slug' => 'samsung-galaxy-s23',
                'images' => 'https://sonpixel.vn/wp-content/uploads/2024/04/s23-ultra-5g-xanh.webp',
                'price' => 18990000,
                'quantity' => 45,
                'brand' => 'Samsung',
                'description' => 'Compact flagship.',
                'specs' => json_encode(['storage' => '128GB', 'ram' => '8GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Xiaomi 14',
                'slug' => 'xiaomi-14',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-14-pre-xanh-la.png',
                'price' => 20990000,
                'quantity' => 60,
                'brand' => 'Xiaomi',
                'description' => 'Snapdragon 8 Gen 3.',
                'specs' => json_encode(['storage' => '256GB', 'ram' => '12GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Xiaomi Redmi Note 13',
                'slug' => 'redmi-note-13',
                'images' => 'https://product.hstatic.net/200000547251/product/13-5g-xanh_14c991e3fcfd43c0a054c80dec71fbcb.png',
                'price' => 5490000,
                'quantity' => 80,
                'brand' => 'Xiaomi',
                'description' => 'Budget performance.',
                'specs' => json_encode(['storage' => '128GB', 'ram' => '6GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'iPhone 13',
                'slug' => 'iphone-13',
                'images' => 'https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/2021_9_15_637673230231791121_iphone-13-mini-den-1.jpg',
                'price' => 14990000,
                'quantity' => 70,
                'brand' => 'Apple',
                'description' => 'Still powerful.',
                'specs' => json_encode(['storage' => '128GB', 'ram' => '4GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Samsung Galaxy A54',
                'slug' => 'samsung-galaxy-a54',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/250103/samsung-galaxy-a54-thumb-den-600x600.jpg',
                'price' => 9990000,
                'quantity' => 65,
                'brand' => 'Samsung',
                'description' => 'Mid-range bestseller.',
                'specs' => json_encode(['storage' => '128GB', 'ram' => '8GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Xiaomi Poco X6',
                'slug' => 'poco-x6',
                'images' => 'https://cdn2.cellphones.com.vn/x/media/catalog/product/x/i/xiaomi-poco-x6-5g-8gb-256gb-1_2.png',
                'price' => 7990000,
                'quantity' => 75,
                'brand' => 'Xiaomi',
                'description' => 'Gaming budget.',
                'specs' => json_encode(['storage' => '256GB', 'ram' => '8GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'iPhone 12',
                'slug' => 'iphone-12',
                'images' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/401/951/products/dac-diem-noi-bat-802c0b8d-459b-463b-a261-aaf344fced51.png?v=1729563297810',
                'price' => 11990000,
                'quantity' => 55,
                'brand' => 'Apple',
                'description' => 'OLED display.',
                'specs' => json_encode(['storage' => '64GB', 'ram' => '4GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Samsung Galaxy Z Flip5',
                'slug' => 'z-flip5',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/feature/164698402/vn-feature-galaxy-z-flip5-f731-537756342?$FB_TYPE_A_MO_JPG$',
                'price' => 21990000,
                'quantity' => 25,
                'brand' => 'Samsung',
                'description' => 'Foldable style.',
                'specs' => json_encode(['storage' => '256GB', 'ram' => '8GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Xiaomi 13T',
                'slug' => 'xiaomi-13t',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/309814/xiaomi-13-t-xanh-duong-thumb-thumb-600x600.jpg',
                'price' => 12990000,
                'quantity' => 50,
                'brand' => 'Xiaomi',
                'description' => 'Leica camera.',
                'specs' => json_encode(['storage' => '256GB', 'ram' => '12GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Samsung Galaxy S22',
                'slug' => 'galaxy-s22',
                'images' => 'https://cdn2.fptshop.com.vn/unsafe/512x0/filters:format(webp):quality(75)/2022_2_10_637800490165751486_samsung-galaxy-s22-xanh-1.jpg',
                'price' => 13990000,
                'quantity' => 35,
                'brand' => 'Samsung',
                'description' => 'Flagship compact.',
                'specs' => json_encode(['storage' => '128GB', 'ram' => '8GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'iPhone SE 2022',
                'slug' => 'iphone-se-2022',
                'images' => 'https://cdn.phuckhangmobile.com/image/iphone-se-2022-midnight-26886j.jpg',
                'price' => 8990000,
                'quantity' => 60,
                'brand' => 'Apple',
                'description' => 'Small but powerful.',
                'specs' => json_encode(['storage' => '64GB', 'ram' => '4GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],

            [
                'title' => 'Poco F5',
                'slug' => 'poco-f5',
                'images' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyZGCiJ8WskZOcnwjPB6e-RSbmWgFJ-PhJfw&s',
                'price' => 9990000,
                'quantity' => 58,
                'brand' => 'Xiaomi',
                'description' => 'Gaming monster.',
                'specs' => json_encode(['storage' => '256GB', 'ram' => '12GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy A14',
                'slug' => 'galaxy-a14',
                'images' => 'https://product.hstatic.net/1000063620/product/samsung-galaxy-a14-4g-do_d7155cb9e25f4646b489222309129bd1_1024x1024.jpg',
                'price' => 4990000,
                'quantity' => 100,
                'brand' => 'Samsung',
                'description' => 'Affordable choice.',
                'specs' => json_encode(['storage' => '128GB', 'ram' => '4GB']),
                'warranty' => 12,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}