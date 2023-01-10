<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendorRecords = [
            [
                'id'=>1,'name'=>'Jhon','address'=>'QianJing-122',
                'city'=>'Shenzhen','state'=>'Guangdong','country'=>'China',
                'pincode'=>'11001','mobile'=>'15999123456','email'=>'jhon@laravel.com','status'=>0,
            ],
        ];

        Vendor::insert($vendorRecords);
    }
}
