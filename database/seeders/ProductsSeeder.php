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

        $products = [
            // ==========================================
            // ĐIỆN THOẠI - APPLE
            // ==========================================
            [
                'title' => 'iPhone 16 Pro Max',
                'slug' => 'iphone-16-pro-max',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/329149/iphone-16-pro-max-sa-mac-thumb-600x600.jpg',
                'price' => 34990000,
                'quantity' => 45,
                'brand' => 'Apple',
                'description' => 'Flagship cao cấp nhất của Apple với khung viền Titan siêu nhẹ, nút Điều khiển Camera đột phá, chip A18 Pro mạnh mẽ và thời lượng pin xuất sắc.',
                'specs' => json_encode([
                    'man_hinh' => '6.9 inch Super Retina XDR OLED 120Hz',
                    'chip' => 'Apple A18 Pro 3nm',
                    'ram' => '8GB',
                    'storage' => '256GB',
                    'camera' => 'Chính 48MP + Góc siêu rộng 48MP + Tele 12MP 5x',
                    'pin' => '4685 mAh, sạc nhanh 30W MagSafe',
                    'he_dieu_hanh' => 'iOS 18',
                    'trong_luong' => '227g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPhone 16 Pro',
                'slug' => 'iphone-16-pro',
                'images' => 'https://product.hstatic.net/1000329106/product/vang_c027cbfba10f4613a57747e6b03f65c2_master.jpg',
                'price' => 28990000,
                'quantity' => 40,
                'brand' => 'Apple',
                'description' => 'Thiết kế Titan thanh lịch, kích thước màn hình nâng cấp lên 6.3 inch, camera tele tiềm vọng 5x và hệ thống tản nhiệt tiên tiến.',
                'specs' => json_encode([
                    'man_hinh' => '6.3 inch Super Retina XDR OLED 120Hz',
                    'chip' => 'Apple A18 Pro',
                    'ram' => '8GB',
                    'storage' => '128GB',
                    'camera' => '48MP + 48MP + 12MP',
                    'pin' => '3582 mAh',
                    'he_dieu_hanh' => 'iOS 18',
                    'trong_luong' => '199g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPhone 15 Pro Max',
                'slug' => 'iphone-15-pro-max',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg',
                'price' => 29490000,
                'quantity' => 50,
                'brand' => 'Apple',
                'description' => 'Flagship cao cấp chip A17 Pro, camera 48MP chụp ảnh siêu nét zoom quang 5x, pin dùng cả ngày, cổng sạc Type-C chuẩn USB 3.',
                'specs' => json_encode([
                    'man_hinh' => '6.7 inch OLED Super Retina XDR 120Hz',
                    'chip' => 'Apple A17 Pro',
                    'ram' => '8GB',
                    'storage' => '256GB',
                    'camera' => 'Chính 48MP, 12MP tele 5x, 12MP góc rộng',
                    'pin' => '4422 mAh',
                    'he_dieu_hanh' => 'iOS 17',
                    'trong_luong' => '221g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPhone 15',
                'slug' => 'iphone-15',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/iphone-15-plus_1__1.png',
                'price' => 19790000,
                'quantity' => 60,
                'brand' => 'Apple',
                'description' => 'Màn hình Dynamic Island hiện đại, mặt lưng kính pha màu mờ sang trọng, camera chính 48MP sắc nét và cổng sạc USB-C tiện dụng.',
                'specs' => json_encode([
                    'man_hinh' => '6.1 inch Super Retina XDR OLED',
                    'chip' => 'Apple A16 Bionic',
                    'ram' => '6GB',
                    'storage' => '128GB',
                    'camera' => '48MP + 12MP',
                    'pin' => '3349 mAh',
                    'he_dieu_hanh' => 'iOS 17',
                    'trong_luong' => '171g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPhone 14 Pro',
                'slug' => 'iphone-14-pro',
                'images' => 'https://product.hstatic.net/1000329106/product/vang_c027cbfba10f4613a57747e6b03f65c2_master.jpg',
                'price' => 24990000,
                'quantity' => 35,
                'brand' => 'Apple',
                'description' => 'Dynamic Island tương tác độc đáo, chip A16 Bionic mạnh mẽ, camera 48MP chụp ảnh chi tiết cao và màn hình Always-On Display rực rỡ.',
                'specs' => json_encode([
                    'man_hinh' => '6.1 inch OLED 120Hz ProMotion',
                    'chip' => 'Apple A16 Bionic',
                    'ram' => '6GB',
                    'storage' => '128GB',
                    'camera' => '48MP + 12MP + 12MP',
                    'pin' => '3200 mAh',
                    'he_dieu_hanh' => 'iOS 16',
                    'trong_luong' => '206g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPhone 13',
                'slug' => 'iphone-13',
                'images' => 'https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/2021_9_15_637673230231791121_iphone-13-mini-den-1.jpg',
                'price' => 13890000,
                'quantity' => 70,
                'brand' => 'Apple',
                'description' => 'Chip A15 Bionic bền bỉ, camera kép chụp đêm và quay phim Cinematic Mode cực ấn tượng, thời lượng pin tối ưu vượt bậc.',
                'specs' => json_encode([
                    'man_hinh' => '6.1 inch Super Retina XDR OLED',
                    'chip' => 'Apple A15 Bionic',
                    'ram' => '4GB',
                    'storage' => '128GB',
                    'camera' => 'Kép 12MP + 12MP OIS',
                    'pin' => '3227 mAh',
                    'he_dieu_hanh' => 'iOS 15',
                    'trong_luong' => '174g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPhone 12',
                'slug' => 'iphone-12',
                'images' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/401/951/products/dac-diem-noi-bat-802c0b8d-459b-463b-a261-aaf344fced51.png?v=1729563297810',
                'price' => 11490000,
                'quantity' => 55,
                'brand' => 'Apple',
                'description' => 'Màn hình OLED sắc nét, thiết kế viền vuông sang trọng, hỗ trợ kết nối 5G tốc độ cao và sạc không dây MagSafe.',
                'specs' => json_encode([
                    'man_hinh' => '6.1 inch Super Retina XDR OLED',
                    'chip' => 'Apple A14 Bionic',
                    'ram' => '4GB',
                    'storage' => '64GB',
                    'camera' => '12MP + 12MP',
                    'pin' => '2815 mAh',
                    'he_dieu_hanh' => 'iOS 14',
                    'trong_luong' => '164g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPhone SE 2022',
                'slug' => 'iphone-se-2022',
                'images' => 'https://cdn.phuckhangmobile.com/image/iphone-se-2022-midnight-26886j.jpg',
                'price' => 8490000,
                'quantity' => 50,
                'brand' => 'Apple',
                'description' => 'iPhone nhỏ gọn với phím Home Touch ID truyền thống, trang bị chip A15 Bionic siêu mạnh mẽ trong một thân hình cổ điển.',
                'specs' => json_encode([
                    'man_hinh' => '4.7 inch Retina HD IPS',
                    'chip' => 'Apple A15 Bionic',
                    'ram' => '4GB',
                    'storage' => '64GB',
                    'camera' => '12MP Smart HDR 4',
                    'pin' => '2018 mAh',
                    'he_dieu_hanh' => 'iOS 15',
                    'trong_luong' => '144g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ==========================================
            // ĐIỆN THOẠI - SAMSUNG
            // ==========================================
            [
                'title' => 'Samsung Galaxy S24 Ultra',
                'slug' => 'samsung-galaxy-s24-ultra',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/307174/samsung-galaxy-s24-ultra-5g-600x600.jpg',
                'price' => 30990000,
                'quantity' => 40,
                'brand' => 'Samsung',
                'description' => 'Siêu phẩm Galaxy AI với khung viền Titan, màn hình phẳng chống chói Corning Gorilla Armor, bút S Pen và camera 200MP zoom sắc nét.',
                'specs' => json_encode([
                    'man_hinh' => '6.8 inch Dynamic AMOLED 2X 120Hz 2600 nits',
                    'chip' => 'Snapdragon 8 Gen 3 for Galaxy',
                    'ram' => '12GB',
                    'storage' => '256GB',
                    'camera' => '200MP + 50MP + 12MP + 10MP',
                    'pin' => '5000 mAh, sạc nhanh 45W',
                    'he_dieu_hanh' => 'Android 14 (One UI 6.1)',
                    'trong_luong' => '232g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy S24 Plus',
                'slug' => 'samsung-galaxy-s24-plus',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/307172/samsung-galaxy-s24-plus-xam-thumb-600x600.jpg',
                'price' => 22490000,
                'quantity' => 35,
                'brand' => 'Samsung',
                'description' => 'Màn hình QHD+ sắc nét, tích hợp đầy đủ bộ tính năng Galaxy AI thông minh, pin 4900 mAh cùng thiết kế viền mỏng đối xứng tuyệt đẹp.',
                'specs' => json_encode([
                    'man_hinh' => '6.7 inch Dynamic AMOLED 2X QHD+ 120Hz',
                    'chip' => 'Exynos 2400 / Snapdragon 8 Gen 3',
                    'ram' => '12GB',
                    'storage' => '256GB',
                    'camera' => '50MP + 12MP + 10MP',
                    'pin' => '4900 mAh, sạc 45W',
                    'he_dieu_hanh' => 'Android 14 (One UI 6.1)',
                    'trong_luong' => '196g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy Z Fold5',
                'slug' => 'samsung-galaxy-z-fold5',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/301608/samsung-galaxy-zfold5-xanh-256gb-13.jpg',
                'price' => 32990000,
                'quantity' => 20,
                'brand' => 'Samsung',
                'description' => 'Điện thoại gập mở tương lai với bản lề Flex gập khít hoàn hảo, màn hình lớn 7.6 inch đa nhiệm tối đa và hỗ trợ bút S Pen chuyên biệt.',
                'specs' => json_encode([
                    'man_hinh' => 'Chính 7.6 inch, Phụ 6.2 inch AMOLED 120Hz',
                    'chip' => 'Snapdragon 8 Gen 2 for Galaxy',
                    'ram' => '12GB',
                    'storage' => '512GB',
                    'camera' => '50MP + 12MP + 10MP',
                    'pin' => '4400 mAh, sạc nhanh 25W',
                    'he_dieu_hanh' => 'Android 13 nâng cấp Android 14',
                    'trong_luong' => '253g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy Z Flip5',
                'slug' => 'z-flip5',
                'images' => 'https://images.samsung.com/is/image/samsung/p6pim/vn/feature/164698402/vn-feature-galaxy-z-flip5-f731-537756342?$FB_TYPE_A_MO_JPG$',
                'price' => 18990000,
                'quantity' => 30,
                'brand' => 'Samsung',
                'description' => 'Thiết kế gập vỏ sò thời thượng, màn hình ngoài Flex Window 3.4 inch độc đáo hỗ trợ xem widget, trả lời tin nhắn và chụp selfie tiện lợi.',
                'specs' => json_encode([
                    'man_hinh' => '6.7 inch AMOLED 120Hz gập + Phụ 3.4 inch',
                    'chip' => 'Snapdragon 8 Gen 2 for Galaxy',
                    'ram' => '8GB',
                    'storage' => '256GB',
                    'camera' => 'Kép 12MP + 12MP OIS',
                    'pin' => '3700 mAh',
                    'he_dieu_hanh' => 'Android 13',
                    'trong_luong' => '187g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy S23',
                'slug' => 'samsung-galaxy-s23',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/264060/samsung-galaxy-s23-600x600.jpg',
                'price' => 14990000,
                'quantity' => 45,
                'brand' => 'Samsung',
                'description' => 'Flagship compact kích thước vừa tay, camera chụp đêm Nightography xuất sắc, chip Snapdragon 8 Gen 2 mát mẻ và mượt mà.',
                'specs' => json_encode([
                    'man_hinh' => '6.1 inch Dynamic AMOLED 2X 120Hz',
                    'chip' => 'Snapdragon 8 Gen 2 for Galaxy',
                    'ram' => '8GB',
                    'storage' => '128GB',
                    'camera' => '50MP + 12MP + 10MP',
                    'pin' => '3900 mAh',
                    'he_dieu_hanh' => 'Android 13',
                    'trong_luong' => '168g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy A55 5G',
                'slug' => 'samsung-galaxy-a55-5g',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/250103/samsung-galaxy-a54-thumb-den-600x600.jpg',
                'price' => 9690000,
                'quantity' => 80,
                'brand' => 'Samsung',
                'description' => 'Khung kim loại cao cấp, mặt lưng kính cường lực, chip Exynos 1480 có GPU AMD, bảo mật Samsung Knox Vault an tâm tuyệt đối.',
                'specs' => json_encode([
                    'man_hinh' => '6.6 inch Super AMOLED 120Hz HDR10+',
                    'chip' => 'Exynos 1480 4nm',
                    'ram' => '8GB',
                    'storage' => '128GB',
                    'camera' => '50MP OIS + 12MP + 5MP',
                    'pin' => '5000 mAh, sạc 25W',
                    'he_dieu_hanh' => 'Android 14',
                    'trong_luong' => '213g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy A14',
                'slug' => 'galaxy-a14',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/271721/samsung-galaxy-a14-5g-bac-thumb-600x600.jpg',
                'price' => 3790000,
                'quantity' => 100,
                'brand' => 'Samsung',
                'description' => 'Lựa chọn thông minh trong phân khúc phổ thông, pin 5000mAh bền bỉ 2 ngày, màn hình lớn Full HD+ sắc nét cho học tập và giải trí.',
                'specs' => json_encode([
                    'man_hinh' => '6.6 inch PLS LCD FHD+',
                    'chip' => 'Exynos 850 8 nhân',
                    'ram' => '4GB',
                    'storage' => '128GB',
                    'camera' => 'Chính 50MP + 5MP + 2MP',
                    'pin' => '5000 mAh',
                    'he_dieu_hanh' => 'Android 13',
                    'trong_luong' => '201g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ==========================================
            // ĐIỆN THOẠI - XIAOMI & OPPO
            // ==========================================
            [
                'title' => 'Xiaomi 14',
                'slug' => 'xiaomi-14',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/x/i/xiaomi-14-pre-xanh-la.png',
                'price' => 19990000,
                'quantity' => 50,
                'brand' => 'Xiaomi',
                'description' => 'Ống kính quang học Leica Summilux đỉnh cao, chip Snapdragon 8 Gen 3, màn hình viền siêu mỏng 1.61mm và sạc nhanh HyperCharge 90W.',
                'specs' => json_encode([
                    'man_hinh' => '6.36 inch OLED LTPO 120Hz 3000 nits',
                    'chip' => 'Snapdragon 8 Gen 3 4nm',
                    'ram' => '12GB',
                    'storage' => '256GB',
                    'camera' => 'Leica 50MP + 50MP + 50MP',
                    'pin' => '4610 mAh, sạc có dây 90W, không dây 50W',
                    'he_dieu_hanh' => 'Xiaomi HyperOS',
                    'trong_luong' => '193g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 18,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Xiaomi 13T',
                'slug' => 'xiaomi-13t',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/309814/xiaomi-13-t-xanh-duong-thumb-thumb-600x600.jpg',
                'price' => 11490000,
                'quantity' => 55,
                'brand' => 'Xiaomi',
                'description' => 'Chụp ảnh chuẩn Leica chuyên nghiệp với phong cách màu rực rỡ, chip Dimensity 8200-Ultra mạnh mẽ, kháng nước chuẩn IP68 cao cấp.',
                'specs' => json_encode([
                    'man_hinh' => '6.67 inch CrystalRes AMOLED 144Hz',
                    'chip' => 'MediaTek Dimensity 8200-Ultra',
                    'ram' => '12GB',
                    'storage' => '256GB',
                    'camera' => 'Leica 50MP + 50MP Tele + 12MP',
                    'pin' => '5000 mAh, sạc nhanh 67W Turbo',
                    'he_dieu_hanh' => 'MIUI 14 / HyperOS',
                    'trong_luong' => '197g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 18,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Xiaomi Redmi Note 13 Pro+ 5G',
                'slug' => 'redmi-note-13-pro-plus',
                'images' => 'https://product.hstatic.net/200000547251/product/13-5g-xanh_14c991e3fcfd43c0a054c80dec71fbcb.png',
                'price' => 8990000,
                'quantity' => 70,
                'brand' => 'Xiaomi',
                'description' => 'Màn hình cong AMOLED 1.5K 120Hz, camera siêu nét 200MP chống rung OIS, sạc siêu tốc 120W nạp đầy pin chỉ trong 19 phút.',
                'specs' => json_encode([
                    'man_hinh' => '6.67 inch AMOLED 1.5K 120Hz cong',
                    'chip' => 'MediaTek Dimensity 7200-Ultra',
                    'ram' => '8GB',
                    'storage' => '256GB',
                    'camera' => '200MP OIS + 8MP + 2MP',
                    'pin' => '5000 mAh, sạc 120W HyperCharge',
                    'he_dieu_hanh' => 'HyperOS',
                    'trong_luong' => '204g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 18,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Xiaomi Redmi Note 13',
                'slug' => 'redmi-note-13',
                'images' => 'https://product.hstatic.net/200000547251/product/13-5g-xanh_14c991e3fcfd43c0a054c80dec71fbcb.png',
                'price' => 4590000,
                'quantity' => 90,
                'brand' => 'Xiaomi',
                'description' => 'Smartphone quốc dân phân khúc dưới 5 triệu, viền màn hình siêu mỏng, camera 108MP rõ nét, loa kép Dolby Atmos sống động.',
                'specs' => json_encode([
                    'man_hinh' => '6.67 inch AMOLED FHD+ 120Hz',
                    'chip' => 'Snapdragon 685',
                    'ram' => '6GB',
                    'storage' => '128GB',
                    'camera' => '108MP + 8MP + 2MP',
                    'pin' => '5000 mAh, sạc nhanh 33W',
                    'he_dieu_hanh' => 'MIUI 14',
                    'trong_luong' => '188g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 18,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Xiaomi Poco X6 Pro 5G',
                'slug' => 'poco-x6-pro',
                'images' => 'https://cdn2.cellphones.com.vn/x/media/catalog/product/x/i/xiaomi-poco-x6-5g-8gb-256gb-1_2.png',
                'price' => 8490000,
                'quantity' => 60,
                'brand' => 'Xiaomi',
                'description' => 'Quái vật hiệu năng gaming tầm trung, trang bị Dimensity 8300-Ultra ghi hơn 1.4 triệu điểm AnTuTu cùng tản nhiệt buồng hơi LiquidCool 2.0.',
                'specs' => json_encode([
                    'man_hinh' => '6.67 inch Flow AMOLED 1.5K 120Hz',
                    'chip' => 'Dimensity 8300-Ultra 4nm',
                    'ram' => '8GB',
                    'storage' => '256GB UFS 4.0',
                    'camera' => '64MP OIS + 8MP + 2MP',
                    'pin' => '5000 mAh, sạc 67W',
                    'he_dieu_hanh' => 'Xiaomi HyperOS',
                    'trong_luong' => '186g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 18,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'OPPO Reno11 Pro 5G',
                'slug' => 'oppo-reno11-pro',
                'images' => 'https://cdn.tgdd.vn/Products/Images/42/314210/oppo-reno-11-pro-xam-1-1.jpg',
                'price' => 14990000,
                'quantity' => 35,
                'brand' => 'OPPO',
                'description' => 'Chuyên gia chân dung với ống kính tele 32MP cảm biến Sony, thiết kế mặt lưng đá cẩm thạch tuyệt đẹp và sạc siêu nhanh 80W SUPERVOOC.',
                'specs' => json_encode([
                    'man_hinh' => '6.7 inch AMOLED 120Hz 3D cong',
                    'chip' => 'MediaTek Dimensity 8200',
                    'ram' => '12GB',
                    'storage' => '512GB',
                    'camera' => '50MP OIS Sony IMX890 + 32MP Tele + 8MP',
                    'pin' => '4600 mAh, sạc 80W SUPERVOOC',
                    'he_dieu_hanh' => 'ColorOS 14',
                    'trong_luong' => '181g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ==========================================
            // LAPTOP - MACBOOK & WINDOWS
            // ==========================================
            [
                'title' => 'MacBook Pro 14 M3 Pro',
                'slug' => 'macbook-pro-14-m3-pro',
                'images' => 'https://cdn.tgdd.vn/Products/Images/44/318228/macbook-pro-14-inch-m3-2023-311023-095050-600x600.jpg',
                'price' => 48990000,
                'quantity' => 25,
                'brand' => 'Apple',
                'description' => 'Máy trạm di động chuyên nghiệp với vi xử lý Apple M3 Pro, màn hình Liquid Retina XDR 120Hz xuất sắc, màu Space Black chống bám vân tay.',
                'specs' => json_encode([
                    'man_hinh' => '14.2 inch Liquid Retina XDR (3024 x 1964) 120Hz',
                    'chip' => 'Apple M3 Pro (11-core CPU, 14-core GPU)',
                    'ram' => '18GB Unified Memory',
                    'storage' => '512GB SSD siêu tốc',
                    'pin' => 'Thời lượng pin lên đến 18 giờ liên tục',
                    'he_dieu_hanh' => 'macOS Sonoma',
                    'trong_luong' => '1.61 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'MacBook Air 15 inch M3',
                'slug' => 'macbook-air-15-m3',
                'images' => 'https://cdn.tgdd.vn/Products/Images/44/322616/macbook-air-15-inch-m3-2024-1-1.jpg',
                'price' => 31990000,
                'quantity' => 30,
                'brand' => 'Apple',
                'description' => 'Mỏng nhẹ kinh ngạc với màn hình lớn 15.3 inch, chip M3 thế hệ mới hỗ trợ xuất đồng thời 2 màn hình ngoài khi gập máy, âm thanh 6 loa sống động.',
                'specs' => json_encode([
                    'man_hinh' => '15.3 inch Liquid Retina 500 nits',
                    'chip' => 'Apple M3 (8-core CPU, 10-core GPU)',
                    'ram' => '8GB Unified Memory',
                    'storage' => '256GB SSD',
                    'pin' => 'Thời lượng pin lên đến 18 giờ',
                    'he_dieu_hanh' => 'macOS Sonoma',
                    'trong_luong' => '1.51 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'MacBook Air 13 inch M2',
                'slug' => 'macbook-air-13-m2',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/m/a/macbook_air_m2_1.png',
                'price' => 24490000,
                'quantity' => 45,
                'brand' => 'Apple',
                'description' => 'Thiết kế phẳng hiện đại siêu mỏng 11.3mm, cổng sạc MagSafe 3 an toàn, webcam 1080p sắc nét và hiệu năng đồ họa ấn tượng từ chip Apple M2.',
                'specs' => json_encode([
                    'man_hinh' => '13.6 inch Liquid Retina IPS 500 nits',
                    'chip' => 'Apple M2 (8-core CPU, 8-core GPU)',
                    'ram' => '8GB Unified Memory',
                    'storage' => '256GB SSD',
                    'pin' => 'Lên tới 18 giờ phát video',
                    'he_dieu_hanh' => 'macOS Ventura / Sonoma',
                    'trong_luong' => '1.24 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Dell XPS 13 Plus 9320',
                'slug' => 'dell-xps-13-plus-9320',
                'images' => 'https://laptoptcc.com/media/product/33602-dell-xps-9320.jpg',
                'price' => 44990000,
                'quantity' => 20,
                'brand' => 'Dell',
                'description' => 'Kiệt tác công nghệ tương lai với hàng phím chức năng cảm ứng điện dung, touchpad kính liền mạch tàng hình và màn hình OLED 3.5K viền mỏng vô cực.',
                'specs' => json_encode([
                    'man_hinh' => '13.4 inch 3.5K OLED Touch (3456 x 2160)',
                    'chip' => 'Intel Core i7-1360P thế hệ 13',
                    'ram' => '16GB LPDDR5 6000MHz',
                    'storage' => '512GB PCIe Gen 4 SSD',
                    'pin' => '55Wh, sạc nhanh Type-C 60W',
                    'he_dieu_hanh' => 'Windows 11 Home',
                    'trong_luong' => '1.26 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 24,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Dell Inspiron 15 3520',
                'slug' => 'dell-inspiron-15-3520',
                'images' => 'https://img.tgdd.vn/imgt/ecom/f_webp,fit_outside,quality_100,s_1290x738/https://cdn.tgdd.vn/Products/Images/44/333886/Slider/vi-vn-dell-inspiron-15-3520-i5-n5i5057w1-slider-2.jpg',
                'price' => 14490000,
                'quantity' => 50,
                'brand' => 'Dell',
                'description' => 'Laptop sinh viên và văn phòng đáng tin cậy với màn hình tần số quét 120Hz mượt mà, chip Intel Core i5 bền bỉ và bàn phím đầy đủ phím số.',
                'specs' => json_encode([
                    'man_hinh' => '15.6 inch FHD (1920x1080) 120Hz chống chói',
                    'chip' => 'Intel Core i5-1235U Turbo 4.4GHz',
                    'ram' => '16GB DDR4 3200MHz',
                    'storage' => '512GB NVMe PCIe SSD',
                    'pin' => '3 cell 41Wh',
                    'he_dieu_hanh' => 'Windows 11 + Office Bản quyền',
                    'trong_luong' => '1.65 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Asus Zenbook 14 OLED UX3405',
                'slug' => 'asus-zenbook-14-oled-ux3405',
                'images' => 'https://cdnv2.tgdd.vn/mwg-static/tgdd/Products/Images/44/324821/asus-zenbook-14-oled-ux3405ma-ultra-9-pp475w-638763553168608279-600x600.jpg',
                'price' => 28490000,
                'quantity' => 30,
                'brand' => 'Asus',
                'description' => 'Laptop AI siêu mỏng nhẹ trang bị vi xử lý Intel Core Ultra 5 có NPU chuyên xử lý AI, màn hình Lumina OLED 3K 120Hz và pin khủng 75Wh.',
                'specs' => json_encode([
                    'man_hinh' => '14.0 inch 3K OLED 120Hz 100% DCI-P3 500 nits',
                    'chip' => 'Intel Core Ultra 5 125H tích hợp NPU AI',
                    'ram' => '16GB LPDDR5X 7467MHz',
                    'storage' => '512GB PCIe 4.0 NVMe SSD',
                    'pin' => '75Wh dùng liên tục hơn 15 tiếng',
                    'he_dieu_hanh' => 'Windows 11 Home',
                    'trong_luong' => '1.2 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 24,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Asus ROG Zephyrus G16 Gaming',
                'slug' => 'asus-rog-zephyrus-g16',
                'images' => 'https://dlcdnwebimgs.asus.com/gain/E4E1A4CD-1261-43D1-A18D-C91711A989AD/w300/fwebp',
                'price' => 52990000,
                'quantity' => 15,
                'brand' => 'Asus',
                'description' => 'Laptop gaming mỏng nhẹ đỉnh cao với vỏ nhôm CNC nguyên khối, dải đèn Slash Lighting độc đáo, màn hình ROG Nebula OLED 240Hz và RTX 4070.',
                'specs' => json_encode([
                    'man_hinh' => '16.0 inch 2.5K OLED 240Hz 0.2ms chuẩn G-Sync',
                    'chip' => 'Intel Core Ultra 7 155H & NVIDIA GeForce RTX 4070 8GB',
                    'ram' => '32GB LPDDR5X',
                    'storage' => '1TB SSD PCIe 4.0 NVMe',
                    'pin' => '90Wh, sạc nhanh 100W Type-C',
                    'he_dieu_hanh' => 'Windows 11 Home',
                    'trong_luong' => '1.85 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 24,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Asus TUF Gaming A15',
                'slug' => 'asus-tuf-gaming-a15',
                'images' => 'https://cdnv2.tgdd.vn/mwg-static/tgdd/Products/Images/44/322568/asus-tuf-gaming-a15-fa506nc-r5-hn017w-170225-104947-915-600x600.jpg',
                'price' => 20990000,
                'quantity' => 40,
                'brand' => 'Asus',
                'description' => 'Độ bền chuẩn quân đội Mỹ MIL-STD-810H, cấu hình AMD Ryzen 7 kết hợp card đồ họa RTX 4050 chiến mượt mọi tựa game eSports và đồ họa 3D.',
                'specs' => json_encode([
                    'man_hinh' => '15.6 inch FHD 144Hz IPS 100% sRGB',
                    'chip' => 'AMD Ryzen 7 7735HS & RTX 4050 6GB',
                    'ram' => '16GB DDR5 4800MHz',
                    'storage' => '512GB SSD NVMe',
                    'pin' => '90Wh',
                    'he_dieu_hanh' => 'Windows 11',
                    'trong_luong' => '2.2 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 24,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Lenovo ThinkPad X1 Carbon Gen 11',
                'slug' => 'lenovo-thinkpad-x1-carbon-gen-11',
                'images' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/446/400/products/lenovo-thinkpad-x1-carbon-gen-11-1-gia-loc.jpg?v=1744014557240',
                'price' => 42990000,
                'quantity' => 20,
                'brand' => 'Lenovo',
                'description' => 'Biểu tượng laptop doanh nhân cao cấp bằng sợi carbon siêu bền bỉ, bàn phím gõ êm ái hàng đầu thế giới và tích hợp cảm biến bảo mật vân tay, camera IR.',
                'specs' => json_encode([
                    'man_hinh' => '14.0 inch 2.8K OLED (2880 x 1800) 100% DCI-P3',
                    'chip' => 'Intel Core i7-1355U vPro',
                    'ram' => '32GB LPDDR5',
                    'storage' => '1TB SSD M.2 PCIe NVMe',
                    'pin' => '57Wh hỗ trợ sạc nhanh 80% trong 60 phút',
                    'he_dieu_hanh' => 'Windows 11 Pro',
                    'trong_luong' => '1.12 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 36,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Lenovo Legion Pro 5 Gaming',
                'slug' => 'lenovo-legion-pro-5',
                'images' => 'https://cdn2.cellphones.com.vn/x/media/catalog/product/l/a/laptop-lenovo-legion-5-pro-16ach6h-82jq001vvn-1.jpg',
                'price' => 36990000,
                'quantity' => 25,
                'brand' => 'Lenovo',
                'description' => 'Hệ thống tản nhiệt Legion Coldfront 5.0 hàng đầu, màn hình 16 inch 240Hz tỷ lệ 16:10 và card đồ họa RTX 4060 max công suất 140W.',
                'specs' => json_encode([
                    'man_hinh' => '16 inch WQXGA (2560x1600) IPS 240Hz 500 nits',
                    'chip' => 'Intel Core i7-14650HX & RTX 4060 8GB 140W',
                    'ram' => '16GB DDR5 5600MHz (2 khe rời)',
                    'storage' => '512GB SSD NVMe',
                    'pin' => '80Wh, củ sạc 300W',
                    'he_dieu_hanh' => 'Windows 11 Home',
                    'trong_luong' => '2.5 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 24,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'HP Victus 16 Gaming',
                'slug' => 'hp-victus-16-gaming',
                'images' => 'https://cdn.tgdd.vn/Products/Images/44/270155/hp-gaming-victus-16-d0298tx-i5-64v74pa-600x600.jpg',
                'price' => 23490000,
                'quantity' => 35,
                'brand' => 'HP',
                'description' => 'Thiết kế tối giản thanh lịch không quá hầm hố, màn hình 16.1 inch rộng rãi 144Hz, âm thanh B&O và hiệu năng đồ họa mạnh mẽ trong tầm giá.',
                'specs' => json_encode([
                    'man_hinh' => '16.1 inch FHD IPS 144Hz 100% sRGB',
                    'chip' => 'Intel Core i5-13500H & RTX 4050 6GB',
                    'ram' => '16GB DDR5',
                    'storage' => '512GB PCIe Gen4 NVMe SSD',
                    'pin' => '70Wh',
                    'he_dieu_hanh' => 'Windows 11',
                    'trong_luong' => '2.3 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'HP Pavilion 15',
                'slug' => 'hp-pavilion-15',
                'images' => 'https://cdn.tgdd.vn/Products/Images/44/302207/hp-pavilion-15-eg2086tu-i3-7c0q8pa-12.jpg',
                'price' => 15290000,
                'quantity' => 45,
                'brand' => 'HP',
                'description' => 'Vỏ nhôm màu bạc trang nhã, bàn phím gõ êm ái, cấu hình đáp ứng tốt văn phòng, photoshop nhẹ và giải trí xem phim gia đình.',
                'specs' => json_encode([
                    'man_hinh' => '15.6 inch FHD IPS BrightView',
                    'chip' => 'Intel Core i5-1335U 10 nhân 12 luồng',
                    'ram' => '16GB DDR4 3200MHz',
                    'storage' => '512GB SSD PCIe NVMe',
                    'pin' => '41Wh sạc nhanh 50% trong 45 phút',
                    'he_dieu_hanh' => 'Windows 11 Bản quyền',
                    'trong_luong' => '1.74 kg'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ==========================================
            // MÁY TÍNH BẢNG (TABLET)
            // ==========================================
            [
                'title' => 'iPad Pro M4 11 inch',
                'slug' => 'ipad-pro-m4-11-inch',
                'images' => 'https://cdn.tgdd.vn/Products/Images/522/325515/ipad-pro-11-inch-m4-wifi-sliver-thumb-600x600.jpg',
                'price' => 27990000,
                'quantity' => 30,
                'brand' => 'Apple',
                'description' => 'Mỏng kỷ lục chỉ 5.3mm, trang bị màn hình OLED Ultra Retina hai lớp (Tandem OLED) đỉnh cao cùng sức mạnh vượt trội từ chip Apple M4.',
                'specs' => json_encode([
                    'man_hinh' => '11 inch Ultra Retina XDR Tandem OLED 120Hz',
                    'chip' => 'Apple M4 9-core CPU',
                    'ram' => '8GB',
                    'storage' => '256GB',
                    'camera' => '12MP F/1.8 + Cảm biến LiDAR',
                    'pin' => '31.29 Wh dùng liên tục 10 tiếng lướt web',
                    'he_dieu_hanh' => 'iPadOS 17.5',
                    'trong_luong' => '444g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPad Air 5 M1',
                'slug' => 'ipad-air-5-m1',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad-air-5.png',
                'price' => 14690000,
                'quantity' => 50,
                'brand' => 'Apple',
                'description' => 'Sức mạnh chuẩn laptop nhờ chip Apple M1, cổng USB-C tốc độ truyền gấp 2 lần, tương thích Apple Pencil 2 và Magic Keyboard.',
                'specs' => json_encode([
                    'man_hinh' => '10.9 inch Liquid Retina IPS True Tone',
                    'chip' => 'Apple M1 (8-core CPU, 8-core GPU)',
                    'ram' => '8GB',
                    'storage' => '64GB',
                    'camera' => '12MP góc rộng trước sau có Center Stage',
                    'pin' => '28.6 Wh',
                    'he_dieu_hanh' => 'iPadOS 17',
                    'trong_luong' => '461g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'iPad Gen 10 10.9 inch',
                'slug' => 'ipad-gen-10',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/i/p/ipad-10-9-inch-2022.png',
                'price' => 9790000,
                'quantity' => 60,
                'brand' => 'Apple',
                'description' => 'Thiết kế viền mỏng toàn màn hình với 4 màu sắc trẻ trung, nút nguồn tích hợp Touch ID, chuyển sang cổng sạc Type-C hiện đại.',
                'specs' => json_encode([
                    'man_hinh' => '10.9 inch Liquid Retina IPS 500 nits',
                    'chip' => 'Apple A14 Bionic',
                    'ram' => '4GB',
                    'storage' => '64GB',
                    'camera' => '12MP trước ngang + 12MP sau',
                    'pin' => '28.6 Wh',
                    'he_dieu_hanh' => 'iPadOS 17',
                    'trong_luong' => '477g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy Tab S9 Ultra',
                'slug' => 'samsung-galaxy-tab-s9-ultra',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-tab-s9-ultra_1.png',
                'price' => 25990000,
                'quantity' => 20,
                'brand' => 'Samsung',
                'description' => 'Máy tính bảng khổng lồ 14.6 inch màn hình Dynamic AMOLED 2X, chuẩn kháng nước bụi IP68 cả máy lẫn bút S Pen, thay thế hoàn toàn laptop với Samsung DeX.',
                'specs' => json_encode([
                    'man_hinh' => '14.6 inch Dynamic AMOLED 2X 120Hz HDR10+',
                    'chip' => 'Snapdragon 8 Gen 2 for Galaxy',
                    'ram' => '12GB',
                    'storage' => '256GB',
                    'camera' => 'Sau 13MP + 8MP, Trước kép 12MP + 12MP',
                    'pin' => '11200 mAh, sạc nhanh 45W',
                    'he_dieu_hanh' => 'Android 13 nâng cấp One UI 6.1 Galaxy AI',
                    'trong_luong' => '732g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy Tab A9+ WiFi',
                'slug' => 'samsung-galaxy-tab-a9-plus',
                'images' => 'https://cdn.tgdd.vn/Products/Images/522/315590/samsung-galaxy-tab-a9-plus-bac-1.jpg',
                'price' => 4990000,
                'quantity' => 70,
                'brand' => 'Samsung',
                'description' => 'Máy tính bảng giải trí gia đình màn hình 11 inch 90Hz mượt mà, hệ thống 4 loa Dolby Atmos sống động và tính năng chia đôi ba màn hình tiện lợi.',
                'specs' => json_encode([
                    'man_hinh' => '11.0 inch TFT LCD 90Hz FHD+',
                    'chip' => 'Snapdragon 695 5G',
                    'ram' => '4GB',
                    'storage' => '64GB (hỗ trợ thẻ nhớ 1TB)',
                    'camera' => '8MP sau + 5MP trước',
                    'pin' => '7040 mAh',
                    'he_dieu_hanh' => 'Android 13',
                    'trong_luong' => '480g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Xiaomi Pad 6',
                'slug' => 'xiaomi-pad-6',
                'images' => 'https://cdn.tgdd.vn/Products/Images/522/309848/xiaomi-pad-6-blue-thumb-600x600.jpg',
                'price' => 7990000,
                'quantity' => 45,
                'brand' => 'Xiaomi',
                'description' => 'Màn hình siêu nét 2.8K 144Hz 7 mức tần số quét biến thiên, chip Snapdragon 870 chơi mượt mọi tựa game, thân kim loại nguyên khối siêu mỏng 6.51mm.',
                'specs' => json_encode([
                    'man_hinh' => '11 inch 2.8K (2880x1800) 144Hz Dolby Vision',
                    'chip' => 'Snapdragon 870 5G',
                    'ram' => '8GB',
                    'storage' => '128GB',
                    'camera' => '13MP sau, 8MP trước tự canh giữa',
                    'pin' => '8840 mAh, sạc 33W',
                    'he_dieu_hanh' => 'MIUI Pad 14 / HyperOS',
                    'trong_luong' => '490g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 18,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],

            // ==========================================
            // PHỤ KIỆN - ÂM THANH, SẠC & THIẾT BỊ ĐEO
            // ==========================================
            [
                'title' => 'Apple Watch Series 9 GPS 45mm',
                'slug' => 'apple-watch-series-9-45mm',
                'images' => 'https://cdsassets.apple.com/live/7WUAS350/images/tech-specs/apple-watch-series-9.png',
                'price' => 10490000,
                'quantity' => 35,
                'brand' => 'Apple',
                'description' => 'Đồng hồ thông minh trang bị chip S9 SiP mạnh mẽ, cử chỉ chạm hai lần (Double Tap) kỳ diệu, màn hình sáng gấp đôi 2000 nits và Siri xử lý trên thiết bị.',
                'specs' => json_encode([
                    'man_hinh' => 'OLED LTPO Always-On 2000 nits',
                    'chip' => 'Apple S9 SiP 64-bit 2 nhân',
                    'tinh_nang' => 'Điện tâm đồ ECG, đo SpO2, Double Tap, phát hiện va chạm',
                    'pin' => '18 giờ dùng thường ngày, 36 giờ chế độ nguồn điện thấp',
                    'ketnoi' => 'Bluetooth 5.3, Wi-Fi, GPS',
                    'he_dieu_hanh' => 'watchOS 10',
                    'trong_luong' => '38.7g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Apple Watch Ultra 2 Titanium 49mm',
                'slug' => 'apple-watch-ultra-2',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:250:250/q:100/plain/https://cellphones.com.vn/media/catalog/product/a/p/apple_lte_11__1.png',
                'price' => 20990000,
                'quantity' => 20,
                'brand' => 'Apple',
                'description' => 'Dành cho thể thao sức bền mạo hiểm và lặn biển, vỏ Titan chuẩn quân đội, màn hình sáng nhất 3000 nits, GPS băng tần kép chuẩn xác cao và pin 72 giờ.',
                'specs' => json_encode([
                    'man_hinh' => '49mm Sapphire Crystal OLED 3000 nits',
                    'chip' => 'Apple S9 SiP',
                    'tinh_nang' => 'Đo độ sâu lặn 40m, còi báo động 86dB, GPS L1+L5',
                    'pin' => '36 giờ dùng thông thường, tối đa 72 giờ',
                    'ketnoi' => 'LTE + GPS, Bluetooth 5.3',
                    'trong_luong' => '61.4g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'AirPods Pro 2 Type-C',
                'slug' => 'airpods-pro-2-type-c',
                'images' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/459/953/products/airpods-pro-2-reseller-com-vn-1.jpg',
                'price' => 5690000,
                'quantity' => 80,
                'brand' => 'Apple',
                'description' => 'Chống ồn chủ động ANC đỉnh cao gấp 2 lần, chip Apple H2, âm thanh không gian cá nhân hóa và hộp sạc chuẩn USB-C có loa định vị Precision Finding.',
                'specs' => json_encode([
                    'chip' => 'Apple H2 trên tai nghe, chip U1 trên hộp sạc',
                    'tinh_nang' => 'Chống ồn ANC, Xuyên âm Adaptive Audio, Nhận biết cuộc trò chuyện',
                    'pin' => '6 giờ nghe với ANC, 30 giờ kèm hộp sạc',
                    'ketnoi' => 'Bluetooth 5.3, Hộp sạc USB-C hỗ trợ MagSafe',
                    'trong_luong' => 'Tai nghe 5.3g, Hộp sạc 50.8g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Apple Pencil 2',
                'slug' => 'apple-pencil-2',
                'images' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/459/953/products/but-cam-ung-apple-pencil-2-ead90748-d30f-4f4c-b74a-dd93766e39a2.jpg',
                'price' => 2990000,
                'quantity' => 60,
                'brand' => 'Apple',
                'description' => 'Bút cảm ứng độ trễ siêu thấp, nhận diện độ nghiêng và lực nhấn mượt mà, gắn nam châm tự động sạc không dây cạnh viền iPad.',
                'specs' => json_encode([
                    'ketnoi' => 'Bluetooth, sạc không dây từ tính',
                    'tinh_nang' => 'Chạm đúp đổi công cụ, cảm ứng lực nhấn và góc nghiêng',
                    'trong_luong' => '20.7g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Củ sạc nhanh Apple 20W Type-C',
                'slug' => 'cu-sac-nhanh-apple-20w',
                'images' => 'https://salt.tikicdn.com/cache/750x750/ts/product/fd/cf/d8/f0c3f30eb6b1a1ec92e2b5e75b97e319.jpg',
                'price' => 490000,
                'quantity' => 120,
                'brand' => 'Apple',
                'description' => 'Củ sạc chính hãng Apple chuẩn Power Delivery 20W an toàn, sạc nhanh 50% pin cho iPhone trong vòng 30 phút, bảo vệ pin tối ưu.',
                'specs' => json_encode([
                    'cong_suat' => '20W Power Delivery',
                    'ketnoi' => 'Cổng Type-C',
                    'tinh_nang' => 'Tự ngắt dòng khi đầy pin, chống quá nhiệt'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Samsung Galaxy Watch6 Classic 47mm',
                'slug' => 'samsung-galaxy-watch6-classic',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/s/a/samsung-galaxy-watch-6-classic-43mm-slider_1__1.png',
                'price' => 7490000,
                'quantity' => 30,
                'brand' => 'Samsung',
                'description' => 'Viền xoay vật lý trứ danh xoay vặn cực êm, theo dõi giấc ngủ chuyên sâu huấn luyện giấc ngủ cá nhân, đo thành phần cơ thể BIA 3 trong 1.',
                'specs' => json_encode([
                    'man_hinh' => '1.5 inch Super AMOLED 480x480 Sapphire',
                    'chip' => 'Exynos W930 2 nhân 1.4GHz',
                    'ram' => '2GB + 16GB bộ nhớ trong',
                    'pin' => '425 mAh, sạc nhanh không dây WPC',
                    'tinh_nang' => 'Điện tâm đồ, Huyết áp, Viền xoay vật lý, Chống nước 5ATM/IP68',
                    'trong_luong' => '59g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Tai nghe Sony WH-1000XM5',
                'slug' => 'sony-wh-1000xm5',
                'images' => 'https://cdn2.cellphones.com.vn/insecure/rs:fill:0:358/q:90/plain/https://cellphones.com.vn/media/catalog/product/0/4/04_6_3.png',
                'price' => 7990000,
                'quantity' => 35,
                'brand' => 'Sony',
                'description' => 'Vua chống ồn over-ear với hai bộ xử lý chống ồn V1 và QN1, màng loa 30mm từ sợi carbon tái tạo âm thanh hi-res chi tiết, pin khủng 30 giờ.',
                'specs' => json_encode([
                    'tinh_nang' => 'Chống ồn chủ động Industry-Leading ANC 8 micro, LDAC Hi-Res Audio',
                    'pin' => '30 giờ bật ANC, sạc 3 phút dùng 3 giờ',
                    'ketnoi' => 'Bluetooth 5.2 kết nối 2 thiết bị cùng lúc, jack 3.5mm',
                    'trong_luong' => '250g đệm tai da êm ái'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Tai nghe Sony WF-1000XM5',
                'slug' => 'sony-wf-1000xm5',
                'images' => 'https://salt.tikicdn.com/cache/750x750/ts/product/42/4a/80/ae74ef5861264d57becd55accc770dc0.png',
                'price' => 5990000,
                'quantity' => 40,
                'brand' => 'Sony',
                'description' => 'Tai nghe true wireless chống ồn đỉnh nhất của Sony với củ loa Dynamic Driver X, hỗ trợ codec LDAC truyền tải âm thanh không dây độ phân giải cao.',
                'specs' => json_encode([
                    'tinh_nang' => 'Chống ồn kép HD Noise Cancelling QN2e, DSEE Extreme, Âm thanh 360',
                    'pin' => '8 giờ (tai nghe) + 16 giờ (hộp sạc), sạc không dây Qi',
                    'ketnoi' => 'Bluetooth 5.3 Multipoint',
                    'trong_luong' => '5.9g mỗi bên tai'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Chuột không dây Logitech MX Master 3S',
                'slug' => 'logitech-mx-master-3s',
                'images' => 'https://bizweb.dktcdn.net/thumb/grande/100/329/122/products/chuot-khong-day-logitech-mx-master-3s.png?v=1752901308837',
                'price' => 2490000,
                'quantity' => 60,
                'brand' => 'Logitech',
                'description' => 'Chuột công thái học cao cấp cho lập trình viên và sáng tạo nội dung, con lăn từ tính MagSpeed cuộn 1000 dòng/giây, nút bấm Quiet Click giảm 90% tiếng ồn.',
                'specs' => json_encode([
                    'tinh_nang' => 'Cảm biến quang học Darkfield 8000 DPI dùng trên mặt kính, cuộn siêu tốc MagSpeed',
                    'ketnoi' => 'Bluetooth Low Energy & USB Logi Bolt (kết nối cùng lúc 3 máy tính qua Logitech Flow)',
                    'pin' => 'Pin sạc USB-C dùng đến 70 ngày sau một lần sạc đầy',
                    'trong_luong' => '141g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Bàn phím cơ Keychron K2 Pro',
                'slug' => 'keychron-k2-pro',
                'images' => 'https://bizweb.dktcdn.net/thumb/grande/100/329/122/products/ban-phim-co-khong-day-keychron-k2-pro-rgb-hotswap-01.jpg?v=1719559233323',
                'price' => 2190000,
                'quantity' => 50,
                'brand' => 'Keychron',
                'description' => 'Bàn phím cơ không dây layout 75% gọn gàng hỗ trợ tùy biến QMK/VIA đầy đủ, mạch xuôi Hot-swap dễ thay switch, keycap PBT double-shot bền bỉ.',
                'specs' => json_encode([
                    'tinh_nang' => 'Hot-swappable, foam tiêu âm PCB và đáy, hỗ trợ Mac và Windows',
                    'ketnoi' => 'Bluetooth 5.1 (3 thiết bị) & Cáp Type-C rời',
                    'pin' => '4000 mAh lên tới 300 giờ gõ không đèn',
                    'trong_luong' => '1050g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Củ sạc Anker Prime 67W GaN 3 cổng',
                'slug' => 'anker-prime-67w-gan',
                'images' => 'https://cdn2.cellphones.com.vn/x/media/catalog/product/c/u/cu-sac-anker-prime-3-cong-2c1a-67w-a2669.jpg',
                'price' => 1190000,
                'quantity' => 75,
                'brand' => 'Anker',
                'description' => 'Công nghệ sạc nhanh GaNPrime tiên tiến, kích thước nhỏ gọn hơn 51% so với củ sạc MacBook thông thường, trang bị 2 cổng Type-C và 1 cổng USB-A sạc 3 máy cùng lúc.',
                'specs' => json_encode([
                    'cong_suat' => 'Tổng 67W Max (1 cổng Type-C tối đa 67W đủ sạc MacBook Pro 14)',
                    'ketnoi' => '2 x USB-C, 1 x USB-A PowerIQ 4.0',
                    'tinh_nang' => 'Công nghệ kiểm soát nhiệt ActiveShield 2.0 đo nhiệt độ 3 triệu lần/ngày',
                    'trong_luong' => '135g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 18,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'title' => 'Pin dự phòng Baseus Blade 100W 20000mAh',
                'slug' => 'pin-du-phong-baseus-blade-100w',
                'images' => 'https://bizweb.dktcdn.net/thumb/1024x1024/100/425/492/products/pin-sac-du-phong-sieu-nhanh-100w-cho-dien-thoai-laptop-baseus-blade-power-digital-display-fast-charging-power-bank-20000mah-12.jpg?v=1669187420530',
                'price' => 1350000,
                'quantity' => 45,
                'brand' => 'Baseus',
                'description' => 'Pin sạc dự phòng thiết kế siêu mỏng 18mm dạng phiến dẹt dễ đút balo cùng laptop, công suất khủng 100W sạc được cho cả laptop gaming và MacBook.',
                'specs' => json_encode([
                    'pin' => '20000 mAh / 74Wh (đủ điều kiện đem lên máy bay)',
                    'cong_suat' => '100W PD sạc 2 chiều (nạp đầy lại chỉ mất 90 phút với củ sạc 65W)',
                    'ketnoi' => '2 x Type-C (100W in/out) + 2 x USB-A (30W)',
                    'tinh_nang' => 'Màn hình LED hiển thị thời gian sạc, công suất Watt và % pin chính xác',
                    'trong_luong' => '490g'
                ], JSON_UNESCAPED_UNICODE),
                'warranty' => 12,
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('products')->insert($products);
    }
}
