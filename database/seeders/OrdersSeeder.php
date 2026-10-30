<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class OrdersSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('orders')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('orders')->insert([

            [
                'ma_don_hang' => 'DH001',
                'hinh_anh' => 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg',
                'so_luong' => 1,
                'id_khach_hang' => 1,
                'id_voucher' => null,
                'ten_nguoi_nhan' => 'Nguyễn Văn A',
                'so_dien_thoai' => '0900000001',
                'tien_hang' => 34990000,
                'tong_tien' => 34990000,
                'is_thanh_toan' => 1,
                'tinh_trang' => 2 // đã giao
            ],

            [
                'ma_don_hang' => 'DH002',
                'hinh_anh' => 'https://product.hstatic.net/1000329106/product/vang_c027cbfba10f4613a57747e6b03f65c2_master.jpg',
                'so_luong' => 2,
                'id_khach_hang' => 1,
                'id_voucher' => null,
                'ten_nguoi_nhan' => 'Lê Văn B',
                'so_dien_thoai' => '0900000002',
                'tien_hang' => 53980000,
                'tong_tien' => 53980000,
                'is_thanh_toan' => 1,
                'tinh_trang' => 1 // đang giao
            ],

            [
                'ma_don_hang' => 'DH003',
                'hinh_anh' => 'https://cdn.tgdd.vn/Products/Images/42/307174/samsung-galaxy-s24-ultra-5g-600x600.jpg',
                'so_luong' => 1,
                'id_khach_hang' => 1,
                'id_voucher' => null,
                'ten_nguoi_nhan' => 'Nguyễn Văn C',
                'so_dien_thoai' => '0900000003',
                'tien_hang' => 31990000,
                'tong_tien' => 31990000,
                'is_thanh_toan' => 0,
                'tinh_trang' => 0 // đã hủy
            ],

            [
                'ma_don_hang' => 'DH004',
                'hinh_anh' => 'https://sonpixel.vn/wp-content/uploads/2024/04/s23-ultra-5g-xanh.webp',
                'so_luong' => 1,
                'id_khach_hang' => 1,
                'id_voucher' => null,
                'ten_nguoi_nhan' => 'Lê Văn B',
                'so_dien_thoai' => '0900000004',
                'tien_hang' => 18990000,
                'tong_tien' => 18990000,
                'is_thanh_toan' => 1,
                'tinh_trang' => 2
            ],

            [
                'ma_don_hang' => 'DH005',
                'hinh_anh' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-14-pre-xanh-la.png',
                'so_luong' => 3,
                'id_khach_hang' => 1,
                'id_voucher' => null,
                'ten_nguoi_nhan' => 'Lê Văn B',
                'so_dien_thoai' => '0900000005',
                'tien_hang' => 62970000,
                'tong_tien' => 62970000,
                'is_thanh_toan' => 1,
                'tinh_trang' => 1
            ],

        ]);
    }
}
