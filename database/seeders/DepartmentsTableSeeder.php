<?php

namespace Database\Seeders;

use App\Models\Departments;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departments::create(
            [
                'name' => 'Construction',
                'branch_id' => '1'
            ]
        );
        
        Departments::create(
            [
                'name' => 'Designer',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'Finance & Accounting',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'HR',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'Marketing',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'Merchandise',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'Online Sale',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'Operation',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'Project Sale',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'Sourcing',
                'branch_id' => '1'
            ]
        );

        Departments::create(
            [
                'name' => 'System Development',
                'branch_id' => '1'
            ]
        );

    }
}
