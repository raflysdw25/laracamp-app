<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Model
use App\Models\Camp;

// Helper
use Str;

// Seeder dipanggil DatabaseSeeder.php

class CampTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $camps = [
            [
                "title" => "Gila Belajar",
                "slug" => "gila-belajar",
                "price" => 280,
                // "created_at" => date('Y-m-d', time()),
                // "updated_at" => date('Y-m-d', time()),
            ],
            [
                "title" => "Baru Mulai",
                "slug" => "baru-mulai",
                "price" => 140,
                // "created_at" => date('Y-m-d', time()),
                // "updated_at" => date('Y-m-d', time()),
            ],
        ];

        // 1st Method: Menggunakan eloquent sehingga tidak perlu created_at dan updated_at
        foreach ($camps as $key => $camp) {
            Camp::create($camp);
        }

        // 2nd Method: Menggunakan Query Builder sehingga perlu mendefinisikan created_at dan updated_at
        // Camp::insert($camps);
    }
}
