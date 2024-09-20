<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create(
            [
                'branch_code' => 'MM-505',
                'branch_name' => 'WH-Mingalardon',
                'branch_short_name' => 'WHMLD',
                'branch_address' => 'No(59, 60), Zaygabar Compound, Corner of Kayaypin St & Naung Yan St, Mingalardon Industrial Zone, Yangon',
                'branch_phone_no' => '',
                'branch_active' => 'true'
            ]
        );
        Branch::create(
            [
                'branch_code' => 'MM-201',
                'branch_name' => 'Project Sales',
                'branch_short_name' => 'PRJ1',
                'branch_address' => 'No.76, Lanthit Street, Near Arleing Ngar Sint Pagoda, Insein Township, Yangon, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true'
            ]
        );
        Branch::create(
            [
                'branch_code' => 'MM-510',
                'branch_name' => 'DC-Mingalardon2',
                'branch_short_name' => 'DCMLD2',
                'branch_address' => '',
                'branch_phone_no' => '',
                'branch_active' => 'true'
            ]
        );
        Branch::create(
            [
                'branch_code' => 'MM-109',
                'branch_name' => 'No.3-Mingalardon',
                'branch_short_name' => 'MLD1',
                'branch_address' => 'No(59, 60), Zaygabar Compound, Corner of Kayaypin St & Naung Yan St, Mingalardon Industrial Zone, Yangon',
                'branch_phone_no' => '',
                'branch_active' => 'true'
            ]
        );
    }
}
