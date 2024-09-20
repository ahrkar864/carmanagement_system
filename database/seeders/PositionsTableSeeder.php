<?php

namespace Database\Seeders;

use App\Models\Positions;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Positions::create(
            [
                'name' => 'Assistant L&P Supervisor',
                'department_id' => '1'
            ]
        );

        Positions::create(
            [
                'name' => 'Sale Assistant',
                'department_id' => '1'
            ]
        );

        Positions::create(
            [
                'name' => 'Senior Sale Assistant',
                'department_id' => '1'
            ]
        );

        Positions::create(
            [
                'name' => 'Asst: Cashier Supervisor',
                'department_id' => '1'
            ]
        );


        Positions::create(
            [
                'name' => 'Assistant Warehouse Supervisors',
                'department_id' => '1'
            ]
        );

        Positions::create(
            [
                'name' => 'Sale Supervisor',
                'department_id' => '1'
            ]
        );

        Positions::create(
            [
                'name' => 'Assistant Sale Supervisor',
                'department_id' => '1'
            ]
        );

        Positions::create(
            [
                'name' => 'Cashier',
                'department_id' => '1'
            ]
        );

        Positions::create(
            [
                'name' => 'Assistant Branch Manager',
                'department_id' => '1'
            ]
        );

        Positions::create(
            [
                'name' => 'Branch Manager',
                'department_id' => '1'
            ]
        );

    }
    
}


