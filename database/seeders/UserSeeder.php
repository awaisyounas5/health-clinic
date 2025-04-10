<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'super_admin',
            'email'=>'super_admin@gmail.com',
            'password'=>Hash::make('password'),
            'status'=>'approved',
            'remember_token' => Str::random(10),
        ])->assignRole('super_admin');

        User::create([
            'name'=>'company',
            'email'=>'company@gmail.com',
            'password'=>Hash::make('password'),
            'status'=>'approved',
            'remember_token' => Str::random(10),
        ])->assignRole('company');
        Team::create([
            'title'=>'company',
            'created_by'=>2,
        ]);

        User::create([
            'name'=>'patient',
            'email'=>'patient@gmail.com',
            'password'=>Hash::make('password'),
            'status'=>'approved',
            'created_by'=>2,
            'team_id'=>1,
        ])->assignRole('patient');

        User::create([
            'name'=>'staff_member',
            'email'=>'staff_member@gmail.com',
            'password'=>Hash::make('password'),
            'status'=>'approved',
            'created_by'=>2,
            'team_id'=>1,
        ])->assignRole('staff_member');

        User::create([
            'name'=>'manager',
            'email'=>'manager@gmail.com',
            'password'=>Hash::make('password'),
            'status'=>'approved',
            'created_by'=>2
        ])->assignRole('manager');
    }

}
