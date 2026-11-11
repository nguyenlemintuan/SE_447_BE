<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function getData(Request $request)
    {
        // Tính tổng số đơn hàng đã hoàn tất (tinh_trang = 1) hoặc tính toàn bộ đơn nếu chưa có đơn hoàn tất
        $hasCompletedOrders = Orders::where('tinh_trang', 1)->exists();
        $condition = $hasCompletedOrders ? [['tinh_trang', '=', 1]] : [];

        $totalOrders = Orders::where($condition)->count();
        $totalRevenue = Orders::where($condition)->sum('tong_tien');

        $totalCustomers = Customer::count();
        $bounceRate = rand(15, 35);

        // Thống kê theo ngày
        $sales = Orders::where($condition)
            ->select(
                DB::raw('DATE(created_at) as ngay'),
                DB::raw('COUNT(id) as so_don'),
                DB::raw('SUM(tong_tien) as tong_tien')
            )
            ->groupBy('ngay')
            ->orderBy('ngay', 'asc')
            ->get();

        return response()->json([
            'status' => true,
            'data' => [
                'totalOrders' => $totalOrders,
                'totalRevenue' => $totalRevenue,
                'totalCustomers' => $totalCustomers,
                'bounceRate' => $bounceRate,
                'sales' => $sales
            ]
        ]);
    }

    public function thongkeDoanhThu(Request $request)
    {
        return $this->getData($request);
    }
}
