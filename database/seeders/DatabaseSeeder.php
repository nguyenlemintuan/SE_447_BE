<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $this->call([
            AdminAccountSeeder::class,
            DanhMucSeeder::class,
            ProductsSeeder::class,
            VoucherSeeder::class,
            CustomerSeeder::class,
            OrdersSeeder::class,
            OrderItemSeeder::class,
            ReviewSeeder::class,
            DuLieuChatSeeder::class,
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
