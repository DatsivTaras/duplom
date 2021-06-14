<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Enums\RoleEnum;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Role::firstOrCreate(['name' => RoleEnum::ADMIN]);
    	Role::firstOrCreate(['name' => RoleEnum::TEACHER]);
    	Role::firstOrCreate(['name' => RoleEnum::STUDENT]);
    }
}
