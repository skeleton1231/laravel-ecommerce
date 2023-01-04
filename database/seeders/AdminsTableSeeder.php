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
            'id'=>1,
            'name'=>'Super Admin',
            'type'=>'superadmin',
            'vendor_id'=>0,
            'mobile'=>'8615999593293',
            'email'=>'admin@laravel.com',
            'password'=>'$2y$10$4.aZgRUiTKMPdH2VffueqetmOaXqVIBvygLpYUmyLYJ8vc.7/KzFu',
            'image'=>'',
            'status'=>1,
        ];
        Admin::insert($adminRecords);
    }
}
