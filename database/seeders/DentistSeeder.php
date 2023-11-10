<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DentistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dentist = new User();
        $dentist->name = "Chloe";
        $dentist->email = "chloe@gmail.com";
        $dentist->address= "bagale-tole";
        $dentist->contact ="9658741236";
        $dentist->save();
        $dentist->assignRole('dentist');
      

        $dentist = new User();
        $dentist->name = "Yuzz";
        $dentist->email = "yuzz@gmail.com";
        $dentist->address= "nayabazar";
        $dentist->contact ="9874563215";
    
        $dentist->save();
        $dentist->assignRole('dentist');
    
    }
}
