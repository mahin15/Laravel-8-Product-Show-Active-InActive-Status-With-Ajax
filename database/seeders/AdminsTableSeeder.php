<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('admins')->delete();
        $adminRecords=[
            ['id'=>1,'name'=>'Super admin','type'=>'admin','mobile'=>'0123456789',
            'email'=>'admin@gmail.com','password'=>'$2y$10$Por88iofbaqei5VC76P3auqq9jH2Z2rdKeAG.DCreiruH4vtVuaLW',
            'image'=>'','status'=>1],

            ['id'=>2,'name'=>'Admin1','type'=>'subadmin','mobile'=>'0123456789',
            'email'=>'admin1@gmail.com','password'=>'$2y$10$Por88iofbaqei5VC76P3auqq9jH2Z2rdKeAG.DCreiruH4vtVuaLW',
            'image'=>'','status'=>1],

            ['id'=>3,'name'=>'Admin2','type'=>'subadmin','mobile'=>'0123456789',
            'email'=>'admin2@gmail.com','password'=>'$2y$10$Por88iofbaqei5VC76P3auqq9jH2Z2rdKeAG.DCreiruH4vtVuaLW',
            'image'=>'','status'=>1],

            ['id'=>4,'name'=>'Admin3','type'=>'subadmin','mobile'=>'0123456789',
            'email'=>'admin3@gmail.com','password'=>'$2y$10$Por88iofbaqei5VC76P3auqq9jH2Z2rdKeAG.DCreiruH4vtVuaLW',
            'image'=>'','status'=>1],
        ];

        DB::table('admins')->insert($adminRecords);

        // foreach ($adminRecords as $key => $record) {
        //     \App\Models\Admin::create($record);
        // }
    }
}
