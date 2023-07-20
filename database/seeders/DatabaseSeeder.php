<?php

namespace Database\Seeders;

use App\Models\Lokasi;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role',
            'user',
            'biota',
            'jenis-biota',
            'jenis-temuan',
            'kondisi-perairan',
            'laporan-nelayan',
            'lokasi',
            'track',
            'lihat-report-biota',
            'lihat-kondisi-perairan',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

         $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => 'zzz'
        ]);
    
        $role = Role::create(['name' => 'Admin']);
     
        // $permissions = Permission::where(function ($query) {
        //                                 $query->where('name', 'biota')
        //                                 ->orWhere('name', 'jenis-biota')
        //                                 ->orWhere('name', 'track');
        //                             })->pluck('id','id');
   
        // $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        $user2 = User::create([
            'name' => 'Nelayan', 
            'email' => 'nelayan@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => 'zzz'
        ]);
        
        $role2 = Role::create(['name' => 'Nelayan']);

        $permissions2 = Permission::where(function ($query) {
                                        $query->where('name', 'laporan-nelayan')
                                        ->orWhere('name', 'lihat-report-biota')
                                        ->orWhere('name', 'lihat-kondisi-perairan');
                                    })->pluck('id','id');

        $role2->syncPermissions($permissions2);

        $user2->assignRole([$role2->id]);

        $user3 = User::create([
            'name' => 'Team U-Fish', 
            'email' => 'team-ufish@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => 'zzz'
        ]);
        
        $role3 = Role::create(['name' => 'Team U-Fish']);

        $permissions3 = Permission::where(function ($query) {
                                    $query->where('name', 'biota')
                                    ->orWhere('name', 'jenis-biota')
                                    ->orWhere('name', 'kondisi-perairan')
                                    ->orWhere('name', 'track')
                                    ->orWhere('name', 'jenis-biota')
                                    ->orWhere('name', 'jenis-temuan')
                                    ->orWhere('name', 'lokasi');
                                })->pluck('id','id');

        $role3->syncPermissions($permissions3);

        $user3->assignRole([$role3->id]);

        $user4 = User::create([
            'name' => 'Time', 
            'email' => 'time@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => 'zzz'
        ]);
        
        $role4 = Role::create(['name' => 'Time']);

        // $permissions4 = Permission::where(function ($query) {
        //                                         $query->where('name', 'biota')
        //                                         ->orWhere('name', 'jenis-biota');
        //                                     })->pluck('id','id');

        // $role4->syncPermissions($permissions4);

        $user4->assignRole([$role4->id]);

        

        Lokasi::create([
            'nama_lokasi' => 'Bikini Bottom',
        ]);
    }
}
