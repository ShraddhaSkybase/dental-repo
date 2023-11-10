<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type= new Type();
        $type->name="Central Incisor";
        $type->save();

        $type= new Type();
        $type->name="Lateral Incisor";
        $type->save();

        $type= new Type();
        $type->name="Canine";
        $type->save();

        $type= new Type();
        $type->name="First Premolar";
        $type->save();

        $type= new Type();
        $type->name="Second Premolar";
        $type->save();

        $type= new Type();
        $type->name="First Molar";
        $type->save();

        $type= new Type();
        $type->name="Second Molar";
        $type->save();

        $type= new Type();
        $type->name="Third Molar";
        $type->save();


    }
}
