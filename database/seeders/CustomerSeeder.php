<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('customers')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('customers')->insert([
            [
                'ho_va_ten' => 'Nguyễn Văn A',
                'email' => 'customer1@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0901111111',
                'dia_chi' => 'Ha Noi',
                'ngay_sinh' => '2000-05-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ho_va_ten' => 'Trần Thị B',
                'email' => 'customer2@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0902222222',
                'dia_chi' => 'TP HCM',
                'ngay_sinh' => '1999-08-21',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ho_va_ten' => 'Lê Văn C',
                'email' => 'customer3@gmail.com',
                'password' => '123456',
                'so_dien_thoai' => '0903333333',
                'dia_chi' => 'Da Nang',
                'ngay_sinh' => '2001-02-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
