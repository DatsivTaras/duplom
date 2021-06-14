<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Enums\RoleEnum;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class GenerateAdminAccounts extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $usersData = [
            [
                'first_name' => 'Admin',
                'surname' => 'Admin',
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'approved_date' => Carbon::now(),
                'password' => Hash::make('11111111'),
                'email_verified_at' => Carbon::now()
            ],
        ];

        foreach ($usersData as $userData) {
            if (!User::where('email', $userData['email'])->exists()) {
                if ($user = User::create($userData)) {
                    $user->assignRole(RoleEnum::ADMIN);
                }
            }
        }
    }
}
