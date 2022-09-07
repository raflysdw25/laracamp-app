<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\CampBenefit;

class CampBenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campBenefits = 
        [
            [
                "camp_id" => 1,
                "name" => "Pro Techstack Kit"
            ],
            [
                "camp_id" => 1,
                "name" => "iMac Pro 2021 & Display"
            ],
            [
                "camp_id" => 1,
                "name" => "1-1 Mentoring Program"
            ],
            [
                "camp_id" => 1,
                "name" => "Final Project Certificate"
            ],
            [
                "camp_id" => 1,
                "name" => "Offilne Course Videos"
            ],
            [
                "camp_id" => 1,
                "name" => "Future Job Oppotunity"
            ],
            [
                "camp_id" => 1,
                "name" => "Premium Design Kit"
            ],
            [
                "camp_id" => 1,
                "name" => "Website Builder"
            ],
            [
                "camp_id" => 2,
                "name" => "1-1 Mentoring Program"
            ],
            [
                "camp_id" => 2,
                "name" => "Final Project Certificate"
            ],
            [
                "camp_id" => 2,
                "name" => "Offilne Course Videos"
            ],
            [
                "camp_id" => 2,
                "name" => "Future Job Oppotunity"
            ],
            
        ];

        foreach ($campBenefits as $key => $campBenefit) {
            CampBenefit::create($campBenefit);
        }
    }
}
