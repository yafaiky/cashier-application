<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\user;

class AccountData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new user();
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin123');
        $user->peran = 'admin';
        $user->save();
    }
}
