<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdminAccountSeeder extends Seeder
{
    public function run(): void
    {

        // Xóa sạch dữ liệu cũ
        DB::table('admin_accounts')->truncate();


        DB::table('admin_accounts')->insert([
            [
                'email' => 'cong@master.com',
                'ho_va_ten' => 'Trần Nguyễn Minh Công',
                'password' => '123456',
                'so_dien_thoai' => '0901234567',
                'dia_chi' => '180 Cao Lỗ, Phường 4, Quận 8, TP.HCM',
                'ngay_sinh' => '1990-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'tuan@master.com',
                'ho_va_ten' => 'Nguyễn Lê Minh Tuấn',
                'password' => '123456',
                'so_dien_thoai' => '0912345678',
                'dia_chi' => '12 Nguyễn Trãi, Quận 5, TP.HCM',
                'ngay_sinh' => '1992-03-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'email' => 'tai@master.com',
                'ho_va_ten' => 'Nguyễn Văn Tài',
                'password' => '123456',
                'so_dien_thoai' => '0934567890',
                'dia_chi' => '45 Lê Lợi, Quận 1, TP.HCM',
                'ngay_sinh' => '1995-07-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
