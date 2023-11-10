<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = new User();
        $staff->name = "Haru";
        $staff->email = "haru@gmail.com";
        $staff->address= "bagar";
        $staff->contact ="9658741236";
        $staff->save();
        $staff->assignRole('receptionist');


        $staff = new User();
        $staff->name = "Ren";
        $staff->email = "ren@gmail.com";
        $staff->address= "prithvichowk";
        $staff->contact ="9845762146";
        $staff->save();
        $staff->assignRole('receptionist');
    }
}
