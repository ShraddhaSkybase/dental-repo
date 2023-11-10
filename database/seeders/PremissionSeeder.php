<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PremissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission=Permission::create(['name'=>'view-appointment']);
        $permission=Permission::create(['name'=>'add-appointment']);
        $permission=Permission::create(['name'=>'edit-appointment']);
        $permission=Permission::create(['name'=>'delete-appointment']);

        $permission=Permission::create(['name'=>'view-patient']);
        $permission=Permission::create(['name'=>'add-patient']);
        $permission=Permission::create(['name'=>'edit-patient']);
        $permission=Permission::create(['name'=>'delete-patient']);


        $permission=Permission::create(['name'=>'view-procedure']);
        $permission=Permission::create(['name'=>'add-procedure']);
        $permission=Permission::create(['name'=>'edit-procedure']);
        $permission=Permission::create(['name'=>'delete-procedure']);

        $permission=Permission::create(['name'=>'view-billing']);
        $permission=Permission::create(['name'=>'add-billing']);
        $permission=Permission::create(['name'=>'edit-billing']);
        $permission=Permission::create(['name'=>'delete-billing']);


        $role=Role::findByName('patient');
        $role->givePermissionTo([
            'view-appointment',
            'view-procedure'
        ]);

        $role=Role::findbyName('dentist');
        $role->givePermissionTo([

            'view-appointment',
            'view-patient',
            'add-procedure',
        ]);

        $role=Role::findbyName('receptionist');
        $role->givePermissionTo([

            'view-billing',
            'view-appointment',
            'view-patient',
       
        ]);
        

   
       
    }
}
