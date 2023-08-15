<?php

namespace Database\Seeders;

use App\Models\JenisBiota;
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
            'logs',
            'sig',
         ];
      
         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }

         $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => '1637834357.jpg'
        ]);
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::where(function ($query) {
                                    $query->where('name', 'biota')
                                    ->orWhere('name', 'jenis-biota')
                                    ->orWhere('name', 'kondisi-perairan')
                                    ->orWhere('name', 'track')
                                    ->orWhere('name', 'jenis-biota')
                                    ->orWhere('name', 'jenis-temuan')
                                    ->orWhere('name', 'lokasi')
                                    ->orWhere('name', 'role')
                                    ->orWhere('name', 'user')
                                    ->orWhere('name', 'logs')
                                    ->orWhere('name', 'sig');
                                })->pluck('id','id');
   
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);

        $user2 = User::create([
            'name' => 'Nelayan', 
            'email' => 'nelayan@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => '1637834357.jpg'
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
            'avatar' => '1637834357.jpg'
        ]);
        $role3 = Role::create(['name' => 'Team U-Fish']);
        $permissions3 = Permission::where(function ($query) {
                                    $query->where('name', 'biota')
                                    ->orWhere('name', 'jenis-biota')
                                    ->orWhere('name', 'kondisi-perairan')
                                    ->orWhere('name', 'track')
                                    ->orWhere('name', 'jenis-biota')
                                    ->orWhere('name', 'jenis-temuan')
                                    ->orWhere('name', 'lokasi')
                                    ->orWhere('name', 'sig');
                                })->pluck('id','id');
        $role3->syncPermissions($permissions3);
        $user3->assignRole([$role3->id]);

        $user4 = User::create([
            'name' => 'Time', 
            'email' => 'time@gmail.com',
            'password' => bcrypt('123456'),
            'avatar' => '1637834357.jpg'
        ]);
        $role4 = Role::create(['name' => 'Time']);
        $permissions4 = Permission::where(function ($query) {
                                                $query->where('name', 'biota')
                                                ->orWhere('name', 'jenis-biota');
                                            })->pluck('id','id');
        $role4->syncPermissions($permissions4);
        $user4->assignRole([$role4->id]);

        Lokasi::insert([
            ['nama_lokasi' => 'Laut Maluku', 'latitude' => '-0.49432863568765184', 'longitude' => '125.19284381734148'],
            ['nama_lokasi' => 'Laut Jawa', 'latitude' => '-5.202498421509841', 'longitude' => '112.03916583001713'],
            ['nama_lokasi' => 'Laut Flores', 'latitude' => '-7.5944600962165', 'longitude' => '119.92419053307204'],
            ['nama_lokasi' => 'Laut Sawu', 'latitude' => '-9.45171304898253', 'longitude' => '121.88987582857565'],
            ['nama_lokasi' => 'Laut Banda', 'latitude' => '-5.69811981927097', 'longitude' => '126.6704934163812'],
            ['nama_lokasi' => 'Laut Arafuru', 'latitude' => '-8.861375820596264', 'longitude' => '136.09526792247092'],
            ['nama_lokasi' => 'Laut Halmahera', 'latitude' => '0.3514749832419972', 'longitude' => '129.28695685799053'],
            ['nama_lokasi' => 'Laut Timor', 'latitude' => '-11.344313515460042', 'longitude' => '127.9135361912859'],
            ['nama_lokasi' => 'Laut Seram', 'latitude' => '-2.4737864212973113', 'longitude' => '130.3490238535228'],
        ]);

        JenisBiota::insert([
            ['jenis_biota' => 'Ikan'],
            ['jenis_biota' => 'Molluska'],
            ['jenis_biota' => 'Kepiting'],
            ['jenis_biota' => 'Penyu'],
            ['jenis_biota' => 'Ubur-ubur'],
            ['jenis_biota' => 'Bintang Laut'],
            ['jenis_biota' => 'Kuda Laut'],
        ]);
    }
}
