<?php

namespace Database\Seeders;

/*
@Author: Habibur Rahman <240217006@aston.ac.uk>
@Description: This is a seeder to seed the addresses table, do not use this seeder for production
*/
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressesTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = DB::table('users')->pluck('user_id')->toArray();
        if (empty($users)) {
            return;
        }

        $addresses = [];
        foreach ($users as $uid) {
            $addresses[] = [
                'user_id' => $uid,
                'address_line' => '123 Example St',
                'city' => 'Sampleville',
                'postal_code' => '12345',
                'country' => 'Testland',
                'is_default' => 1,
            ];
        }

        DB::table('addresses')->insert($addresses);
    }
}
