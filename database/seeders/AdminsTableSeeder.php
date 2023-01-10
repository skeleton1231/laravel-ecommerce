<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $adminRecords = [
            [
                'id'=>2,
                'name'=>'Jhon',
                'type'=>'vendor',
                'vendor_id'=>1,
                'mobile'=>'15999123456',
                'email'=>'jhon@laravel.com',
                'password'=>'$2y$10$4.aZgRUiTKMPdH2VffueqetmOaXqVIBvygLpYUmyLYJ8vc.7/KzFu',
                'image'=>'',
                'status'=>0,
            ],
        ];
        Admin::insert($adminRecords);
    }
}
