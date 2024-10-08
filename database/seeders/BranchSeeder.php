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
                'branch_code' => 'MM-101',
                'branch_name' => 'Lanthit',
                'branch_short_name' => 'LAN1',
                'branch_address' => 'No.76, Lanthit Street, Near Arleing Ngar Sint Pagoda, Insein Township, Yangon, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '16.89093484',
                'longitude' => '96.11380065'
            ]
        );
        Branch::create(
            [
                'branch_code' => 'MM-103',
                'branch_name' => 'Satsan',
                'branch_short_name' => 'SAT1',
                'branch_address' => 'No.5 Upper Pazundaung Road, Satsan, Mingalar Taung Nyunt Tsp, Yangon, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '16.79393146',
                'longitude' => '96.18484016'
            ]
        );
        Branch::create(
            [
                'branch_code' => 'MM-104',
                'branch_name' => 'East Dagon',
                'branch_short_name' => 'EDG1',
                'branch_address' => 'No.(1/ka), No(2) Main Road, 15Qts, Near School of Nursing and Mitwifery, East Dagon Tsp, Yangon, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '16.8767532436696',
                'longitude' => '96.22841924947058'
            ]
        );
        Branch::create(
            [
                'branch_code' => 'MM-107',
                'branch_name' => 'Hlaing Tharyar',
                'branch_short_name' => 'HTY1',
                'branch_address' => 'No(4 to 5), Corner between Yangon-Pathein & Yangon-Ton Tay St, Infront of AGE Industrial, Inside Padan, Hlaingtharyar Tsp, Yangon.',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '16.871892088273338',
                'longitude' => '96.03638833911735'

            ]
        );
        Branch::create(
            [
                'branch_code' => 'MM-112',
                'branch_name' => 'PRO 1 PLUS (Terminal M)',
                'branch_short_name' => 'PTMN1',
                'branch_address' => 'No.196, 1st Floor, Terminal M Shopping Mall, No.3 Highway, Yangon Industrial Zone, Mingalardon Township, Yangon.',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '16.939731099182666',
                'longitude' => '96.15399301450972'
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-113',
                'branch_name' => 'South Dagon',
                'branch_short_name' => 'SDG1',
                'branch_address' => 'No. 523, Corner of Industrial Zone Rd & Pinlon Rd, Ward 23, South Dagon Tsp., Yangon, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '16.84257710916832',
                'longitude' => '96.2222330783032'
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-114',
                'branch_name' => 'Da Nyin Gone',
                'branch_short_name' => 'SPT1',
                'branch_address' => 'No.103-104 Bayint Naung Road, Shwe Pyi Thar Industrial Zone (4)',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '16.927262508132927',
                'longitude' => '96.08800848144548'
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-102',
                'branch_name' => 'MDY1',
                'branch_short_name' => 'SPT1',
                'branch_address' => 'Ma.8/6, Theik Pan Rd, Bet: 62 && 63 St., Chanmyathazi Tsp., Mandalay, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '21.95118025301972',
                'longitude' => '96.11058769242733'
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-106',
                'branch_name' => 'MDY2',
                'branch_short_name' => 'Tampawady',
                'branch_address' => 'No.(489/490), Between Lanthit Street & Corner of Shwe San Kaing Pagoda, 
                                    Inside of Kha Pa Ya, Tapawadi Quarter, Chanmyatharzi Tsp, Mandalay.',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '21.9495531112272',
                'longitude' => '96.07292949865555'
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-110',
                'branch_name' => 'MDY1',
                'branch_short_name' => 'Bago',
                'branch_address' => 'Ward.8, Oakthar Myo Thit, Bago Township, Bago, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '17.28759342277993',
                'longitude' => '996.46761565261387'
                
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-110',
                'branch_name' => 'MDY1',
                'branch_short_name' => 'Bago',
                'branch_address' => 'Ward.8, Oakthar Myo Thit, Bago Township, Bago, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '17.28759342277993',
                'longitude' => '996.46761565261387'
                
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-110',
                'branch_name' => 'MDY1',
                'branch_short_name' => 'Bago',
                'branch_address' => 'Ward.8, Oakthar Myo Thit, Bago Township, Bago, Myanmar',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '17.28759342277993',
                'longitude' => '996.46761565261387'
                
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-105',
                'branch_name' => 'Mawlamyine',
                'branch_short_name' => 'MLM1',
                'branch_address' => 'No.(70), Corner of Upper Main Road and A Lal Tan St, Maung Ngan Qr (Kha Pa Ya Compound), Mawlamyine',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '16.459611567693077',
                'longitude' => '97.62831869678472'
                
            ]
        );

        Branch::create(
            [
                'branch_code' => 'MM-108',
                'branch_name' => 'Aye Tharyar',
                'branch_short_name' => 'ATY1',
                'branch_address' => 'No.35 , 5 Quarter , Ayetharyar Township , Taunggyi Shan State',
                'branch_phone_no' => '',
                'branch_active' => 'true',
                'latitude' => '20.805366682668417',
                'longitude' => '97.0008419416069'
                
            ]
        );


    }
}
