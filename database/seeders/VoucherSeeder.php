<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class VoucherSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('vouchers')->truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('vouchers')->insert([

            [
                'ma_code' => 'SALE10',
                'ten_voucher' => 'Giảm 10%',
                'hinh_anh' => 'https://cdn.luatvietnam.vn/uploaded/Images/Original/2019/09/24/huong-dan-lap-hoa-don-chung-tu-khi-su-dung-voucher-phieu-qua-tang_2409145930.jpg',
                'thoi_gian_bat_dau' => now(),
                'thoi_gian_ket_thuc' => now(),
                'loai_giam' => 1,
                'so_giam_gia' => 10,
                'so_tien_toi_da' => 2000000,
                'don_hang_toi_thieu' => 5000000,
                'id_san_pham' => 1,
                'tinh_trang' => 1
            ],

            [
                'ma_code' => 'SALE500K',
                'ten_voucher' => 'Giảm 500K',
                'hinh_anh' => 'https://cdn.luatvietnam.vn/uploaded/Images/Original/2019/09/24/huong-dan-lap-hoa-don-chung-tu-khi-su-dung-voucher-phieu-qua-tang_2409145930.jpg',
                'thoi_gian_bat_dau' => now(),
                'thoi_gian_ket_thuc' => now(),
                'loai_giam' => 0,
                'so_giam_gia' => 500000,
                'so_tien_toi_da' => 500000,
                'don_hang_toi_thieu' => 10000000,
                'id_san_pham' => 1,
                'tinh_trang' => 1
            ],

            [
                'ma_code' => 'SALE20',
                'ten_voucher' => 'Giảm 20%',
                'hinh_anh' => 'https://cdn.luatvietnam.vn/uploaded/Images/Original/2019/09/24/huong-dan-lap-hoa-don-chung-tu-khi-su-dung-voucher-phieu-qua-tang_2409145930.jpg',
                'thoi_gian_bat_dau' => now(),
                'thoi_gian_ket_thuc' => now(),
                'loai_giam' => 1,
                'so_giam_gia' => 20,
                'so_tien_toi_da' => 4000000,
                'don_hang_toi_thieu' => 8000000,
                'id_san_pham' => 1,
                'tinh_trang' => 1
            ],

            [
                'ma_code' => 'SALE50',
                'ten_voucher' => 'Giảm 50%',
                'hinh_anh' => 'https://cdn.luatvietnam.vn/uploaded/Images/Original/2019/09/24/huong-dan-lap-hoa-don-chung-tu-khi-su-dung-voucher-phieu-qua-tang_2409145930.jpg',
                'thoi_gian_bat_dau' => now(),
                'thoi_gian_ket_thuc' => now(),
                'loai_giam' => 1,
                'so_giam_gia' => 50,
                'so_tien_toi_da' => 10000000,
                'don_hang_toi_thieu' => 20000000,
                'id_san_pham' => 1,
                'tinh_trang' => 1
            ],
            [
                'ma_code' => 'SALE100K',
                'ten_voucher' => 'Giảm 100K',
                'hinh_anh' => 'https://cdn.luatvietnam.vn/uploaded/Images/Original/2019/09/24/huong-dan-lap-hoa-don-chung-tu-khi-su-dung-voucher-phieu-qua-tang_2409145930.jpg',
                'thoi_gian_bat_dau' => now(),
                'thoi_gian_ket_thuc' => now(),
                'loai_giam' => 0,
                'so_giam_gia' => 100000,
                'so_tien_toi_da' => 100000,
                'don_hang_toi_thieu' => 2000000,
                'id_san_pham' => 1,
                'tinh_trang' => 1
            ],

        ]);
    }
}
